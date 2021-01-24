<?php

namespace App\Model\Backend\Branch;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function area()
    {
    	return $this->belongsTo(Area::class,'area_id');
    }

    public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }

    public function branchtype()
    {
    	return $this->belongsTo(Branch_type::class,'branch_type_id');
    }

    public function underbranch()
    {
    	return $this->belongsTo(Branch::class,'parent_id');
    }



}
