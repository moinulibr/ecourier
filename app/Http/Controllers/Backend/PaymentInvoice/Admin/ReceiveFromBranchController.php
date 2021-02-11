<?php

namespace App\Http\Controllers\Backend\Paymentinvoice\Admin;

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

class ReceiveFromBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receiveFromOtherBranch()
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoices'] = PayToHeadOfficeInvoice::whereNull('deleted_at')
                            ->latest()
                            ->get();//where('from_branch_id',$branch_id)
        return view('backend.payment_invoice.admin.receive_from_other_branch.view',$data);
    }

    public function receiveFromOtherBranchSingleView($id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
        $data['invoice'] = PayToHeadOfficeInvoice::find($id)->payment_invoice_no;

        $data['invoices'] = PayToHeadOfficeInvoiceDetail::where('pay_to_head_office_invoice_id',$id)
                            ->whereNull('deleted_at')
                            ->get();
        $data['pay_to_head_office_invoice_id'] = $id;
        $data['from_branch_id'] = PayToHeadOfficeInvoice::find($id)->from_branch_id;

        $data['invoices'] =   PayToHeadOfficeInvoiceDetail::where('pay_to_head_office_invoice_id',$id)
        ->whereNull("deleted_at")
        ->orderBy('order_id', 'ASC')
        ->orderBy('receive_amount_type_id', 'ASC')
        ->groupBy('order_id')
        ->groupBy('pay_to_head_office_invoice_id')
        ->get();
        return view('backend.payment_invoice.admin.receive_from_other_branch.view_list',$data);
    }
    public function index()
    {
        //
    }
    public function receivingFromOtherBranchNow($id)
    {
        // Start transaction!
        DB::beginTransaction();
        try
        {
            $update = PayToHeadOfficeInvoice::find($id);
            $update->payment_received_by    = Auth::guard('web')->user()->id;
            $update->received_branch_id     = Auth::guard('web')->user()->branch_id;
            $update->payment_received_at    = date('Y-m-d h:i:s');
            $update->save();

            $alls = PayToHeadOfficeInvoiceDetail::where('pay_to_head_office_invoice_id',$id)
                                                ->whereNull("deleted_at")
                                                ->get();
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
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
        $update = ReceiveAmountHistory::find($id);
        $orderId = $update->order_id;
        $order_id = Order::find($orderId);

        if($receiveAmoutTypeId == 1)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice 
            {
                $update->service_delivery_payment_status_id = 6;//Head Office Receive commission of his own branch
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $update->service_delivery_payment_status_id = 3;
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }else{
                //Branch received from delivery man
                $update->service_delivery_payment_status_id = 3;
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
        }
        else if($receiveAmoutTypeId == 2)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $update->service_cod_payment_status_id = 6;//Head Office Receive commission of his own branch
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $update->service_cod_payment_status_id = 3;
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }else{
                //Branch received from delivery man
                $update->service_cod_payment_status_id = 3;
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
        }

        else if($receiveAmoutTypeId == 4)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $update->parcel_amount_payment_status_id = 8; //Branch received Amount And Preparing
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $update->parcel_amount_payment_status_id = 5;//8
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }else{
                 //Branch received from delivery man
                $update->parcel_amount_payment_status_id = 5;
                $this->updateOrderParcelCodServiceStatus($orderId,$receiveAmoutTypeId);
            }
        }
        $update->save();
        return $update;
    }



    public function updateOrderParcelCodServiceStatus($orderId,$receive_amount_type_id)
    {
        $order_id = Order::find($orderId);
        $branch_id = Auth::guard('web')->user()->branch_id;
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);

        if($receive_amount_type_id == 1)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->service_delivery_payment_status_id =  6;
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->service_delivery_payment_status_id =  3;//
            }else{
                //Branch received from delivery man
                $order_id->service_delivery_payment_status_id =  3;
            }
        }
        else if($receive_amount_type_id == 2)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->service_cod_payment_status_id =  6;//8
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->service_cod_payment_status_id =  3;//8
            }else{
                 //Branch received from delivery man
                $order_id->service_cod_payment_status_id =  3;
            }
        }

        else if($receive_amount_type_id == 4)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )
            {
                $order_id->parcel_amount_payment_status_id =  8;//8
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                //Branch received Amount And Preparing
                $order_id->parcel_amount_payment_status_id =  5;//8
            }else{
                 //Branch received from delivery man
                $order_id->parcel_amount_payment_status_id =  5;
            }
        }

        $order_id->save();
        return $order_id;
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
