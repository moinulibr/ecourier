<?php

namespace App\Http\Controllers\Backend\OrderParcelOrAmountReceive\Admin;

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
        return view('backend.orderParcelOrAmountReceive.admin.receiveDeliveredParcelAmount.index',$data);
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
                        ->whereNull("deleted_at")
                        ->get();

        return view('backend.orderParcelOrAmountReceive.admin.receiveDeliveredParcelAmount.list',$data);
    }



    // store
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
               updateActiveStatusWhenReceivingAmount_HH($order_id,$active_status=1);
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
                    ->whereNull("deleted_at")
                    ->where('branch_id',$branch_id)
                    ->where('manpower_id',$manpower_id)
                    ->where('Order_processing_type_id',2)
                    ->where('collection_status',0)
                    ->where('order_assigning_status_id',$order_assigning_status_id)
                    ->first();
        if($data)
        {
            $data->collection_status = 1;
            $data->save();
        }

        //amount receive history
        $this->insertOrderPaymentReceivingHistoryTable($orderId,$manpower_id);

        /*order manpower income commission */
        $created_by     = Auth::guard('web')->user()->id;
        $branch_id      = Auth::guard('web')->user()->branch_id;
        getManpowerAssignedData_HH(7,$orderId)?manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(7,$orderId)):NULL;
        getManpowerAssignedData_HH(9,$orderId)?manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(9,$orderId)):NULL;
        //manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(7,$orderId),$branch_id,$created_by);
        //manpowerCommissionAmountInsert_HH(getManpowerAssignedData_HH(9,$orderId),$branch_id,$created_by);
        /*order manpower income commission */
        /*order manpower income commission */

        //$this->insertOrderProcessingHistoryTable($orderId,$changing_status_id = 29);
        return true;
    }


    public function insertOrderPaymentReceivingHistoryTable($orderId,$manpower_id)
    {
        $order_id =  Order::where('id',$orderId)->first();
        $cod_charge     = $order_id->cod_charge;
        $service_charge = $order_id->service_charge;
        $client_merchant_payable_amount = $order_id->client_merchant_payable_amount;

        if($order_id->parcel_amount_payment_type_id == 1)
        {
            $this->OrderPaymentReceivingHistory($order_id,1,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4,$client_merchant_payable_amount,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 1);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 2);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 4);
        }
        else if($order_id->parcel_amount_payment_type_id == 2)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 1);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 2);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 4);
        }
        else if($order_id->parcel_amount_payment_type_id == 3)
        {
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 4);
        }
        else if($order_id->parcel_amount_payment_type_id == 4)
        {
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 2);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 4);
        }
        else if($order_id->parcel_amount_payment_type_id == 5)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 1);
        }
        else if($order_id->parcel_amount_payment_type_id == 6)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$manpower_id);

            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 1);
            $this->updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id = 2);
        }
        else if($order_id->parcel_amount_payment_type_id == 7)
        {
            //$this->OrderPaymentReceivingHistory($order_id, 1,0,$manpower_id);
        }
        return true;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    public function OrderPaymentReceivingHistory($order_id,$receive_amount_type_id,$amount,$manpower_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
        $parcel_amount_payment_status_id =  NULL;
        $service_delivery_payment_status_id = NULL;
        $service_cod_payment_status_id = NULL;
        if($receive_amount_type_id == 1)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $service_delivery_payment_status_id = 6;//Head Office Receive commission of his own branch
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $service_delivery_payment_status_id = 3;
            }else{
                //Branch received from delivery man
                $service_delivery_payment_status_id = 3;
            }
        }
        else if($receive_amount_type_id == 2)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $service_cod_payment_status_id = 6;//Head Office Receive commission of his own branch
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $service_cod_payment_status_id = 3;
            }else{
                //Branch received from delivery man
                $service_cod_payment_status_id = 3;
            }
        }

        else if($receive_amount_type_id == 4)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $parcel_amount_payment_status_id = 8; //Branch received Amount And Preparing
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $parcel_amount_payment_status_id = 5;//8
            }else{
                 //Branch received from delivery man
                $parcel_amount_payment_status_id = 5;
            }
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



    public function updateOrderParcelServiceCodStatus($orderId,$receive_amount_type_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);

        $order_id =  Order::where('id',$orderId)->first();
        $order_id->office_collect_amount_from_delivery_man =  1;

        if($receive_amount_type_id == 1)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->service_delivery_payment_status_id =  6;
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->service_delivery_payment_status_id =  3;//
            }else{
                //Branch received from delivery man
                $order_id->service_delivery_payment_status_id =  3;
            }
        }
        else if($receive_amount_type_id == 2)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->service_cod_payment_status_id =  6;//8
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->service_cod_payment_status_id =  3;//8
            }else{
                 //Branch received from delivery man
                $order_id->service_cod_payment_status_id =  3;
            }
        }

        else if($receive_amount_type_id == 4)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->parcel_amount_payment_status_id =  8;//8
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->parcel_amount_payment_status_id =  5;//8
            }else{
                 //Branch received from delivery man
                $order_id->parcel_amount_payment_status_id =  5;
            }
        }
        //update order tabel
        $order_id->save();
        return $order_id;
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
