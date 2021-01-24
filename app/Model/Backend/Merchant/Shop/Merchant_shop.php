<?php

namespace App\Model\Backend\Merchant\Shop;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;

class Merchant_shop extends Model
{
    public function area()
    {
    	return $this->belongsTo(Area::class,'area_id');
    }

    public function district()
    {
    	return $this->belongsTo(District::class,'city_id');
    }
}
