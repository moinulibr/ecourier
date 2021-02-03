<?php

namespace App\Http\Controllers\Backend\PaymentInvoice\Admin;


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

class PayToBranchCommissionController extends Controller
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
                                                                ->where('from_branch_id',$branch_id)
                                                                ->whereNull("deleted_at")
                                                                ->latest()
                                                                ->get();
        return view('backend.payment_invoice.admin.pay_to_branch_commission.send_invoice_list',$data);
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
        return view('backend.payment_invoice.admin.pay_to_branch_commission.send_invoice_list_detail',$data);
    }


    public function paidBranchCommissionInvoiceCreate()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = makeInvoiceNo_HH($type = "DACBD-BCPI");
        $data['branches'] = Branch::whereNull('deleted_at')
                                    ->where('branch_type_id','!=',1)
                                    ->get();
        return view('backend.payment_invoice.admin.pay_to_branch_commission.create',$data);
    }


    public function payBranchCommissionCreateListByAjax(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $send_branch_id = $request->received_branch_id;
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
        $data['orders'] = Branch_commission::join('orders','orders.id','=','branch_commissions.order_id')
            ->select('branch_commissions.*','orders.cod_charge',
            'orders.service_charge','orders.product_amount','orders.others_charge','orders.parcel_amount_payment_type_id',
            'orders.order_status_id','orders.parcel_amount_payment_status_id',
            'orders.service_delivery_payment_status_id','orders.service_cod_payment_status_id',
                'orders.id as orderId'
            // DB::raw('sum(orders.client_merchant_payable_amount) as total_amount')
            )
        ->where('branch_commissions.branch_id',$send_branch_id)
        ->where('branch_commissions.active_status',1)
        ->where('orders.service_cod_payment_status_id',3)
        ->where('orders.service_delivery_payment_status_id',3)
        ->where('orders.parcel_amount_payment_status_id',">",6)
        ->whereBetween('orders.created_at',[$startDate,$endDate])
        ->get();
        return view('backend.payment_invoice.admin.pay_to_branch_commission.ajax.list',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function payBranchCommissionCreateListByAjaxStore(Request $request)
    {
        // Start transaction!
        DB::beginTransaction();
        try
        {
            $payment_invoice_no     = $request->payment_invoice_no;
            $received_branch_id     = $request->received_branch_id;
            $merchant_client_id     = $request->merchant_client_id;
            $total_amount           = $request->total_amount;
            $paytoBranch = $this->inserPayToBranchCommission($payment_invoice_no,$total_amount,$received_branch_id);
            $order_ids = $request->order_id;
            $amounts = $request->order_id_amount;
        foreach ($request->order_id as $key => $order_id)
        {
            $this->inserPayToBranchCommissionDetailsData($order_id,$paytoBranch?$paytoBranch->id:NULL,$received_branch_id);
            $this->orderCodServiceStatusChange($order_id);
            $this->receiveAmountChangeCODServiceChargeId($order_id);
        }
            DB::commit();
            Session::flash('success','Branch Commission Amount Paid Successfully!');
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


    public function inserPayToBranchCommission($payment_invoice_no,$total_amount,$received_branch_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $paytoBranch =     new PayToBranchCommissionInvoice();
        $paytoBranch->payment_invoice_no    = $payment_invoice_no;
        $paytoBranch->from_branch_id        = $branch_id;
        $paytoBranch->payment_status_id     = 1;
        $paytoBranch->received_branch_id    = $received_branch_id;
        $paytoBranch->payment_by            = Auth::guard('web')->user()->id;
        $paytoBranch->payment_at            = date('Y-m-d h:i:s');
        $paytoBranch->save();
        return $paytoBranch;
    }


    public function inserPayToBranchCommissionDetailsData($order_id,$payToBranchCommissionInvoiceId,$received_branch_id)
    {
        $branchCom = $this->branchCommissionDetails($order_id,$received_branch_id);
        $payToBranchComInvoiDetails = new PayToBranchCommissionInvoiceDetail();
        $payToBranchComInvoiDetails->pay_to_branch_commission_invoice_id = $payToBranchCommissionInvoiceId;
        $payToBranchComInvoiDetails->order_id                               = $order_id;
        $payToBranchComInvoiDetails->branch_commission_type_id              = $branchCom?$branchCom->branch_commission_type_id :NULL;
        $payToBranchComInvoiDetails->branch_commission_id                   = $branchCom?$branchCom->id :NULL;
        $payToBranchComInvoiDetails->amount                                 = $branchCom?$branchCom->commission:0;
        $payToBranchComInvoiDetails->payment_status_id                      = 1;
        $payToBranchComInvoiDetails->payment_by                             = Auth::guard('web')->user()->id;
        $payToBranchComInvoiDetails->save();

        if($branchCom)
        {
            $branchCom->pay_to_branch_commission_invoice_detail_id = $payToBranchComInvoiDetails->id;
            $branchCom->active_status = 2;
            $branchCom->save();
        }
        return $payToBranchComInvoiDetails;
    }


    public function branchCommissionDetails($order_id,$branch_id)
    {
        return Branch_commission::where('order_id',$order_id)
                        ->where('active_status',1)
                        ->where('branch_id',$branch_id)
                        ->first();

    }

    public function orderCodServiceStatusChange($orderId)
    {
        $order       = Order::find($orderId);
        //$order->parcel_amount_payment_status_id = 9;
        $order->service_cod_payment_status_id = 4;
        $order->service_delivery_payment_status_id = 4;
        //$order->order_status_id                 = 24;
        $order->save();
        return $order;
    }
    public function receiveAmountChangeCODServiceChargeId($orderId)
    {
        $serviceData       = ReceiveAmountHistory::where('order_id',$orderId)
                                            ->where('service_delivery_payment_status_id',3)
                                            ->where('receive_amount_type_id',1)
                                            ->where('activate_status_id',1)
                                            ->first();
        if($serviceData)
        {
            //$order->parcel_amount_payment_status_id = 9;
            $serviceData->service_delivery_payment_status_id = 4;
            //$order->order_status_id                 = 24;
            $serviceData->save();
        }

        $codData       = ReceiveAmountHistory::where('order_id',$orderId)
                                            ->where('service_cod_payment_status_id',3)
                                            ->where('receive_amount_type_id',2)
                                            ->where('activate_status_id',1)
                                            ->first();
        if($codData)
        {     
            //$order->parcel_amount_payment_status_id = 9;
            $codData->service_cod_payment_status_id = 4;
            //$order->order_status_id                 = 24;
            $codData->save();
        }
        return 1;
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
