<?php

namespace App\Model\Backend\PaymentInvoice;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoiceDetail;
class HeadOfficePayToBranchInvoice extends Model
{


    public function totalInvoiceAmount()
    {
        return HeadOfficePayToBranchInvoiceDetail::where('head_office_pay_to_branch_invoice_id',$this->id)
        ->whereNull("deleted_at")
        ->sum('amount');
    }
} 
