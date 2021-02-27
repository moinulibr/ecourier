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
use App\Model\Backend\PaymentInvoice\PayToBranchCommissionInvoice;
use App\Model\Backend\PaymentInvoice\PayToBranchCommissionInvoiceDetail;

use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoice;
use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoiceDetail;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoice;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoiceDetail;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoice;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;
use App\Model\Backend\Branch\Branch;
use Carbon\Carbon;
use App\User;
use App\Model\Backend\Customer\General_customer;
use Auth;
use PDF;
use DB;
use Session;
use App\Model\Backend\Commission\Branch_commission;

class ReceiveBranchCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidBranchCommissionInvoiceList()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoices'] = PayToBranchCommissionInvoice::whereNull('deleted_at')
                                                                ->where('received_branch_id',$branch_id)
                                                                ->whereNull("deleted_at")
                                                                ->latest()
                                                                ->get();
        return view('backend.payment_invoice.agent.pay_to_branch_commission.send_invoice_list',$data);
    }//PayToBranchCommissionInvoiceDetail

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paidBranchCommissionInvoiceListDetails($id)
    {
        $data['invoice']    = PayToBranchCommissionInvoice::find($id)->payment_invoice_no;
        $data['invoices']   = PayToBranchCommissionInvoiceDetail::where('pay_to_branch_commission_invoice_id',$id)
                                                                        ->whereNull("deleted_at")
                                                                        ->get();
        return view('backend.payment_invoice.agent.pay_to_branch_commission.send_invoice_list_detail',$data);
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
