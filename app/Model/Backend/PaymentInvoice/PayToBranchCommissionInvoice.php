<?php

namespace App\Model\Backend\PaymentInvoice;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\PaymentInvoice\PayToBranchCommissionInvoiceDetail;
class PayToBranchCommissionInvoice extends Model
{
    public function totalInvoiceAmount()
    {
        return PayToBranchCommissionInvoiceDetail::where('pay_to_branch_commission_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('amount');
    }
}
