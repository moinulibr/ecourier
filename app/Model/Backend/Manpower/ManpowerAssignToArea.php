<?php

namespace App\Model\Backend\Manpower;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Manpower\ManpowerType;
use Illuminate\Database\Eloquent\Model;

class ManpowerAssignToArea extends Model
{
   Protected $table = 'manpower_assign_to_areas';

   public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }


    public function area()
    {
    	return $this->belongsTo(Area::class,'area_id');
    }


    public function manpowertype()
    {
    	return $this->belongsTo(ManpowerType::class,'manpower_type_id');
    }


}
