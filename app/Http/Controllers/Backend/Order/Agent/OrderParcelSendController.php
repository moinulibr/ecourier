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
use App\Model\Backend\Branch\Branch;
use Auth;
use Validator;
use DB;
use Session;



use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_assigning_status;
use Carbon\Carbon;
use App\User;
use PDF;

class OrderParcelSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.agent.order_send.assign');
    }




    /**
     * For Bar code.....
    */

    // add to cart 
    public function quickAssignParcelAddCart(Request $request)
    {
        $cartNameSend = [];
        $invoice_no =  $request->invoice_no;

        $cartNameSend = session()->has('cartNameSend') ? session()->get('cartNameSend')  : [];
        $odr    = Order::where('invoice_no',$invoice_no)
                        ->where('destination_branch_id','!=',Auth::guard('web')->user()->branch_id)
                        ->where('order_status_id','>',4)
                        ->first();
        $order = NULL;
        if($odr)
        {
            $query  =  Order_destination::query();
            //$query->where('branch_id',Auth::guard('web')->user()->branch_id);
            $query->whereNull('send_by');
            $query->where('order_receiving_sending_status_id',1);
            $order = $query->where('order_id',$odr->id)->first();
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
            if(array_key_exists($order->id,$cartNameSend))
                {
                //$cartNameSend[$order->id]['total_price'] = $cartNameSend[$order->id]['quantity'] * $cartNameSend[$order->id]['unit_price'];
                }
            else{
                $cartNameSend[$order->id] = [
                    'order_session_id'      => $order->id,
                    'sending_to_branch_id'  => $order->branch_id,
                    'order_id'              => $order->order_id,
                    'invoice_no'            => $order->orders->invoice_no,
                    'status_id'             => $status_id,
                    'status'                => $status,
                    'creating_branch'       => $order->orders->creatingBranches?$order->orders->creatingBranches->company_name:'',
                    'sending_to_branch'     => $order->branches?$order->branches->company_name:'',
                    'destination_branch'    => $order->orders->destinationBranchs?$order->orders->destinationBranchs->company_name:'',
                ];
            }
            session(['cartNameSend' => $cartNameSend]);
        }
        return view('backend.order.agent.order_send.ajax.quick_assign');
    }


    //exist cart
    public function quickAssignParcelExistCart()
    {
        $cartNameSend = session()->has('cartNameSend') ? session()->get('cartNameSend')  : [];
        if($cartNameSend)
        {
            return view('backend.order.agent.order_send.ajax.quick_assign');
        }else{
            return false;
        }
    }

    //single remove from cart
    public function quickAssignParcelRemoveSingleCart(Request $request)
    {
        $cartNameSend = session()->has('cartNameSend') ? session()->get('cartNameSend')  : [];
		unset($cartNameSend[$request->input('invoice_no')]);
        session(['cartNameSend'=>$cartNameSend]);
        return view('backend.order.agent.order_send.ajax.quick_assign');
    }

    //remove all from cart
    public function quickAssignParcelRemoveCart()
    {
        session(['cartNameSend' => []]);
        return view('backend.order.agent.order_send.ajax.quick_assign');
    }



    //store from cart
    public function quickAssignParcelStoreFromCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id.*' => 'required',
            'order_session_id.*' => 'required',
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
                $orderChangeStatus->order_receiving_sending_status_id = 3;
                $orderChangeStatus->send_by = Auth::guard('web')->user()->id;
                $orderChangeStatus->send_at = date('Y-m-d h:i:s');
                $orderChangeStatus->save(); 
                $this->updateOrderChangingCurrentBranchStatusId($orderChangeStatus->order_id,$order,$request->sending_to_branch_id[$key]);
            }
            

            session(['cartNameSend' => []]);
            DB::commit();
            Session::flash('success','Send Successfully!');
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


    public function updateOrderChangingCurrentBranchStatusId($order_id, $order_destination_id = NULL,$destination_branch_id = NULL)
    {
        $order_status_id = sendStatusIdBranchId_HH($destination_branch_id);
        $order = Order::find($order_id);  
        //$order->order_status_changing_current_branch_id = Auth::guard('web')->user()->branch_id;
        $order->order_status_id =  $order_status_id;
        $order->save();

        $setData['order_id'] = $order->id;
        $setData['order_status_id'] = $order_status_id;
        $setData['branch_id'] = Auth::guard('web')->user()->branch_id;
        $setData['created_by'] = Auth::guard('web')->user()->id;
        $setData['status_changer_id'] = Auth::guard('web')->user()->id;
        $setData['status'] = 1;
        $setData['changed_branch_id']   = $destination_branch_id;

        $data = insertOrderProcessingHistory_HH($setData);

        /*Sending Commission branch Order */
         $myBranchId = Auth::guard('web')->user()->branch_id;
         $branch_commission_type_id = orderSendingCommissionTypeId_HH($order_id,$myBranchId);
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

    public function sendingParcelList(Request $request)
    {
        $branch_id          = Auth::guard('web')->user()->branch_id;
        $data['senders']    = User::where('branch_id',$branch_id)->get();//getAllManpowers_HH(); 

        return view('backend.order.agent.order_send.order_sending_details.order_sending_list',$data);
    }



    

    public function sendingParcelListAjaxList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $send_by = $request->sender_id;
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
      
        $query  = Order_destination::query();
        if($send_by)
        {
            $query->where('order_destinations.send_by',$send_by);
        }
        $data['orders'] = $query->whereBetween('order_destinations.send_at',[$startDate,$endDate])
                        ->join('orders','orders.id','=','order_destinations.order_id')
                        ->select('order_destinations.*','orders.collect_amount',
                            DB::raw('COUNT(order_destinations.id) as total'),
                            DB::raw('SUM(orders.collect_amount) as total_collect_amount')  
                            )
                        ->where('order_destinations.order_receiving_sending_status_id',3)
                        ->groupBy('order_destinations.send_at')
                        ->latest()
                        ->paginate(100);

                        return view('backend.order.agent.order_send.order_sending_details.ajax.list',$data);                                        
    }


    
    public function sendingParcelListViewAjaxList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $send_by = $request->sender_id;
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
      
        $query  = Order_destination::query();
        if($send_by)
        {
            $query->where('order_destinations.send_by',$send_by);
        }
        $data['orders'] = $query->whereBetween('order_destinations.send_at',[$startDate,$endDate])
                        ->where('order_destinations.order_receiving_sending_status_id',3)
                        //->groupBy('order_destinations.send_at')
                        ->latest()
                        ->get();
        return view('backend.order.agent.order_send.order_sending_details.ajax.view_details',$data);       
        //->select('order_destinations.*','orders.collect_amount',
       // DB::raw('COUNT(order_destinations.id) as total'),
       // DB::raw('SUM(orders.collect_amount) as total_collect_amount')  
        //)                                 
    }



    // print popup
    public function printManpowerOrderAssingedList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $manpower_id = $request->manpower_id;
        $order_assigning_status_id = $request->order_assigning_status_id;
        $order_processing_type_id = $request->order_processing_type_id;
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
        if($order_processing_type_id)
        {
            $query->where('order_processing_type_id',$order_processing_type_id);
        }

        $data['orders'] = $query->whereBetween('created_at',[$startDate,$endDate])
                                ->where('branch_id',$branch_id)
                                ->get();

        ini_set('max_execution_time', 180); //3 minutes
        return view('backend.order.agent.order_assigned_manpower.print_popup',$data);                                          
        return view('backend.order.agent.order_assigned_manpower.list_print',$data);   
    }

    //pdf download
    public function pdfDownloadManpowerOrderAssingedList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $manpower_id = $request->manpower_id;
        $order_assigning_status_id = $request->order_assigning_status_id;
        $order_processing_type_id = $request->order_processing_type_id;
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
        if($order_processing_type_id)
        {
            $query->where('order_processing_type_id',$order_processing_type_id);
        }

        $data['orders'] = $query->whereBetween('created_at',[$startDate,$endDate])
                                ->where('branch_id',$branch_id)
                                ->get();

        ini_set('max_execution_time', 180); //3 minutes
        $pdf =  PDF::loadView('backend.order.agent.order_assigned_manpower.list_print',$data);
        return $pdf->download('Parcel Assigned Sheet .pdf');

        return view('backend.order.agent.order_assigned_manpower.print_popup',$data);                                          
        return view('backend.order.agent.order_assigned_manpower.list_print',$data);   
        
        /*
            ini_set('max_execution_time', 180); //3 minutes
            $page =  view('backend.order.agent.order_assigned_manpower.list_print',$data);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($page); // $pdf->loadHTML('<h2>'.Hello, Preint This Section.'</h2>');
            return $pdf->download('pdfDownload_FileName.pdf');
            return $pdf->stream();
        */
    }


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
