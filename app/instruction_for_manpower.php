

=======================================================================================================
when order creating time
    $commission = new Branch_commission();
    $commission->order_id                       = $order->id;
    $commission->branch_id                      = $myBranchId;
    $commission->branch_commission_setting_id   = $branch_commission_setting_id;
    $commission->branch_type_id                 = $branch_type_id;
    $commission->branch_commission_type_id      = $branch_commission_type_id;
    $commission->charge                         = $totalCharge;
    $commission->commission                     = $commissionAmount;
    $commission->active_status                  = 0;
    $commission->save();

    when order , deliverd and Receiving Delivered Parcel amount from delivery man , then
    $commission = new Branch_commission();
    $commission->active_status = 1;
    $commission->save();
===========================================================================================================

/*
|-------------------------------------------------------------------------------------------------------------|
|   Title Section Start |
|-----------------------------------------------|  |--------------------|  |----------------------------------|
*///|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*/
/*|-|*
|-------------------------------------------------------------------------------------------------------------|
|   Title Section Start |
|-------------------------------------------------------------------------------------------------------------|
*/



/*|---------------------------------------------------------------------------------------------------------|*|
|*|---------------------------------------------------------------------------------------------------------|*|
|*|                                           Title Section Start |*|
|*|---------------------------------------------------------------------------------------------------------|*|
|*|---------------------------------------------------------------------------------------------------------|*/
/*|*/
/*|*/
/*|*/
/*|*/
/*|*/
/*|*/
/*|*/
/*|*/
/*|--
|*|------------------------------------------------------------------------------------------------------------|*|
|*| Title Section Start |*|
|*|------------------------------------------------------------------------------------------------------------|*|
*/


/*
|-------------------------------------------------------------------------------------------------------------|
|                                           Title Section Start |
|-------------------------------------------------------------------------------------------------------------|
*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*/
/*-*
|-------------------------------------------------------------------------------------------------------------|
|   Title Section Start |
|-------------------------------------------------------------------------------------------------------------|
*/



