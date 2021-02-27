<?php

namespace App\Model\Backend\Order;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order;
use App\User;
class Order_assign extends Model
{
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function manpowers()
    {
        return $this->belongsTo(User::class,'manpower_id','id');
    }
}
