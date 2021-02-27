<?php

namespace App\Model\Backend\PaymentInvoice;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Backend\Branch\Branch;
use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoiceDetail;
class PayToHeadOfficeInvoice extends Model
{
    public function paymentBy()
    {
        return $this->belongsTo(User::class,'payment_by','id');
    }

    public function fromBranchs()
    {
        return $this->belongsTo(Branch::class,'from_branch_id','id');
    }


    public function totalInvoiceAmount()
    {
        return PayToHeadOfficeInvoiceDetail::where('pay_to_head_office_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('amount');
    }
}
