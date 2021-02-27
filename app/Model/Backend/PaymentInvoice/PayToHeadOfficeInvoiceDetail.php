<?php

namespace App\Model\Backend\PaymentInvoice;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order;
class PayToHeadOfficeInvoiceDetail extends Model
{
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
