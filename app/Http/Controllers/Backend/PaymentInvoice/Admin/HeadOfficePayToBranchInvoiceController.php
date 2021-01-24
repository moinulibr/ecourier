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

class HeadOfficePayToBranchInvoiceController extends Controller
{
    public function sendInvoiceList()
    {
        $data['invoices'] = HeadOfficePayToBranchInvoice::whereNull('deleted_at')->latest()->get();
        return view('backend.payment_invoice.admin.send_to_other_branch.send_invoice_list',$data); 
    }
    public function sendInvoiceListDetails($id)
    {
        $data['invoice'] = HeadOfficePayToBranchInvoice::find($id)->payment_invoice_no;
        $data['invoices'] = HeadOfficePayToBranchInvoiceDetail::where('head_office_pay_to_branch_invoice_id',$id)->get();
        return view('backend.payment_invoice.admin.send_to_other_branch.send_invoice_list_detail',$data); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendToOthersBranchFromAdmin()
    {
        $data['branches'] = Branch::whereNull('deleted_at')->where('branch_type_id','>',1)->get();
        $data['invoice'] = makeInvoiceNo_HH($type = "DACBD-APTB");
        return view('backend.payment_invoice.admin.send_to_other_branch.index',$data);
    }


    public function sendToOthersBranchFromAdminAjaxList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;

        $send_payment_type = $request->send_payment_type;
        $send_branch_id = $request->send_branch_id;

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


        $data['orders'] = PayToHeadOfficeInvoiceDetail::join('orders','orders.id','=','pay_to_head_office_invoice_details.order_id')
                                ->select('pay_to_head_office_invoice_details.*','orders.creating_branch_id','orders.destination_branch_id',
                                    'orders.client_merchant_payable_amount',
                                   // DB::raw('sum(orders.client_merchant_payable_amount) as total_amount')
                                )
                                ->where('orders.creating_branch_id',$send_branch_id)
                                ->where('orders.creating_branch_id','!=',$branch_id)
                                ->where('orders.parcel_amount_payment_status_id',5)
                                ->where('pay_to_head_office_invoice_details.payment_status_id',1)
                                ->where('pay_to_head_office_invoice_details.receive_amount_type_id',4)
                                //->groupBy('pay_to_head_office_invoice_details.order_id')
                                ->whereBetween('pay_to_head_office_invoice_details.created_at',[$startDate,$endDate])
                                ->get();
            /* 
                $data['orders'] = ReceiveAmountHistory::where('received_amount_branch_id',$branch_id)
                ->select('id','order_id','receive_amount_type_id','amount',
                    DB::raw('sum(amount) as total_amount')
                )
                //->where('destination_branch_id','!=',$branch_id)

                ->orWhere(function ($query)
                    {
                        return $query->orWhere('service_cod_payment_status_id',1)
                        ->orWhere('service_delivery_payment_status_id',1);
                    })
                ->orderBy('order_id', 'ASC')
                ->orderBy('receive_amount_type_id', 'ASC')
                ->groupBy('order_id')
                ->whereBetween('created_at',[$startDate,$endDate])
                ->get(); 
            */

        return view('backend.payment_invoice.admin.send_to_other_branch.ajax.list',$data);
    }


