<?php

namespace App\Http\Controllers\Backend\Order\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_status;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;
use App\Model\Backend\Branch\Area_branch;
use Auth;
use Validator;
use DB;
use Session;

class OrderAssigningStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['current_statuses']   = Order_status::whereIn('id',whereInCurrentStatusWhenAssigningParcelForAdmin_HH())
                                        ->whereNull('deleted_at')
                                        ->get();
        $data['assinging_statuses'] = Order_status::whereIn('id',whereInChangingStatusWhenAssigningParcelForAdmin_HH())
                                        ->whereNull('deleted_at')
                                        ->get();
        $data['areas']              = Area::whereNull('deleted_at')->get();
        $data['districts']          = District::all();
        $data['manpowers']          = getAllManpowersByBranchId_HH($branch_id);//getAllManpowers_HH();
        return view('backend.order.admin.assign_order.assign',$data);
    }




    /**
     * For Bar code.....
    */

    // add to cart 
    public function quickAssignParcelAddCart(Request $request)
    {
        $cartName = [];
        $invoice_no =  $request->invoice_no;

        $currentStatusId =  $request->currentStatusId;
        $fromToAreaId =  $request->fromToAreaId;

        $creating_branch_id = Order::where('invoice_no',$invoice_no)->first()->creating_branch_id;
        $myBranchId = Auth::guard('web')->user()->branch_id;

        $cartName = session()->has('cartName') ? session()->get('cartName')  : [];
        $query =  Order::query();//where('invoice_no',$invoice_no)->first();
        $query->where('invoice_no',$invoice_no);
        //------------------------------------------------------------------
        if($currentStatusId)
        {
            if($creating_branch_id == $myBranchId)
            {
                $query->where('creating_branch_id',$myBranchId);
            }else{
                $query->where('order_status_changing_current_branch_id',$myBranchId);
            }
            $query->where('order_status_id',$currentStatusId);
        }//if have status end
        //if status have not data
        else{
            $query->where('creating_branch_id',$myBranchId);
        }
        //------------------------------------------------------------------
        //------------------------------------------------------------------
        if($fromToAreaId)
        {
            if($creating_branch_id == $myBranchId)
            {
                $query->where('creating_area_id',$fromToAreaId);
            }
            else{
                $query->where('destination_area_id',$fromToAreaId);
            }
        }
        //------------------------------------------------------------------
        $order = $query->first();
        if($order)
        {
            $status_id =  $order->order_status_id;
            //$status =  $this->status($order->status);
            $status = $order->orderStatus?$order->orderStatus->order_status:'';
            if(array_key_exists($order->id,$cartName))
                {
                //$cartName[$order->id]['total_price'] = $cartName[$order->id]['quantity'] * $cartName[$order->id]['unit_price'];
                }
            else{
                $cartName[$order->id] = [
                    'order_id' => $order->id,
                    'invoice_no' => $order->invoice_no,
                    'status_id' => $status_id,
                    'status' => $status,
                    'customer_name' => $order->customer?$order->customer->customer_name:'',
                    'customer_phone' => $order->customer?$order->customer->customer_phone:'',
                ];
            }
            session(['cartName' => $cartName]);
        }
        return view('backend.order.admin.assign_order.ajax.quick_assign');
    }

    //exist cart
    public function quickAssignParcelExistCart()
    {
        $cartName = session()->has('cartName') ? session()->get('cartName')  : [];
        if($cartName)
        {
            return view('backend.order.admin.assign_order.ajax.quick_assign');
        }else{
            return false;
        }
    }

    //single remove from cart
    public function quickAssignParcelRemoveSingleCart(Request $request)
    {
        $cartName = session()->has('cartName') ? session()->get('cartName')  : [];
		unset($cartName[$request->input('invoice_no')]);
        session(['cartName'=>$cartName]);
        return view('backend.order.admin.assign_order.ajax.quick_assign');
    }

    //remove all from cart
    public function quickAssignParcelRemoveCart()
    {
        session(['cartName' => []]);
        return view('backend.order.admin.assign_order.ajax.quick_assign');
    }

    //store from cart
    public function quickAssignParcelStoreFromCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id.*' => 'required',
            'changing_status_id' => 'required'
        ]);
        if(empty($request->order_id))
        {
            Session::flash('error','Please Select Order ID First');
            return back();
        }

        // Start transaction!
        DB::beginTransaction();
        try 
        {   
            $final_success_cancel_status_id = NULL;
            if($request->changing_status_id == 18)
            {
                $final_success_cancel_status_id = 1;
            }
            else if($request->changing_status_id == 28){
                $final_success_cancel_status_id = 2;
            }
            foreach($request->order_id as $key => $order)
            {
                $orderChangeStatus                                  = Order::find($order);
                $orderChangeStatus->order_status_id                 = $request->changing_status_id;
                $orderChangeStatus->final_success_cancel_status_id  =  $final_success_cancel_status_id;
                $orderChangeStatus->save();
                $this->insertOtherTableAfterChangingStatusId($request->changing_status_id,$order,$request->manpower_id);
            }
            

            session(['cartName' => []]);
            DB::commit();
            Session::flash('success','Assigned Successfully!');
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


    public function insertOtherTableAfterChangingStatusId($changing_status_id,$order_id,$manpower_id = NULL)
    {
        $orderProcessing =  new Order_processing_history();
        $orderProcessing->order_id          = $order_id;
        $orderProcessing->order_status_id   = $changing_status_id;
        $orderProcessing->status_changer_id = Auth::guard('web')->user()->id;
        $orderProcessing->created_by        = Auth::guard('web')->user()->id;
        $orderProcessing->branch_id         = Auth::guard('web')->user()->branch_id;
        $orderProcessing->save();

            // assign picker
            if($changing_status_id == 3)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 1; // pickup
                $assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                if($assignedAlready)
                { 
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 3,$order_processing_type_id);
                }
                $this->insertAssingedManpower($manpower_id,$order_id,$order_assigning_status_id,$order_processing_type_id);
            }
            // office Received Parcel
            else if($changing_status_id == 5)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 1; // pickup
                $assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                if($assignedAlready)
                { 
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 9,$order_processing_type_id);
                }

                //===sms permission and setting===
                if(smsToCustomerWhenParcelBookedFromMerchantActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when parcel receive office";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToCustomerWhenParcelBookedFromMerchant_HH","customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id",$note);
                }
                //===sms permission and setting===
            }
            // preparing for deliery 
            else if($changing_status_id == 12)
            {
    
            }
            // Assign to delivery man
            else if($changing_status_id == 13)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 2; // pickup
                //$assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                $assignedAlready = Order_assign::where('order_id',$order_id)
                        ->whereIn('order_assigning_status_id',[1])
                        ->where('order_processing_type_id',$order_processing_type_id)
                        ->first();
                if($assignedAlready)
                {
                     // cancel
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 3,$order_processing_type_id);
                }
                $this->insertAssingedManpower($manpower_id,$order_id,$order_assigning_status_id=1,$order_processing_type_id);
                

                 //===sms permission and setting===
                if(smsToMerchantWhenParcelAssigningToManpowerForDeliveryActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when assign to delivery man";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH","company_name,invoice_no,delivery_man_name,delivery_man_phone",$note);
                }
                //===sms permission and setting===
                 //===sms permission and setting===
                if(smsToCustomerWhenParcelAssigningToManpowerForDeliveryActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when assign to delivery man";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH","customer_name,invoice_no,delivery_man_name,delivery_man_phone",$note);
                }
                //===sms permission and setting===
            }
              // on the way
            else if($changing_status_id == 16)
            {
    
            }
            //Delivery Processing
            else if($changing_status_id == 17)
            {
                $order_processing_type_id  = 2;
                $assignedAlready = Order_assign::where('order_id',$order_id)
                    ->whereIn('order_assigning_status_id',[1])
                    ->where('order_processing_type_id',$order_processing_type_id)
                    ->first();
                if($assignedAlready)
                {
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 12,$order_processing_type_id);
                }
            }
    
            // Delivery Success
            else if($changing_status_id == 18)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 2; // Delivery
                //$assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                $assignedAlready = Order_assign::where('order_id',$order_id)
                            ->whereIn('order_assigning_status_id',[12,2])
                            ->where('order_processing_type_id',$order_processing_type_id)
                            ->first();
                if($assignedAlready)
                { 
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 7,$order_processing_type_id);
                }
                 //===sms permission and setting===
                if(smsToMerchantWhenParcelDeliverySuccessfulActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when Parcel is Delivered";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToMerchantWhenParcelDeliverySuccessful_HH","company_name,invoice_no,collect_only_product_amount",$note);
                }
                //===sms permission and setting===
            }
             // Delivery Hold
            else if($changing_status_id == 19)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 2; // delivery
                //$assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                $assignedAlready = Order_assign::where('order_id',$order_id)
                            ->whereIn('order_assigning_status_id',[12,2])
                            ->where('order_processing_type_id',$order_processing_type_id)
                            ->first();
                if($assignedAlready)
                {
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 6,$order_processing_type_id);
                }
                 //===sms permission and setting===
                if(smsToMerchantWhenParcelHoldDeliveryActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when Delivery Hold";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToMerchantWhenParcelHoldDelivery_HH","company_name,invoice_no",$note);
                }
                //===sms permission and setting===
            }
            // Delviery Canceling
            else if($changing_status_id == 27)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 2; // delivery
                //$assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                $assignedAlready = Order_assign::where('order_id',$order_id)
                            ->whereIn('order_assigning_status_id',[12,2])
                            ->where('order_processing_type_id',$order_processing_type_id)
                            ->first();
                if($assignedAlready)
                {
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 8 ,$order_processing_type_id);
                }
                 //===sms permission and setting===
                if(smsToMerchantWhenParcelHoldDeliveryActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when Delivery Hold";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToMerchantWhenParcelHoldDelivery_HH","company_name,invoice_no",$note);
                } 
            }
             // Delviery cancel
            else if($changing_status_id == 28)
            {
                $order_assigning_status_id = 2; // received/Accept
                $order_processing_type_id  = 2; // delivery
                //$assignedAlready =  $this->existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id);
                $assignedAlready = Order_assign::where('order_id',$order_id)
                            ->whereIn('order_assigning_status_id',[12,2])
                            ->where('order_processing_type_id',$order_processing_type_id)
                            ->first();
                if($assignedAlready)
                {
                     // cancel
                    $this->updateAssingedManpower($assignedAlready->id,$order_assigning_status_id = 8,$order_processing_type_id);
                }

                 //===sms permission and setting===
                if(smsToMerchantWhenParcelCancelDeliveryActivateStatus_HS())
                {
                    //Sending SMS
                    $note = "when Delivery Hold";
                    insertSmsWhenOrderProcessing_HH($order_id,"smsToMerchantWhenParcelCancelDelivery_HH","company_name,invoice_no",$note);
                }
                //===sms permission and setting===
            }
    
             // office receive cancel parcel
            else if($changing_status_id == 29)
            {
                
            }
            return true;
    }

    public  function updateAssingedManpower($assigned_id,$order_assigning_status_id,$order_processing_type_id)
    {
        $assign =  Order_assign::find($assigned_id);
        $assign->order_processing_type_id   = $order_processing_type_id;
        $assign->assigner_id                = Auth::guard('web')->user()->id;;
        $assign->order_assigning_status_id  = $order_assigning_status_id;
        $assign->branch_id                  = Auth::guard('web')->user()->branch_id;
        $assign->save();
        return $assign;
    }
    public  function insertAssingedManpower($manpower_id,$order_id,$order_assigning_status_id,$order_processing_type_id)
    {
        $assign =  new Order_assign();
        $assign->manpower_id                = $manpower_id;
        $assign->order_id                   = $order_id;
        $assign->order_processing_type_id   = $order_processing_type_id;
        $assign->assigner_id                = Auth::guard('web')->user()->id;;
        $assign->order_assigning_status_id  = $order_assigning_status_id;
        $assign->branch_id                  = Auth::guard('web')->user()->branch_id;
        $assign->save();
        return $assign;
    }
    public  function existingAssingedCheck($order_id,$order_assigning_status_id,$order_processing_type_id)
    {
        return $assign =  Order_assign::where('order_id',$order_id)
                    //->where('order_assigning_status_id',$order_assigning_status_id)    
                    ->where('order_processing_type_id',$order_processing_type_id)    
                    ->first();
    }

    /**
     * For Bar code End
    */
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
        return $request;
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
