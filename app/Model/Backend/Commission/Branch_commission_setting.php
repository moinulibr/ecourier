<?php

namespace App\Model\Backend\Commission;

use Illuminate\Database\Eloquent\Model;

class Branch_commission_setting extends Model
{
     protected $fillable = [
        'branch_id', 'branch_type_id', 'create_and_pick_commission_type_id','create_and_pick_commission_amount', 'create_pick_and_delivery_commision_type_id', 'create_pick_and_delivery_commision_amount','receive_and_delivery_commision_type_id', 'receive_and_delivery_commision_amount', 'receive_as_media_commision_type_id','receive_as_media_commision_amount', 'sending_as_media_commision_type_id', 'sending_as_media_commision_amount','status'
    ];
}