    public function sendToOthersBranchFromAdminListStore(Request $request)
    {
         // Start transaction!
         DB::beginTransaction();
         try
         {
            $payment_invoice_no = $request->payment_invoice_no;
            $send_branch_id = $request->send_branch_id;
            $total_amount = $request->total_amount;
            $paytoBranch = $this->insertHeadOfficeSendToBranchInvoiceData($payment_invoice_no,$total_amount,$send_branch_id);
            $order_ids = $request->order_id;
            $amounts = $request->order_id_amount;
             //$alls = PayToHeadOfficeInvoiceDetail::where('order_id',$id)->get();
            foreach ($request->order_id as $key => $order_id)
            {
                $this->insertHeadOfficeSendToBranchInvoiceDetailsData($order_id,$amounts[$key],$paytoBranch->id,$send_branch_id);
            }
             DB::commit();
             Session::flash('success','Invoice Amount Send Successfully!');
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
   
    public function insertHeadOfficeSendToBranchInvoiceData($payment_invoice_no,$total_amount,$send_branch_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;

        $paytoBranch = new HeadOfficePayToBranchInvoice();
        $paytoBranch->payment_invoice_no    = $payment_invoice_no;
        $paytoBranch->from_branch_id        = $branch_id;
        $paytoBranch->payment_amount        = $total_amount;
        $paytoBranch->payment_status_id     = 1;
        $paytoBranch->payment_by            = $created_by;
        $paytoBranch->received_branch_id    = $send_branch_id;
        $paytoBranch->payment_at            = date('Y-m-d h:i:s');
        $paytoBranch->save();
        return $paytoBranch;
    }

    public function insertHeadOfficeSendToBranchInvoiceDetailsData($order_id,$amount,$head_office_pay_to_branch_invoice_id,$send_branch_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;
        $receive = $this->OrderPaymentReceivingHistory($order_id,$receive_amount_type_id=4,$amount,$send_branch_id);
        $data = new HeadOfficePayToBranchInvoiceDetail(); 
        $data->head_office_pay_to_branch_invoice_id = $head_office_pay_to_branch_invoice_id; 
        $data->receive_amount_history_id            = $receive->id; 
        $data->order_id                             = $order_id; 
        $data->receive_amount_type_id               = 4; 
        $data->amount                               = $amount; 
        $data->received_branch_id                   = $send_branch_id; 
        $data->payment_by                           = $created_by; 
        $data->created_by                           = $created_by; 
        $data->save();
        return $data;
    }



    public function OrderPaymentReceivingHistory($orderId,$receive_amount_type_id=4,$amount,$send_branch_id)
    {   
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->branch_id;
        $created_by_role_id = Auth::guard('web')->user()->role_id;

        $order       = Order::find($orderId);
        $order->parcel_amount_payment_status_id = 6;
        $order->save();

        $branch_id      = Auth::guard('web')->user()->branch_id;
        $parcel_amount_payment_status_id =  NULL;
        $service_delivery_payment_status_id = NULL;
        $service_cod_payment_status_id = NULL;
      
        $parcel_amount_payment_status_id = 6;
       
        //-------------------------------------------
        if($receive_amount_type_id == 1)
        {
            $service_delivery_payment_status_id = 1;
        }
        else if($receive_amount_type_id == 2)
        {
            $service_cod_payment_status_id = 1;
        }
        else if($receive_amount_type_id == 4)
        {
            $service_cod_payment_status_id = NULL;
        }
        $orderProcessing =  new ReceiveAmountHistory();
        $orderProcessing->order_id                          = $order->id;
        $orderProcessing->parcel_owner_type_id              = $order->parcel_owner_type_id;
        $orderProcessing->receive_amount_type_id            = $receive_amount_type_id;
        $orderProcessing->received_by                       = NULL;
        $orderProcessing->amount                            = $amount;
        $orderProcessing->received_from                     = $created_by;
        $orderProcessing->received_from_user_role_id        = $created_by_role_id;
        $orderProcessing->creating_branch_id                = $order->creating_branch_id;
        $orderProcessing->received_amount_branch_id         = $send_branch_id;
        $orderProcessing->creating_branch_type_id           = $order->creating_branch_type_id;
        $orderProcessing->destination_branch_id             = $order->destination_branch_id;
        $orderProcessing->received_branch_type_id           = getBranchByBranchId_HH($send_branch_id)?getBranchByBranchId_HH($send_branch_id)->branch_type_id:NULL;
        $orderProcessing->parcel_amount_payment_status_id   = $parcel_amount_payment_status_id;
        //$orderProcessing->service_cod_payment_status_id     = $service_cod_payment_status_id;
        //$orderProcessing->service_delivery_payment_status_id= $service_delivery_payment_status_id;
        $orderProcessing->created_by                        = Auth::guard('web')->user()->id;
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
