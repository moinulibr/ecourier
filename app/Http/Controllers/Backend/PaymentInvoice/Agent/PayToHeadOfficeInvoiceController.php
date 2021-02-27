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
use Carbon\Carbon;
use App\User;
use Auth;
use PDF;
use DB;
use Session;
class PayToHeadOfficeInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payToHeadOfficeListView()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoices'] = PayToHeadOfficeInvoice::where('from_branch_id',$branch_id)
                            ->whereNull('deleted_at')
                            ->latest()
                            ->get();
        return view('backend.payment_invoice.agent.send_to_head_office.view',$data);
    }

    public function payToHeadOfficeListShowSingle($id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = PayToHeadOfficeInvoice::find($id)->payment_invoice_no;
        $data['invoices'] = PayToHeadOfficeInvoiceDetail::where('pay_to_head_office_invoice_id',$id)
                            ->whereNull('deleted_at')
                            ->get();
    
     $data['invoices'] =   PayToHeadOfficeInvoiceDetail::where('from_branch_id',$branch_id)
           
            ->where('pay_to_head_office_invoice_id',$id)
        ->orderBy('order_id', 'ASC')
        ->orderBy('receive_amount_type_id', 'ASC')
        ->groupBy('order_id')
        ->groupBy('pay_to_head_office_invoice_id')
        ->whereNull("deleted_at")
        ->get();

        $data['pay_to_head_office_invoice_id'] = $id;
        return view('backend.payment_invoice.agent.send_to_head_office.view_list',$data);
    }



    public function payToHeadOfficeCreate()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = makeInvoiceNo_HH($type = "DACBD");
        return view('backend.payment_invoice.agent.send_to_head_office.index',$data);
    }


    public function payToHeadOfficeList(Request $request)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;

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


        $data['orders'] =   ReceiveAmountHistory::where('received_amount_branch_id',$branch_id)
                    ->where('activate_status_id',1)
                    ->whereIn('parcel_amount_payment_status_id',[NULL,3])
                    ->orWhere(function ($query) use($branch_id)
                        {
                            return $query->orWhere('service_cod_payment_status_id',1)
                            ->where('received_amount_branch_id',$branch_id);
                        })
                    ->orWhere(function ($query) use($branch_id)
                        {
                            return $query->orWhere('service_delivery_payment_status_id',1)
                            ->where('received_amount_branch_id',$branch_id);
                        })
                    ->orderBy('order_id', 'ASC')
                    ->orderBy('receive_amount_type_id', 'ASC')
                    ->groupBy('order_id')
                    ->whereNull("deleted_at")
                    ->whereBetween('created_at',[$startDate,$endDate])
                    ->get();

        return view('backend.payment_invoice.agent.send_to_head_office.ajax.list',$data);
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
    // store///
    public function payToHeadOfficeStore(Request $request)
    {
        //return $this->getReceiveAmountHistory(7);
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->id;

        $order_ids      = $request->order_id;
        $amount         = $request->order_id_amount;
        $invoice_no     = $request->invoice_no;
        $total_amount   = $request->total_amount;

        // Start transaction!
        DB::beginTransaction();
        try
        {
            $payment = $this->payToHeadOfficeInvoiceInsertData($invoice_no,$total_amount);
            //change order_assigning_status_id ,branch_id in the order_assign table
            foreach ($order_ids as $key => $order_id) {
                $this->payToHeadOfficeInvoiceDetailsInsertData($payment,$order_id);///$amount[$key]
            }
            DB::commit();
            Session::flash('success','Parcel Received Successfully!');
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


    /*Insert Pay to head office invoice table*/
    public function payToHeadOfficeInvoiceInsertData($invoice_no,$total_amount)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->id;

        $payment = new PayToHeadOfficeInvoice();
        $payment->payment_invoice_no  = $invoice_no;
        $payment->from_branch_id  = $branch_id;
        //$payment->payment_amount  = $total_amount;
        $payment->payment_method_id  = NULL;
        $payment->payment_status_id  = 1;
        $payment->payment_by  = $created_by;
        $payment->payment_at  = date('Y-m-d h:i:s');
        $payment->payment_description  = NULL;
        $payment->payment_note  = NULL;
        $payment->created_by  = $created_by;
        $payment->save();
        return $payment;
    }

        /*processing method Pay to head office invoice details table*/
    public function payToHeadOfficeInvoiceDetailsInsertData($invoice,$order_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->id;

        $data = $this->getReceiveAmountHistory($order_id);
        foreach ($data as $key => $value)
        {
            if($value->receive_amount_type_id == 1)
            {
                $this->insertPayToHeadOffice($invoice,$order_id,$value->id,$receiveAmoutTypeId=1);
                $this->updateDataReceiveAmountHistory($value->id,1);
            }

            else if($value->receive_amount_type_id == 2)
            {
                $this->insertPayToHeadOffice($invoice,$order_id,$value->id,$receiveAmoutTypeId=2);
                $this->updateDataReceiveAmountHistory($value->id,2);
            }
            else if($value->receive_amount_type_id == 4)
            {
                $this->insertPayToHeadOffice($invoice,$order_id,$value->id,$receiveAmoutTypeId=4);
                $this->updateDataReceiveAmountHistory($value->id,4);
            }

        }
        return 1;
    }

    /*Insert Pay to head office invoice details table*/
    public function insertPayToHeadOffice($invoice,$order_id,$receiveAmountId,$receiveAmoutTypeId)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $created_by = Auth::guard('web')->user()->id;

        $payment = new PayToHeadOfficeInvoiceDetail();
        $payment->pay_to_head_office_invoice_id  = $invoice->id;
        $payment->from_branch_id  = $branch_id;
        $payment->order_id  = $order_id;

        $payment->receive_amount_history_id  = $receiveAmountId;
        $payment->receive_amount_type_id  = $receiveAmoutTypeId;
        $payment->amount             = receivedAmountTypeAmount_HH($order_id,$branch_id,$receiveAmoutTypeId);

        $payment->payment_method_id  = $invoice->payment_method_id;
        $payment->payment_status_id  = $invoice->payment_status_id;
        $payment->payment_by        = $created_by;
        $payment->created_by        = $created_by;
        $payment->save();
        return $payment;
    }

    public function updateDataReceiveAmountHistory($id,$receiveAmoutTypeId)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
        $update = ReceiveAmountHistory::find($id);
        $order_id = $update->order_id;
        if($receiveAmoutTypeId == 1)
        {
            $update->service_delivery_payment_status_id  = 2;
            $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        }
        else if($receiveAmoutTypeId == 2)
        {
            $update->service_cod_payment_status_id = 2;
            $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
        }
        else if($receiveAmoutTypeId == 4)
        {
            if($update->creating_branch_id == $branch_type_id->id)//$branch_type_id->id == head offfice
            {
                $update->parcel_amount_payment_status_id = 8; //Branch received Amount And Preparing
                $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
            }
           else{
                 //Branch received from delivery man
                $update->parcel_amount_payment_status_id = 4;
                $this->updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId);
            }
        }
        $update->save();
        return $update;
    }
    public function updateOrderParcelCodServiceStatus($order_id,$receiveAmoutTypeId)
    {
        $order = Order::find($order_id);
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
        $branch_id = Auth::guard('web')->user()->branch_id;
        if($receiveAmoutTypeId == 1)
        {
            $order->service_delivery_payment_status_id  = 2;
        }
        else if($receiveAmoutTypeId == 2)
        {
            $order->service_cod_payment_status_id = 2;
        }
        else if($receiveAmoutTypeId == 4)
        {
            if($order->creating_branch_id == $branch_type_id->id)//head office
            {
                $order->parcel_amount_payment_status_id = 8;
            }else{
                $order->parcel_amount_payment_status_id = 4;
            }
        }
        $order->save();
        return $order;
    }


    public function getReceiveAmountHistory($order_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $orders =   ReceiveAmountHistory::where('received_amount_branch_id',$branch_id)
        ->where('order_id',$order_id)
        ->select('id','order_id','receive_amount_type_id','amount'
        //DB::raw('sum(amount) as total_amount')
        )
        //->where('destination_branch_id','!=',$branch_id)
        //->where('parcel_amount_payment_status_id',3)
        ->where('activate_status_id',1)
        /* ->orWhere(function ($query)
            {
                return $query->orWhere('service_cod_payment_status_id',1)
                ->orWhere('service_delivery_payment_status_id',1);
            }) */
        ->orderBy('order_id', 'ASC')
        ->orderBy('receive_amount_type_id', 'ASC')
        ->whereNull("deleted_at")
        //->groupBy('order_id')
        ->get();
        return $orders;
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
