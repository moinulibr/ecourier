<?php

namespace App\Model\Backend\ReceiveAmount;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order;
class ReceiveAmountHistory extends Model
{
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

}
