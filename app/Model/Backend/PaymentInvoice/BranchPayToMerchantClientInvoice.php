<?php

namespace App\Model\Backend\PaymentInvoice;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;

use Illuminate\Database\Eloquent\Model;
use DB;
class BranchPayToMerchantClientInvoice extends Model
{

    public function collectAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->join('orders','orders.id','=','branch_pay_to_merchant_client_invoices.order_id')
        ->select('orders.collect_amount'
        )
        ->get();//,DB::raw('sum(orders.collect_amount) as total_amount')
    }

    public function totalInvoiceAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->sum('amount');
    }
    public function totalInvoiceDeliveryAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->where('receive_amount_type_id',1)
        ->sum('amount');
    }
    public function totalInvoiceCodAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->where('receive_amount_type_id',2)
        ->sum('amount');
    }
    public function totalInvoiceParcelAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->where('receive_amount_type_id',4)
        ->sum('amount');
    }
}
