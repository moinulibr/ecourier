<?php

namespace App\Http\Controllers\Backend\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Backend\Order\Order;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;
use DB;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('merchant');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $query = Order::query();
                $query->where('merchant_id',Auth::guard('merchant')->user()->id)->whereNull('deleted_at');
        
        $data['placedOrder']        = $query->where('status','>',1)->count();
        $data['delivered']          = $query->where('final_success_cancel_status_id',1)->count();
        $data['deliveredParcel']    = ($data['delivered'] * 100) / $data['placedOrder'];//return 25*100/500; // deliveredQty *100 /totalQty  
        $data['canceledReturned']   = $query->where('final_success_cancel_status_id',2)->count();
        $data['returnedToBe']       = $query->where('final_success_cancel_status_id',2)
                                    ->where('status',8)
                                    ->orWhere('order_status_id',39)
                                    ->orWhere('order_status_id',40)
                                    ->count();
        //----------------------------------------------------Payment-----------------------------
        $data['totalSalesPaidAmount'] = BranchPayToMerchantClientInvoiceDetail::where('pay_to_merchant_client_id',Auth::guard('merchant')->user()->id)
                                                ->whereNull('deleted_at')
                                                ->sum('amount');
        $ids = BranchPayToMerchantClientInvoiceDetail::where('pay_to_merchant_client_id',Auth::guard('merchant')->user()->id)
                                            ->whereNull('deleted_at')
                                            ->pluck('order_id');
        $totalChargePaid = 0;
        if(count($ids)>0) 
        {
            $tc =  Order::whereIn('id',$ids)
            ->select('service_charge','cod_charge','others_charge',
            DB::raw('sum(service_charge + cod_charge + others_charge) as totalPaidCharge')
            )->get();
            $totalChargePaid = $tc->sum('totalPaidCharge');
        }
        $data['totalPaidCharge'] = $totalChargePaid;

        $qq = Order::query();
                $qq->where('merchant_id',Auth::guard('merchant')->user()->id)
                ->whereNull('deleted_at')
                ->whereIn('parcel_amount_payment_status_id',[7,8])
                ->select('client_merchant_payable_amount','collect_amount');
        $data['unPaidAmount'] = $qq->sum('collect_amount');
        $data['payProcessing'] = $qq->sum('client_merchant_payable_amount');
        //----------------------------------------------------Payment-----------------------------
        return view('backend.merchant.layouts.partials.dashboard',$data);
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
