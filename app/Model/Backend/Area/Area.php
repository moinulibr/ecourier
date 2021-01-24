<?php

namespace App\Model\Backend\Area;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Admin\Service\Service_city_type;

class Area extends Model
{
    public function division()
    {
    	return $this->belongsTo(Division::class,'division_id');
    }

    public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }

    public function citytype()
    {
    	return $this->belongsTo(Service_city_type::class,'service_city_type_id');
    }

    

}
