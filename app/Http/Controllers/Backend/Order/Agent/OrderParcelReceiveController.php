<?php

namespace App\Http\Controllers\Backend\Order\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_status;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order;
use App\Model\Backend\Order\Order_destination;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;
use App\Model\Backend\Branch\Area_branch;
use Auth;
use Validator;
use DB;
use Session;
class OrderParcelReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.agent.order_receive.assign');
    }




    /**
     * For Bar code.....
    */

    // add to cart 
    public function quickAssignParcelAddCart(Request $request)
    {
        $cartNameReceive = [];
        $invoice_no =  $request->invoice_no;

        $currentStatusId =  $request->currentStatusId;
        $fromToAreaId =  $request->fromToAreaId;

        $cartNameReceive = session()->has('cartNameReceive') ? session()->get('cartNameReceive')  : [];
        $odr    = Order::where('invoice_no',$invoice_no)
                        ->where('destination_branch_id',Auth::guard('web')->user()->branch_id)
                        ->where('order_status_id','>',4)
                        ->first();
        $order = NULL;
        if($odr)
        {
            $query  =  Order_destination::query();
            $query->where('branch_id',Auth::guard('web')->user()->branch_id);
            $query->whereNull('received_by');
            $query->whereNotNull('send_by');
            $query->where('order_receiving_sending_status_id',3);
            $order = $query->where('order_id',$odr->id)
                    ->first();
        }
        //------------------------------------------------------------------
        //$query->where('creating_branch_id',Auth::guard('web')->user()->branch_id);
        //$query->orWhere('order_status_changing_current_branch_id',Auth::guard('web')->user()->branch_id);
        //------------------------------------------------------------------
        if($order)
        {
            $status_id =  $order->orders->order_status_id;
            //$status =  $this->status($order->status);
            $status = $order->orders->orderStatus?$order->orders->orderStatus->order_status:'';
            if(array_key_exists($order->id,$cartNameReceive))
                {
                //$cartNameReceive[$order->id]['total_price'] = $cartNameReceive[$order->id]['quantity'] * $cartNameReceive[$order->id]['unit_price'];
                }
            else{
                $cartNameReceive[$order->id] = [
                    'order_session_id'          => $order->id,
                    'receiving_from_branch_id'  => $order->branch_id,
                    'order_id'                  => $order->order_id,
                    'invoice_no'                => $order->orders->invoice_no,
                    'status_id'                 => $status_id,
                    'status'                    => $status,
                    'creating_branch'           => $order->orders->creatingBranches?$order->orders->creatingBranches->company_name:'',
                    'receiving_from_branch'     => $order->branches?$order->branches->company_name:'',
                    'destination_branch'        => $order->orders->destinationBranchs?$order->orders->destinationBranchs->company_name:'',
                ];
            }
            session(['cartNameReceive' => $cartNameReceive]);
        }
        return view('backend.order.agent.order_receive.ajax.quick_assign');
    }

    //exist cart
    public function quickAssignParcelExistCart()
    {
        $cartNameReceive = session()->has('cartNameReceive') ? session()->get('cartNameReceive')  : [];
        if($cartNameReceive)
        {
            return view('backend.order.agent.order_receive.ajax.quick_assign');
        }else{
            return false;
        }
    }

    //single remove from cart
    public function quickAssignParcelRemoveSingleCart(Request $request)
    {
        $cartNameReceive = session()->has('cartNameReceive') ? session()->get('cartNameReceive')  : [];
		unset($cartNameReceive[$request->input('invoice_no')]);
        session(['cartNameReceive'=>$cartNameReceive]);
        return view('backend.order.agent.order_receive.ajax.quick_assign');
    }

    //remove all from cart
    public function quickAssignParcelRemoveCart()
    {
        session(['cartNameReceive' => []]);
        return view('backend.order.agent.order_receive.ajax.quick_assign');
    }

    //store from cart
    public function quickAssignParcelStoreFromCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id.*' => 'required',
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
            foreach($request->order_session_id as $key => $order)
            {
                $orderChangeStatus = Order_destination::find($order);
                $orderChangeStatus->order_receiving_sending_status_id = 2;
                $orderChangeStatus->received_by = Auth::guard('web')->user()->id;
                $orderChangeStatus->received_at = date('Y-m-d h:i:s');
                $orderChangeStatus->save();
                $this->updateOrderChangingCurrentBranchStatusId($orderChangeStatus->order_id,$order,$request->receiving_from_branch_id[$key]);
            }
            

            session(['cartNameReceive' => []]);
            DB::commit();
            Session::flash('success','Received Successfully!');
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


    public function updateOrderChangingCurrentBranchStatusId($order_id,$order_dest_id = NULL,$receiving_branch_id)
    {
        $order_status_id = receiveStatusIdBranchId_HH($receiving_branch_id);

        $order = Order::find($order_id);  
        $order->order_status_changing_current_branch_id = Auth::guard('web')->user()->branch_id;
        $order->order_status_id = $order_status_id;
        $order->save();

        $setData['order_id']            = $order->id;
        $setData['order_status_id']     = $order_status_id;
        $setData['branch_id']           = Auth::guard('web')->user()->branch_id;
        $setData['created_by']          = Auth::guard('web')->user()->id;
        $setData['status_changer_id']   = Auth::guard('web')->user()->id;
        $setData['status']              = 1;
        $setData['changed_branch_id']   = $receiving_branch_id;

        $data = insertOrderProcessingHistory_HH($setData);

        /*Sending Commission branch Order */
        $myBranchId = Auth::guard('web')->user()->branch_id;
        $branch_commission_type_id = orderReceivingCommissionTypeId_HH($order_id,$myBranchId);
        insertingBranchCommissionWhenReceiveAndSend_HH($order,$myBranchId,$branch_commission_type_id);
        /*Sending Commission branch Order */

        return $data; 
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
