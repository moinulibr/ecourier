<?php

namespace App\Http\Controllers\Backend\OrderParcelOrAmountReceive\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order;
use App\Model\Backend\ReceiveAmount\ReceiveAmountHistory;
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;
use DB;
use Session;
class OrderDeliveredParcelAmountReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['processing_typies']  = Order_processing_type::get();
        $data['manpowers']          = getAllManpowersByBranchId_HH($branch_id);//getAllManpowers_HH();
        //order_assigning_status_id = 2
        $data['orderAssigningStatuses'] =  Order_assigning_status::whereIn('id',[7])
                                                        ->whereNull('deleted_at')
                                                        ->get();
        return view('backend.orderParcelOrAmountReceive.agent.receiveDeliveredParcelAmount.index',$data);
    }


    public function showParcelAmountOrderList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $manpower_id = $request->manpower_id;
        $order_assigning_status_id = $request->order_assigning_status_id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if($request->from_date)
        {
            $startDate  = date("Y-m-d",strtotime($from_date));
        }else{
            $startDate = date('Y-m-d');
        }
        if($request->to_date)
        {
            $endDate = date("Y-m-d",strtotime($to_date."+1 day"));
        }else{
            $end= date('d-m-Y');
            $endDate = date("Y-m-d",strtotime($end."+1 day"));
        }

        $query  = Order_assign::query();
        if($manpower_id)
        {
            $query->where('manpower_id',$manpower_id);
        }
        if($order_assigning_status_id)
        {
            $query->where('order_assigning_status_id',$order_assigning_status_id);
        }

        $data['orders'] = $query->whereBetween('created_at',[$startDate,$endDate])
                        ->where('branch_id',$branch_id)
                        ->where('order_processing_type_id',2)
                        ->where('collection_status',0)
                        ->get();

        return view('backend.orderParcelOrAmountReceive.agent.receiveDeliveredParcelAmount.list',$data);
    }

    public function storeParcelAmountOrderList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $manpower_id                = $request->manpower_id;
        $order_assigning_status_id  = $request->order_assigning_status_id;
        $order_ids                  = $request->order_id;
        //$amounts = $request->order_id_amount;

        // Start transaction!
        DB::beginTransaction();
        try
        {
            //change order_assigning_status_id ,branch_id in the order_assign table
            foreach ($order_ids as $key => $order_id) {
               $this->parcelAmountReceiveOrderStatusIdAndInsertProcessingHistoryTable($order_id,$order_assigning_status_id,$manpower_id);
            }
            //change status id in the order table
            //order insert data in the processing table
            DB::commit();
            Session::flash('success','Parcel Received Successfully!');
            return back();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage();// "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }

    public function parcelAmountReceiveOrderStatusIdAndInsertProcessingHistoryTable($orderId,$order_assigning_status_id,$manpower_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data = Order_assign::where('order_id',$orderId)
                    ->where('branch_id',$branch_id)
                    ->where('manpower_id',$manpower_id)
                    ->where('Order_processing_type_id',2)
                    ->where('collection_status',0)
                    ->where('order_assigning_status_id',$order_assigning_status_id)
                    ->first();
        $data->collection_status = 1;
        $data->save();

        //update order tabel
        $order_id =  Order::where('id',$orderId)->first();
        $order_id->parcel_amount_payment_status_id =  3;
        $order_id->office_collect_amount_from_delivery_man =  1;
        $order_id->save();
        $this->insertOrderPaymentReceivingHistoryTable($order_id,$manpower_id);

        /*order manpower income commission */
        $created_by     = Auth::guard('web')->user()->id;
        $branch_id      = Auth::guard('web')->user()->branch_id;
        
        manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(7,$orderId),$branch_id,$created_by);
        manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(9,$orderId),$branch_id,$created_by);
        /*order manpower income commission */

        //$this->insertOrderProcessingHistoryTable($orderId,$changing_status_id = 29);
        return true;
    }


    public function insertOrderPaymentReceivingHistoryTable($order_id,$manpower_id)
    {
        $cod_charge     = $order_id->cod_charge;
        $service_charge = $order_id->service_charge;
        $product_amount = $order_id->product_amount;

        if($order_id->parcel_amount_payment_type_id == 1)
        {
            $this->OrderPaymentReceivingHistory($order_id,1,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$product_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 2)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$product_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 3)
        {
            $this->OrderPaymentReceivingHistory($order_id,4 ,$product_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 4)
        {
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$product_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 5)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 6)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 7)
        {
            //$this->OrderPaymentReceivingHistory($order_id, 1,0,$manpower_id);
        }
        return true;
    }
    public function OrderPaymentReceivingHistory($order_id,$receive_amount_type_id,$amount,$manpower_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $parcel_amount_payment_status_id =  NULL;
        $service_delivery_payment_status_id = NULL;
        $service_cod_payment_status_id = NULL;
        if($order_id->creating_branch_id == $order_id->destination_branch_id)
        {
            $parcel_amount_payment_status_id = 8;
        }else{
            $parcel_amount_payment_status_id = 3;
        }
        if($receive_amount_type_id == 1)
        {
            $service_delivery_payment_status_id = 1;
        }
        else if($receive_amount_type_id == 2)
        {
            $service_cod_payment_status_id = 1;
        }

        $orderProcessing =  new ReceiveAmountHistory();
        $orderProcessing->order_id                          = $order_id->id;
        $orderProcessing->parcel_owner_type_id              = $order_id->parcel_owner_type_id;
        $orderProcessing->receive_amount_type_id            = $receive_amount_type_id;
        $orderProcessing->received_by                       = Auth::guard('web')->user()->id;
        $orderProcessing->amount                            = $amount;
        $orderProcessing->received_from                     = $manpower_id;
        $orderProcessing->received_from_user_role_id        = getManpowerByManpowerId_HH($manpower_id)?getManpowerByManpowerId_HH($manpower_id)->role_id:NULL;
        $orderProcessing->creating_branch_id                = $order_id->creating_branch_id;
        $orderProcessing->received_amount_branch_id         = $branch_id;
        $orderProcessing->creating_branch_type_id           = $order_id->creating_branch_type_id;
        $orderProcessing->destination_branch_id             = $order_id->destination_branch_id;
        $orderProcessing->received_branch_type_id           = getBranchByBranchId_HH($branch_id)?getBranchByBranchId_HH($branch_id)->branch_type_id:NULL;
        $orderProcessing->parcel_amount_payment_status_id   = $parcel_amount_payment_status_id;
        $orderProcessing->service_cod_payment_status_id     = $service_cod_payment_status_id;
        $orderProcessing->service_delivery_payment_status_id= $service_delivery_payment_status_id;
        $orderProcessing->created_by                        = Auth::guard('web')->user()->id;
        $orderProcessing->save();
        return $orderProcessing;
    }



    //not using this
    public function insertOrderProcessingHistoryTable($order_id,$changing_status_id)
    {
        $orderProcessing =  new Order_processing_history();
        $orderProcessing->order_id          = $order_id;
        $orderProcessing->order_status_id   = $changing_status_id;
        $orderProcessing->status_changer_id = Auth::guard('web')->user()->id;
        $orderProcessing->created_by        = Auth::guard('web')->user()->id;
        $orderProcessing->branch_id         = Auth::guard('web')->user()->branch_id;
        $orderProcessing->save();
        return $orderProcessing;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
