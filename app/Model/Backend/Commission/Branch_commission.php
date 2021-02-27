<?php

namespace App\Model\Backend\Commission;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order;
class Branch_commission extends Model
{
    protected $table = "branch_commissions";
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
