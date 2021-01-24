<?php

namespace App\Http\Controllers\Backend\Order\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_assign;
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;
class OrderAssignController extends Controller
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
        $data['orderAssigningStatuses'] =  Order_assigning_status::whereNull('deleted_at')->get();                          
        return view('backend.order.agent.order_assigned_manpower.index',$data);
    }


    public function showManpowerOrderAssingedList(Request $request)
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
                        ->paginate(100);

        return view('backend.order.agent.order_assigned_manpower.list',$data);                                          
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
