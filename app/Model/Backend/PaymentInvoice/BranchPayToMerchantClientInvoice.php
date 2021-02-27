<?php

namespace App\Model\Backend\PaymentInvoice;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;

use Illuminate\Database\Eloquent\Model;
use DB;
class BranchPayToMerchantClientInvoice extends Model
{

    public function parcelQty()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->count();
    } 
    public function collectAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->join('orders','orders.id','=','branch_pay_to_merchant_client_invoice_details.order_id')
        ->select('orders.collect_amount'
        )
        ->sum('collect_amount');//,DB::raw('sum(orders.collect_amount) as total_amount')
    } 

    public function totalInvoiceAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('amount');
    }
    public function totalInvoiceDeliveryAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('service_charge');

       /*  return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->join('orders','orders.id','=','branch_pay_to_merchant_client_invoice_details.order_id')
        ->select('branch_pay_to_merchant_client_invoice_details.*','orders.service_charge',
            DB::raw('sum(orders.service_charge) as serviceCharge')
            )
        ->where('branch_pay_to_merchant_client_invoice_details.receive_amount_type_id',4)
        ->whereNull("branch_pay_to_merchant_client_invoice_details.deleted_at")
        ->sum('orders.service_charge'); */
    }
    public function totalInvoiceCodAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('cod_charge');
       /*  return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->join('orders','orders.id','=','branch_pay_to_merchant_client_invoice_details.order_id')
        ->select('branch_pay_to_merchant_client_invoice_details.*','orders.cod_charge',
            DB::raw('sum(orders.cod_charge) as cod_charge')
            )
        ->where('branch_pay_to_merchant_client_invoice_details.receive_amount_type_id',4)
        ->whereNull("branch_pay_to_merchant_client_invoice_details.deleted_at")
        ->sum('orders.cod_charge'); */
    }
    public function totalInvoiceParcelAmount()
    {
        return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('amount');
       /*  return BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$this->id)
        ->where('receive_amount_type_id',4)
        ->whereNull("deleted_at")
        ->sum('amount'); */
    }
}
