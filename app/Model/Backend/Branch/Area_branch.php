<?php

namespace App\Model\Backend\Branch;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;

class Area_branch extends Model
{
    protected $table = 'area_branch';

    public function area()
    {
    	return $this->belongsTo(Area::class,'area_id');
    }

    public function district()
    {
    	return $this->belongsTo(District::class,'district_id');
    }

    public function branch()
    {
    	return $this->belongsTo(Branch::class,'branch_id');
    }
}
