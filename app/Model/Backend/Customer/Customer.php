<?php

namespace App\Model\Backend\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;

class Customer extends Model
{

	 public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }


    public function area()
    {
    	return $this->belongsTo(Area::class,'area_id');
    }
}
