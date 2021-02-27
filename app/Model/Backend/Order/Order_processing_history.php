<?php

namespace App\Model\Backend\Order;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order_status;
class Order_processing_history extends Model
{
    public function orderStatuses()
    {
        return $this->belongsTo(Order_status::class,'order_status_id','id');
    }
}
