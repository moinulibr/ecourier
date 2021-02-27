<?php

namespace App\Model\Backend\Order;
use App\Model\Backend\Order\Order;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Branch\Branch;
class Order_destination extends Model
{
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
}
