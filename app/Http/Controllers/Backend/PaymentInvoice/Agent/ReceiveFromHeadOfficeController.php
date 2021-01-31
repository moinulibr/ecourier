<?php

namespace App\Http\Controllers\Backend\PaymentInvoice\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order;
use App\Model\Backend\ReceiveAmount\ReceiveAmountHistory;
use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoice;
use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoiceDetail;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoice;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoiceDetail;
use App\Model\Backend\Branch\Branch;
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;
use DB;
use Session;

class ReceiveFromHeadOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function headOfficeSendInvoiceList()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoices'] = HeadOfficePayToBranchInvoice::where('received_branch_id',$branch_id)
                            ->whereNull('deleted_at')
                            ->latest()
                            ->get();//where('from_branch_id',$branch_id)
        return view('backend.payment_invoice.agent.receive_from_head_office.view',$data);
    }


    public function headOfficeSendInvoiceListDetails($id)
    {

        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = HeadOfficePayToBranchInvoice::find($id)->payment_invoice_no;
        $data['invoices'] = HeadOfficePayToBranchInvoiceDetail::where('head_office_pay_to_branch_invoice_id',$id)
                                    ->get();
        return view('backend.payment_invoice.agent.receive_from_head_office.view_list',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receiveInvoiceFromheadOfficeSend($id)
    {
         // Start transaction!
         DB::beginTransaction();
         try
         {
             $update = HeadOfficePayToBranchInvoice::find($id);
             $update->payment_received_by    = Auth::guard('web')->user()->id;
             $update->received_branch_id     = Auth::guard('web')->user()->branch_id;
             $update->payment_received_at    = date('Y-m-d h:i:s');
             $update->save();
 
             $alls = HeadOfficePayToBranchInvoiceDetail::where('head_office_pay_to_branch_invoice_id',$id)->get();
             foreach ($alls as $key => $value)
             {
                 $this->updateDataReceiveAmountHistory($value->receive_amount_history_id,$value->receive_amount_type_id,$value->order_id);
             }
             DB::commit();
             Session::flash('success','Invoice Amount Received Successfully!');
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



    public function updateDataReceiveAmountHistory($id,$receiveAmoutTypeId,$order_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $update = ReceiveAmountHistory::find($id);
        $update->parcel_amount_payment_status_id  = 7;
        $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        $update->save();
        return $update;
       /*  $order_id = $update->order_id;
        if($receiveAmoutTypeId == 1)
        {
            $update->service_delivery_payment_status_id  = 3;
            $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        }
        else if($receiveAmoutTypeId == 2)
        {
            $update->service_cod_payment_status_id = 3;
            $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        }
        else if($receiveAmoutTypeId == 4)
        {
            $update->parcel_amount_payment_status_id  = 7;
            $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        }
        $update->save();
        return $update; */
    }


    public function updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId)
    {
        $order = Order::find($order_id);
        $order->parcel_amount_payment_status_id = 7;
        $order->save();
        return $order;
        /* $branch_id = Auth::guard('web')->user()->branch_id;
        if($receiveAmoutTypeId == 1)
        {
            $order->service_delivery_payment_status_id  = 3;
        }
        else if($receiveAmoutTypeId == 2)
        {
            $order->service_cod_payment_status_id = 3;
        }
        else if($receiveAmoutTypeId == 4)
        {
            if($order->destination_branch_id == $branch_id)
            {
                $order->parcel_amount_payment_status_id = 8;
            }else{
                $order->parcel_amount_payment_status_id = 5;
            }
        }
        $order->save();
        return $order; */
    }




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
