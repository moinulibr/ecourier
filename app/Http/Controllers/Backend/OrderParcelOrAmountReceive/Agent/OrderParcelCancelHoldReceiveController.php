<?php

namespace App\Http\Controllers\Backend\OrderParcelOrAmountReceive\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order;
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;
use DB; 
use Session; 
class OrderParcelCancelHoldReceiveController extends Controller
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
        $data['orderAssigningStatuses'] =  Order_assigning_status::whereIn('id',[6,8])
                                                        ->whereNull('deleted_at')
                                                        ->get();
        return view('backend.orderParcelOrAmountReceive.agent.receiveHoldCancelParcel.index',$data);
    }


    public function showCancelHoldParcelOrderList(Request $request)
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
                        ->get();

        return view('backend.orderParcelOrAmountReceive.agent.receiveHoldCancelParcel.list',$data);
    }

    public function storeCancelHoldParcelOrderList(Request $request)
    {
        $branch_id                  = Auth::guard('web')->user()->branch_id;
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
               $this->cancelHoldParcelUpdateOrderStatusIdAndInsertProcessingHistoryTable($order_id,$order_assigning_status_id,$manpower_id);
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

    public function cancelHoldParcelUpdateOrderStatusIdAndInsertProcessingHistoryTable($orderId,$order_assigning_status_id,$manpower_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data = Order_assign::where('order_id',$orderId)
                    ->where('branch_id',$branch_id)
                    ->where('manpower_id',$manpower_id)
                    ->where('Order_processing_type_id',2)
                    ->where('order_assigning_status_id',$order_assigning_status_id)
                    ->first();
        
       $order_id =  Order::where('id',$orderId)->first();

       if($order_assigning_status_id == 6)//hold
       {
            $data->order_assigning_status_id = 10; 
            $order_id->order_status_id =  12;  
            $this->insertOrderProcessingHistoryTable($orderId,$changing_status_id = 12); 
       }
       if($order_assigning_status_id == 8)//cancel
       {    
            $data->order_assigning_status_id = 11; 
            $order_id->order_status_id =  29;
            $this->insertOrderProcessingHistoryTable($orderId,$changing_status_id = 29); 
       }
       $data->save();
       $order_id->save();
       return true;
    }

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