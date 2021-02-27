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

class BranchPayToMerchantClientInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payToMerchantClientIndex()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoices'] = BranchPayToMerchantClientInvoice::whereNull('deleted_at')
                                                                ->where('from_branch_id',$branch_id)
                                                                ->latest()
                                                                ->get();
        return view('backend.payment_invoice.agent.pay_to_merchant_client.send_invoice_list',$data);
    }

    public function payToMerchantClientViewDetails($id)
    {
        $data['invoice']    = BranchPayToMerchantClientInvoice::find($id)->payment_invoice_no;
        $data['invoices']   = BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$id)
                                                                    ->whereNull("deleted_at")
                                                                    ->get();
        return view('backend.payment_invoice.agent.pay_to_merchant_client.send_invoice_list_detail',$data);
    }

    public function payToMerchantClientCreate()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = makeInvoiceNo_HH($type = "DACBD-PTMC");
        $data['merchants'] = User::whereNull('deleted_at')->where('branch_id',$branch_id)->where('role_id',4)->get();
        return view('backend.payment_invoice.agent.pay_to_merchant_client.create',$data);
    }


    //getClientListparcelOwnerType
    public function getClientListparcelOwnerType(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $parcel_owner_type_id = $request->parcel_owner_type_id;
        if($parcel_owner_type_id == 1 )
        {
            $merchants = User::whereNull('deleted_at')
                    ->where('branch_id',$branch_id)
                    ->where('role_id',4)
                    ->get();
            $merchantHtml = "<option value=''>Select Merchant</option>";
            foreach ($merchants as $merchant)
            {
                $merchantHtml .= "<option value='$merchant->id'>$merchant->name</option>";
            }
            return ($merchantHtml);
        }
        else if($parcel_owner_type_id == 2 )
        {
            $gcustomers =General_customer::where('branch_id',$branch_id)->whereNull('deleted_at')->get();
            $gcustomerHtml = "<option value=''>Select General Customer</option>";
            foreach ($gcustomers as $gcustomer)
            {
              $gcustomerHtml .= "<option value='$gcustomer->id'>$gcustomer->name</option>";
            }
            return ($gcustomerHtml);
        }
    }
    //getClientListparcelOwnerType

    public function payToMerchantClientCreateList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $merchant_client_id = $request->merchant_client_id;
        $parcel_owner_type_id = $request->parcel_owner_type_id;
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

        /* $data['orders'] = ReceiveAmountHistory::join('orders','orders.id','=','receive_amount_histories.order_id')
        ->select('receive_amount_histories.*','orders.collect_amount','orders.client_merchant_payable_amount','orders.cod_charge',
        'orders.service_charge','orders.product_amount','orders.others_charge','orders.parcel_amount_payment_type_id','orders.merchant_id',
        'orders.general_customer_id','orders.order_status_id',
        'orders.creating_branch_id','orders.destination_branch_id',
            'orders.client_merchant_payable_amount',
           // DB::raw('sum(orders.client_merchant_payable_amount) as total_amount')
        ) */

        $data['orders'] = Order::join('head_office_pay_to_branch_invoice_details as hoptbid','hoptbid.order_id','=','orders.id')
        ->select('orders.id as orderId','orders.*')  
      ->whereIn('orders.parcel_amount_payment_status_id',[7])
        ->where('orders.creating_branch_id',$branch_id)
        ->where(function($query)use($parcel_owner_type_id,$merchant_client_id)
        {
            if($parcel_owner_type_id == 1)
            {
                return $query->where('orders.merchant_id',$merchant_client_id);
            }
            else if($parcel_owner_type_id == 2)
            {
               return  $query->where('orders.general_customer_id',$merchant_client_id);
            }
        })
        //->where('orders.merchant_id',$merchant_client_id)
        ->whereIn('hoptbid.parcel_amount_payment_status_id',[7])

        ->where('hoptbid.receive_amount_type_id',4)
        //->where('receive_amount_histories.received_amount_branch_id',$branch_id)
        ->whereBetween('hoptbid.created_at',[$startDate,$endDate])
        ->get();
        return view('backend.payment_invoice.agent.pay_to_merchant_client.ajax.list',$data);
    }


    public function payToMerchantClientCreateListStore(Request $request)
    {
         // Start transaction!
         DB::beginTransaction();
         try
         {
            $payment_invoice_no     = $request->payment_invoice_no;
            $parcel_owner_type_id   = $request->parcel_owner_type_id;
            $merchant_client_id     = $request->merchant_client_id;
            $total_amount           = $request->total_amount;
            $paytoBranch = $this->insertBranchPayToMerchantClient($payment_invoice_no,$total_amount,$parcel_owner_type_id,$merchant_client_id);
            $order_ids = $request->order_id;
            $amounts = $request->order_id_amount;

            foreach ($request->order_id as $key => $order_id)
            {
                $this->insertBranchPayToMerchantClientDetailsData($order_id,$amounts[$key],$paytoBranch?$paytoBranch->id:NULL,$parcel_owner_type_id,$merchant_client_id);
            }
             DB::commit();
             Session::flash('success','Client Payable Amount Paid Successfully!');
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


    public function insertBranchPayToMerchantClient($payment_invoice_no,$total_amount,$parcel_owner_type_id,$pay_to_merchant_client_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;

        $paytoBranch = new BranchPayToMerchantClientInvoice();
        $paytoBranch->payment_invoice_no    = $payment_invoice_no;
        $paytoBranch->from_branch_id        = $branch_id;
        //$paytoBranch->payment_amount        = $total_amount;
        $paytoBranch->payment_status_id     = 1;
        $paytoBranch->payment_by            = $created_by;
        $paytoBranch->parcel_owner_type_id  = $parcel_owner_type_id;
        $paytoBranch->pay_to_merchant_client_id = $pay_to_merchant_client_id;
        $paytoBranch->payment_at            = date('Y-m-d h:i:s');
        $paytoBranch->save();
        return $paytoBranch;
    }


    public function insertBranchPayToMerchantClientDetailsData($order_id,$amount,$branch_pay_to_merchant_client_invoice_id,$parcel_owner_type_id,$merchant_client_id)
    {
        
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;

        $order       = Order::find($order_id);
        $order->parcel_amount_payment_status_id = 9;
        $order->order_status_id                 = 24;
        $order->save();
        $this->insertOrderProcessingHistoryData($order_id,$changing_status_id=24);

        $receive = $this->OrderPaymentReceivingHistory($order_id,$receive_amount_type_id=4);
        $this->headOfficePayToBranchInvoiceDetail($order_id,$receive?$receive->id:NULL);

        $paytoBranch = new BranchPayToMerchantClientInvoiceDetail();
        $paytoBranch->branch_pay_to_merchant_client_invoice_id  = $branch_pay_to_merchant_client_invoice_id;
        $paytoBranch->receive_amount_history_id                 = $receive?$receive->id:NULL;
        $paytoBranch->order_id                                  = $order_id;
        $paytoBranch->receive_amount_type_id                    = $receive_amount_type_id;
        $paytoBranch->paid_from_branch_id                       = $branch_id;
        $paytoBranch->parcel_owner_type_id                      = $parcel_owner_type_id;
        $paytoBranch->pay_to_merchant_client_id                 = $merchant_client_id;

        $paytoBranch->amount                                    = $amount;
        $paytoBranch->service_charge                            = $order->service_charge;
        $paytoBranch->cod_charge                                = $order->cod_charge;
        $paytoBranch->others_charge                             = $order->others_charge;
        $paytoBranch->total_charge                              = $order->service_charge + $order->cod_charge + $order->others_charge;
        $paytoBranch->product_amount                            = $order->product_amount;

        $paytoBranch->payment_by                                = $created_by;
        $paytoBranch->payment_status_id                         = 1;
        $paytoBranch->save();
        return $paytoBranch;
    }


    public function headOfficePayToBranchInvoiceDetail($orderId,$receive_amount_history_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data = HeadOfficePayToBranchInvoiceDetail::where('order_id',$orderId)
                                            ->where('receive_amount_history_id',$receive_amount_history_id)
                                            ->where('receive_amount_type_id',4)
                                            ->where('received_branch_id',$branch_id)
                                            ->where('parcel_amount_payment_status_id',7)
                                            ->first();
        if($data )
        {
            $data->parcel_amount_payment_status_id = 9;
            $data->save();
        }
        return $data ;
    }

    public function OrderPaymentReceivingHistory($orderId,$receive_amount_type_id=4)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;
        $created_by_role_id = Auth::guard('web')->user()->role_id;

        $data = ReceiveAmountHistory::where('order_id',$orderId)
                                    ->where('receive_amount_type_id',$receive_amount_type_id)
                                    ->whereIn('parcel_amount_payment_status_id',[7])
                                    //->where('received_amount_branch_id',$branch_id)
                                    ->first();
        if($data)
        {
            $data->parcel_amount_payment_status_id = 9;
            $data->save();
        }
        return $data;
    }



    public function insertOrderProcessingHistoryData($order_id,$changing_status_id)
    {
        $myBranchId = Auth::guard('web')->user()->branch_id;
        $orderProcessing =  new Order_processing_history();
        $orderProcessing->order_id          = $order_id;
        $orderProcessing->order_status_id   = $changing_status_id;
        $orderProcessing->status_changer_id = Auth::guard('web')->user()->id;
        $orderProcessing->created_by        = Auth::guard('web')->user()->id;
        $orderProcessing->branch_id         = $myBranchId;
        $orderProcessing->save();
        return $orderProcessing;
    }

    public function index()
    {
        //
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
