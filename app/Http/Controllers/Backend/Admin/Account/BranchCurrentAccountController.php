<?php

namespace App\Http\Controllers\Backend\Admin\Account;

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
class BranchCurrentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentBalanchOfMyBranch(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;

        $created_by = Auth::guard('web')->user()->branch_id;
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
       /*  Order_processing_history::where('rece')
        ->whereBetween('orders.created_at',[$startDate,$endDate])
        ->get(); */

        $getData = ReceiveAmountHistory::whereIn('parcel_amount_payment_status_id',[5,8])
                                    ->where('activate_status_id',1)
                                    //->where('receive_amount_type_id',$receive_amount_type_id)
                                    //->where('received_amount_branch_id',$branch_id)
                                    ->orWhere(function ($query) use($branch_id)
                                        {
                                            return $query->orWhere('service_cod_payment_status_id','>',2);
                                            //->where('received_amount_branch_id',$branch_id);
                                        })
                                    ->orWhere(function ($query) use($branch_id)
                                        {
                                            return $query->orWhere('service_cod_payment_status_id','>',6);
                                            //->where('received_amount_branch_id',$branch_id);
                                        })
                                    ->orWhere(function ($query) use($branch_id)
                                        {
                                            return $query->orWhere('service_delivery_payment_status_id',">",2);
                                            //->where('received_amount_branch_id',$branch_id);
                                        })
                                    ->orWhere(function ($query) use($branch_id)
                                        {
                                            return $query->orWhere('service_delivery_payment_status_id','>',6);
                                            //->where('received_amount_branch_id',$branch_id);
                                        })
                                    //->where('service_delivery_payment_status_id',3)
                                    //->where('service_cod_payment_status_id',3)
                                    //->whereBetween('created_at',[$startDate,$endDate])
                                    ->get();
        $data['total_amount_beforePaid'] = $getData->sum('amount');
        $data['data'] = $getData;

        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['bcommission'] = Branch_commission::where('active_status',1)
                        ->get();
        /* $data['total_amount'] = $data['bcommission']->sum('commission'); */

        $data['paidbcommission'] = Branch_commission::where('active_status',2)
                                                    ->get();
        $data['total_paid_amount'] = $data['paidbcommission']->sum('commission');


        $data['total_amount'] = $data['total_amount_beforePaid'] - $data['total_paid_amount'] ;
        return view('backend.admin.account.branch_current_balance.index',$data); 
    }



    public function branchCommissionOfMyBranch()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['bcommission'] = Branch_commission::where('active_status',1)
                        ->get();

        $data['paidbcommission'] = Branch_commission::where('active_status',2)
                        ->get();
        $data['total_amount'] = $data['bcommission']->sum('commission');
        $data['total_paid_amount'] = $data['paidbcommission']->sum('commission');

        return view('backend.admin.account.branch_commission.index',$data);
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
