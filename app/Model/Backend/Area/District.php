<?php

namespace App\Model\Backend\Area;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function division()
    {
    	return $this->belongsTo(Division::class,'division_id');
    }


    public function area()
    {
    	return $this->hasMany(Area::class,'district_id');
    }



}
