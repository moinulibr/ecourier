<?php

namespace App\Model\Backend\Manpower;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Branch\Branch_type;

class ManpowerCommissionSetting extends Model
{
    public function manpowertype()
    {
    	return $this->belongsTo(ManpowerType::class,'manpower_type_id');
    }

    public function branch_type()
    {
    	return $this->belongsTo(Branch_type::class,'branch_type_id');
    }



}