/*-*
|-------------------------------------------------------------------------------------------------------------|
|                                   Manpower Panel                                                            |
|-------------------------------------------------------------------------------------------------------------|
*/
For Delivery Man/Picker Man

    /** Pending Order Pickup Request List */
        pendingOrderPickupRequestList()
        {
            $myUserId = Auth::guard('manpower')->user()->id;
            $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',1)
                                    ->where('order_assigning_status_id',1)
                                    ->get();
        }
        /** Pending Order Pickup Request List */



    /** manpower accept pickup request (storing) */
    public function acceptingPendingOrderPickupRequest(Request $request)
    {
        $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',1)
                                        ->where('order_assigning_status_id',1)
                                        ->first();
            $order->order_assigning_status_id = $accept_value == 2 ? 2 : 9;
            $order->save();
        $this->changeOrderStatus($order_id,$order_status_id = 4);
    }
    /** manpower accept pickup request (storing) */



    /** Manpower Cancel Pickup Request */
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
    }
    /** Manpower Cancel Pickup Request */




    /**Manpower accepted Request list */
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
    }
        /**Manpower accepted Request list */



        /**Manpower Parcel  Pickup time (after accepted request)*/
        public function OrderPickingParcel(Request $request)
        {
            $order_id       = $request->order_id;
            $accept_value   = $request->accept_value;
            $myUserId = Auth::guard('manpower')->user()->id;
            
                $order = Order_assign::where('manpower_id',$myUserId)
                                            ->where('order_id',$order_id)
                                            ->where('order_processing_type_id',1)
                                            ->whereIn('order_assigning_status_id',[2])
                                            ->first();
                $order->order_assigning_status_id = $accept_value;
                $order->save();
                $this->changeOrderStatus($order_id,$order_status_id = 4);
                DB::commit();
           
        }
        /**Manpower Parcel  Pickup time (after accepted request)*/




        /**Manpower Holding Parcel (when picking parcel),  */
        public function OrderPickingTimeHoldingParcel(Request $request)
        {
            $order_id       = $request->order_id;
            $holding_value   = $request->holding_value;
            $next_schedule   = $request->next_schedule;
            $myUserId       = Auth::guard('manpower')->user()->id;
          
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
        }
        /**Manpower Holding Parcel (when picking parcel),  */




        /**Manpower Canceling Parcel (when picking parcel)*/
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
            }
        /**Manpower Canceling Parcel (when picking parcel)*/





        /**Manpower Delivery pending request** */
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
        }
        /**Manpower Delivery pending request** */



        /**Manpower Delivery accepting request** */
        public function acceptingPendingOrderDeliveryRequest(Request $request)
        {
            $order_id       = $request->order_id;
            $accept_value   = $request->accept_value;
            $myUserId = Auth::guard('manpower')->user()->id;
        
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->where('order_assigning_status_id',1)
                                        ->first();
            $order->order_assigning_status_id = $accept_value == 2 ? 2 : 12;
            $order->save();
            $this->changeOrderStatus($order_id,$order_status_id = 15);
        }
        /**Manpower Delivery accepting request** */



        /**Manpower Delivery pending request cancel** */
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
        }
        /**Manpower Delivery pending request cancel** */



        /**Manpower Delivery Accepted Request List** */
        public function orderDeliveryRequestAcceptedList()
        {
            $myUserId = Auth::guard('manpower')->user()->id;
            $branch_id = Auth::guard('manpower')->user()->branch_id;
            $data['orders'] = Order_assign::where('manpower_id',$myUserId)
                                    ->where('order_processing_type_id',2)
                                    ->where('order_assigning_status_id',2)
                                    ->get();
        }
        /**Manpower Delivery Accepted Request List** */




        /**Manpower Deliverying parcel from accepted List (from on the way)** */
        public function OrderDeliveryingParcel(Request $request)
        {
            $order_id       = $request->order_id;
            $accept_value   = $request->accept_value;
            $myUserId = Auth::guard('manpower')->user()->id;
           
            $order = Order_assign::where('manpower_id',$myUserId)
                                        ->where('order_id',$order_id)
                                        ->where('order_processing_type_id',2)
                                        ->whereIn('order_assigning_status_id',[2,12])
                                        ->first();
            $order->order_assigning_status_id = $accept_value;
            $order->save();
            $this->changeOrderStatus($order_id,$order_status_id = 17);
        }
        /**Manpower Deliverying parcel from accepted List (from on the way)** */




        /**Manpower Holding (reschedule ) Parcel when Deliverying parcel from accepted List (from on the way)** */

        public function OrderDeliveryingTimeHoldingParcel(Request $request)
        {
            $order_id       = $request->order_id;
            $holding_value   = $request->holding_value;
            $next_schedule   = $request->next_schedule;
            $myUserId       = Auth::guard('manpower')->user()->id;
        
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
        }
        /**Manpower Holding (reschedule ) Parcel when Deliverying parcel from accepted List (from on the way)** */




        /**Manpower Canceling Parcel when Deliverying parcel from accepted List (from on the way)** */
        public function OrderDeliveryingTimeCancelingParcel(Request $request)
        {
            $order_id           = $request->order_id;
            $cancel_value       = $request->cancel_value;
            $myUserId           = Auth::guard('manpower')->user()->id;
        
                $order = Order_assign::where('manpower_id',$myUserId)
                                            ->where('order_id',$order_id)
                                            ->where('order_processing_type_id',2)
                                            ->whereIn('order_assigning_status_id',[2,12])
                                            ->first();
                $order->order_assigning_status_id = 8;
                $order->save();
                $this->orderFinalCancelingWhenDeliveryParcel($order_id,$cancel_value);
                $this->changeOrderStatus($order_id,$order_status_id=27);
        }
        /**Manpower Canceling Parcel when Deliverying parcel from accepted List (from on the way)** */
/*-*
|-------------------------------------------------------------------------------------------------------------|
|                                   Manpower Panel  editing                                                   |
|-------------------------------------------------------------------------------------------------------------|
*/