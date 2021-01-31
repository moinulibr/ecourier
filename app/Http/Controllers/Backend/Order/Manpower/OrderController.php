<?php

namespace App\Http\Controllers\Backend\Order\Manpower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order;
use App\Model\Backend\Order\Delivery_otp;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order_assigning_status;

use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_processing_type;


use App\Model\Backend\Order\OrderPickupDeliveryHoldingReason;
use App\Model\Backend\Order\OrderPickupDeliveryReschedule;
use App\Model\Backend\Order\OrderPickupDeliveryCancel;
use App\Model\Backend\Order\OrderPickupDeliveryCancelingReason;


use App\Model\Backend\Customer\Customer;

use Validator;
use Session;

use Carbon\Carbon;
use App\Model\Backend\Area\Area;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Backend\Admin\Setting;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pendingOrderPickupRequestList()
    {
        $myUserId = Auth::guard('manpower')->user()->id;
        $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',1)
                                    ->where('order_assigning_status_id',1)
                                    ->get();
        //$assigningStatus = [3,4,5];
        $assigningStatus = [3,4,5];
        $data['assigning_statuses'] = Order_assigning_status::whereIn('id',$assigningStatus)->get();
        return view('backend.order.manpower.pickup.pending_order_pickup_request',$data);
    }

    //Pending Order Pickup Request , : Accept
    public function acceptingPendingOrderPickupRequest(Request $request)
    {
        $order_id       = $request->order_id;
        $accept_value   = $request->accept_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        // Start transaction!
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',1)
                                        ->where('order_assigning_status_id',1)
                                        ->first();
            $order->order_assigning_status_id = $accept_value == 2 ? 2 : 9;
            $order->save();

            DB::commit();
            if($accept_value == 2)
            {
                //$this->changeOrderStatus($order_id,$order_status_id = 2);
                return back()->with('success','Pickup Request Accepted Successfully');
            }
            else{
                $this->changeOrderStatus($order_id,$order_status_id = 4);
                return back()->with('success','Received Accepted & Parcel Pickup Successfully');
            }
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    //Pending Order Pickup Request , : Cancel
    public function cancelingWithOptonPendingOrderPickupRequest(Request $request)
    {
        $order_id       = $request->order_id;
        $cancel_value   = $request->cancel_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        $order = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_id',$order_id)
                                    ->where('order_processing_type_id',1)
                                    ->where('order_assigning_status_id',1)
                                    ->first();
        $order->order_assigning_status_id = $cancel_value;
        $order->save();
        return back()->with('error','Pickup Request Not Accepted');
        /* if($cancel_value == 1)
            {
                //$this->changeOrderStatus($order_id,$order_status_id = 2);
                return back()->with('success','Pickup Request Accepted Successfully');
            }
            else{
                $this->changeOrderStatus($order_id,$order_status_id = 4);
                return back()->with('success','Received Accepted & Parcel Pickup Successfully');
            }
        */
    }
    //==========================================================================================





    //==========================================================================================
    /**Order Assigned , Accepted List */
    public function orderPickupRequestAcceptedList()
    {
        $myUserId = Auth::guard('manpower')->user()->id;
        $branch_id = Auth::guard('manpower')->user()->branch_id;
        $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',1)
                                    ->whereIn('order_assigning_status_id',[2])
                                    ->get();
        //$assigningStatus = [3,4,5];
        $assigningStatus = [3,4,5];
        $data['holdingReasons']     = OrderPickupDeliveryHoldingReason::whereNull('deleted_at')->get();
        $data['cancelingReasons']   = OrderPickupDeliveryCancelingReason::whereNull('deleted_at')->get();
        //$data['assigning_statuses'] = OrderPickupDeliveryReschedule::where('branch_id',$branch_id)->whereNull('deleted_at')->get();
        return view('backend.order.manpower.pickup.order_pickup_request_accepted_list',$data);
    }


    /**Order Picking up parcel from merchant */
    public function OrderPickingParcel(Request $request)
    {
        $order_id       = $request->order_id;
        $accept_value   = $request->accept_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',1)
                                        ->whereIn('order_assigning_status_id',[2])
                                        ->first();
            $order->order_assigning_status_id = $accept_value;
            $order->save();
            $this->changeOrderStatus($order_id,$order_status_id = 4);
            DB::commit();
            return back()->with('success','Parcel Pickup Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }

    /**Hold parcel , reschedule parcel */
    public function OrderPickingTimeHoldingParcel(Request $request)
    {
        $order_id       = $request->order_id;
        $holding_value   = $request->holding_value;
        $next_schedule   = $request->next_schedule;
        $myUserId       = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',1)
                                        ->whereIn('order_assigning_status_id',[2])
                                        ->first();
            $order->order_assigning_status_id = 6;
            $order->save();
            //$this->changeOrderStatus($order_id,$order_status_id = 4);
            $this->rescheduleHoldingPickupParcel($order_id,$holding_value,$next_schedule);
            $this->changeOrderStatus($order_id,$order_status_id=44);
            DB::commit();
            return back()->with('success','Parcel Hold Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage();
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    /**Order Canceling Parcel */
    public function OrderPickingTimeCancelingParcel(Request $request)
    {
        $order_id           = $request->order_id;
        $cancel_value       = $request->cancel_value;
        $myUserId           = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',1)
                                        ->whereIn('order_assigning_status_id',[2])
                                        ->first();
            $order->order_assigning_status_id = 8;
            $order->save();
            $this->orderFinalCancelingWhenPickupParcel($order_id,$cancel_value);
            $this->changeOrderStatus($order_id,$order_status_id=43);
            DB::commit();
            return back()->with('success','Parcel Cancel Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage();//"Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    /**Order Final Canceling when pickup parcel */
    public function orderFinalCancelingWhenPickupParcel($order_id,$reason_id)
    {
        $order = Order::find($order_id);
        if($order->parcel_owner_type_id == 1)
        {
            $merchant_client_id = $order->merchant_id;
        }else{
            $merchant_client_id = $order->general_customer_id;
        }
        $data = new OrderPickupDeliveryCancel();
        $data->order_id                                 = $order_id;
        $data->manpower_id                              = Auth::guard('manpower')->user()->id;
        $data->order_pickup_delivery_canceling_reason_id= $reason_id;
        $data->parcel_owner_type_id                     = $order->parcel_owner_type_id;
        $data->order_processing_type_id                 = 1;
        $data->merchant_client_id                       = $merchant_client_id;
        $data->branch_id                                = Auth::guard('manpower')->user()->branch_id;
        $data->created_by                               = Auth::guard('manpower')->user()->id;
        $data->save();
        return $data;
    }


    /**reschedule parcel */
    public function rescheduleHoldingPickupParcel($order_id,$reason_id,$next_schedule)
    {
        $order = Order::find($order_id);
        if($order->parcel_owner_type_id == 1)
        {
            $merchant_client_id = $order->merchant_id;
        }else{
            $merchant_client_id = $order->general_customer_id;
        }
        $data = new OrderPickupDeliveryReschedule();
        $data->order_id                                 = $order_id;
        $data->manpower_id                              =  Auth::guard('manpower')->user()->id;;
        $data->order_pickup_delivery_holding_reason_id  = $reason_id;
        $data->parcel_owner_type_id                     = $order->parcel_owner_type_id;
        $data->order_processing_type_id                 = 1;
        $data->merchant_client_id                       = $merchant_client_id;
        $data->branch_id                                = Auth::guard('manpower')->user()->branch_id;
        $data->next_schedule                            = $next_schedule;
        $data->created_by                               = Auth::guard('manpower')->user()->id;
        $data->save();
        return $data;
    }


    //=========================================================================================================
    //=========================================================================================================




    //=========================================================================================================
    //=========================================================================================================
    public function pendingOrderDeliveryRequestList()
    {
        $myUserId = Auth::guard('manpower')->user()->id;
        $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',2)
                                    ->where('order_assigning_status_id',1)
                                    ->get();
        //$assigningStatus = [3,4,5];
        $assigningStatus = [3,4,5];
        $data['assigning_statuses'] = Order_assigning_status::whereIn('id',$assigningStatus)->get();
       return view('backend.order.manpower.delivery.pending_order_delivery_request',$data);
    }

    //Pending Order Delivery Request , : Accept
    public function acceptingPendingOrderDeliveryRequest(Request $request)
    {
        $order_id       = $request->order_id;
        $accept_value   = $request->accept_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        // Start transaction!
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->where('order_assigning_status_id',1)
                                        ->first();
            $order->order_assigning_status_id = $accept_value == 2 ? 2 : 12;
            $order->save();

            DB::commit();
            if($accept_value == 2)
            {
                $this->changeOrderStatus($order_id,$order_status_id = 15);
                return back()->with('success','Delivery Request Accepted Successfully');
            }
            else{
                $this->changeOrderStatus($order_id,$order_status_id = 15);
                return back()->with('success','Received Accepted & Parcel Pickup From Office Successfully');
            }
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    //Pending Order Delivery Request , : Cancel
    public function cancelingWithOptonPendingOrderDeliveryRequest(Request $request)
    {
        $order_id       = $request->order_id;
        $cancel_value   = $request->cancel_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        $order = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_id',$order_id)
                                    ->where('order_processing_type_id',2)
                                    ->where('order_assigning_status_id',1)
                                    ->first();
        $order->order_assigning_status_id = $cancel_value;
        $order->save();
        return back()->with('error','Pickup Request Not Accepted');
        /* if($cancel_value == 1)
            {
                //$this->changeOrderStatus($order_id,$order_status_id = 2);
                return back()->with('success','Pickup Request Accepted Successfully');
            }
            else{
                $this->changeOrderStatus($order_id,$order_status_id = 4);
                return back()->with('success','Received Accepted & Parcel Pickup Successfully');
            }
        */
    }
    //==========================================================================================




    //==========================================================================================
    /**Order Assigned , Accepted List */
    public function orderDeliveryRequestAcceptedList()
    {
        $myUserId = Auth::guard('manpower')->user()->id;
        $branch_id = Auth::guard('manpower')->user()->branch_id;
        $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',2)
                                    ->whereIn('order_assigning_status_id',[12])
                                    ->get();
        //$assigningStatus = [3,4,5];
        $assigningStatus = [3,4,5];
        $data['holdingReasons']     = OrderPickupDeliveryHoldingReason::whereNull('deleted_at')->get();
        $data['cancelingReasons']   = OrderPickupDeliveryCancelingReason::whereNull('deleted_at')->get();
        //$data['assigning_statuses'] = OrderPickupDeliveryReschedule::where('branch_id',$branch_id)->whereNull('deleted_at')->get();
       return view('backend.order.manpower.delivery.order_delivery_request_accepted_list',$data);
    }


    /**Order Picking up parcel from merchant */
    public function OrderDeliveryingParcel(Request $request)
    {
        $order_id       = $request->order_id;
        $accept_value   = $request->accept_value;
        $myUserId = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->whereIn('order_assigning_status_id',[2,12])
                                        ->first();
            $order->order_assigning_status_id = $accept_value;
            $order->save();
            $this->changeOrderStatus($order_id,$order_status_id = 17);
            DB::commit();
            return back()->with('success','Parcel Delivery Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }

    /**Hold parcel , reschedule parcel */
    public function OrderDeliveryingTimeHoldingParcel(Request $request)
    {
        $order_id       = $request->order_id;
        $holding_value   = $request->holding_value;
        $next_schedule   = $request->next_schedule;
        $myUserId       = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->whereIn('order_assigning_status_id',[2,12])
                                        ->first();
            $order->order_assigning_status_id = 6;
            $order->save();
            //$this->changeOrderStatus($order_id,$order_status_id = 4);
            $this->rescheduleHoldingDeliveryParcel($order_id,$holding_value,$next_schedule);
            $this->changeOrderStatus($order_id,$order_status_id=19);
            DB::commit();
            return back()->with('success','Parcel Hold Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage();
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    /**Order Canceling Parcel */
    public function OrderDeliveryingTimeCancelingParcel(Request $request)
    {
        $order_id           = $request->order_id;
        $cancel_value       = $request->cancel_value;
        $myUserId           = Auth::guard('manpower')->user()->id;
        DB::beginTransaction();
        try
        {
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->whereIn('order_assigning_status_id',[2,12])
                                        ->first();
            $order->order_assigning_status_id = 8;
            $order->save();
            $this->orderFinalCancelingWhenDeliveryParcel($order_id,$cancel_value);
            $this->changeOrderStatus($order_id,$order_status_id=27);
            DB::commit();
            return back()->with('success','Parcel Cancel Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage();//"Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
    }


    /**Order Final Canceling when pickup parcel */
    public function orderFinalCancelingWhenDeliveryParcel($order_id,$reason_id)
    {
        $order = Order::find($order_id);
        if($order->parcel_owner_type_id == 1)
        {
            $merchant_client_id = $order->merchant_id;
        }else{
            $merchant_client_id = $order->general_customer_id;
        }
        $data = new OrderPickupDeliveryCancel();
        $data->order_id                                 = $order_id;
        $data->manpower_id                              = Auth::guard('manpower')->user()->id;
        $data->order_pickup_delivery_canceling_reason_id= $reason_id;
        $data->parcel_owner_type_id                     = $order->parcel_owner_type_id;
        $data->order_processing_type_id                 = 2;
        $data->merchant_client_id                       = $merchant_client_id;
        $data->branch_id                                = Auth::guard('manpower')->user()->branch_id;
        $data->created_by                               = Auth::guard('manpower')->user()->id;
        $data->save();
        return $data;
    }
    /**reschedule parcel */
    public function rescheduleHoldingDeliveryParcel($order_id,$reason_id,$next_schedule)
    {
        $order = Order::find($order_id);
        if($order->parcel_owner_type_id == 1)
        {
            $merchant_client_id = $order->merchant_id;
        }else{
            $merchant_client_id = $order->general_customer_id;
        }
        $data = new OrderPickupDeliveryReschedule();
        $data->order_id                                 = $order_id;
        $data->manpower_id                              =  Auth::guard('manpower')->user()->id;;
        $data->order_pickup_delivery_holding_reason_id  = $reason_id;
        $data->parcel_owner_type_id                     = $order->parcel_owner_type_id;
        $data->order_processing_type_id                 = 2;
        $data->merchant_client_id                       = $merchant_client_id;
        $data->branch_id                                = Auth::guard('manpower')->user()->branch_id;
        $data->next_schedule                            = $next_schedule;
        $data->created_by                               = Auth::guard('manpower')->user()->id;
        $data->save();
        return $data;
    }


    //=========================================================================================================
       /**Change order status */
       public function changeOrderStatus($order_id,$order_status_id)
       {
           $order = Order::find($order_id);
           $order->order_status_id = $order_status_id;
           $order->save();

           $tData['order_id']          = $order_id;
           $tData['order_status_id']   = $order_status_id;
           $tData['branch_id']         = Auth::guard('manpower')->user()->branch_id;
           $tData['created_by']        = Auth::guard('manpower')->user()->id;
           $tData['status_changer_id'] = Auth::guard('manpower')->user()->id;
           $tData['status']            = 1;
           $tData['changed_branch_id'] = NULL;
           $history = insertOrderProcessingHistory_HH($tData);
           return $order;
       }

    //=========================================================================================================

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
