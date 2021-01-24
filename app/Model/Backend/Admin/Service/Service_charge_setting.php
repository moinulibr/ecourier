<?php

namespace App\Model\Backend\Admin\Service;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Admin\Weight;
use App\Model\Backend\Admin\Parcel\Parcel_category;
use App\Model\Backend\Admin\Parcel\Parcel_type;


class Service_charge_setting extends Model
{
    public function parcel_type()
    {
        return $this->belongsTo(Parcel_type::class,'parcel_type_id');
    } 

    public function parcel_category()
    {
        return $this->belongsTo(Parcel_category::class,'parcel_category_id');
    } 


    public function service_type()
    {
        return $this->belongsTo(Service_type::class,'service_type_id');
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class,'weight_id');
    }

    public function service_city_type()
    {
        return $this->belongsTo(Service_city_type::class,'service_city_type_id');
    }

    

}
