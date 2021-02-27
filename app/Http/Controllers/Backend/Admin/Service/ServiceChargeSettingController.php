<?php

namespace App\Http\Controllers\Backend\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Admin\Service\Service_city_type;
use App\Model\Backend\Admin\Service\Service_charge_setting;
use App\Model\Backend\Admin\Service\Service_type;
use App\Model\Backend\Admin\Weight;
use Validator;
use App\Model\Backend\Admin\Parcel\Parcel_category;
use App\Model\Backend\Admin\Parcel\Parcel_type;

class ServiceChargeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['parceltypies'] = Parcel_type::all();
        $data['parcelcategories'] =  Parcel_category::all();
        $data['servicetypies'] = Service_type::all();
        $data['servicetcitytypies'] = Service_city_type::all();
        $data['weights'] = Weight::all();

        $data['servicechargesettings'] = Service_charge_setting::all();

        return view('backend.admin.service.service_charge_setting',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $setting = New Service_charge_setting();

          $setting->service_type_id = $request->service_type_id;
          $setting->parcel_type_id  = $request->parcel_type_id;
          $setting->parcel_category_id  = $request->parcel_category_id;
          $setting->weight_id = $request->weight_id;
          $setting->service_city_type_id = $request->service_city_type_id;
          $setting->charge = $request->charge;
          $setting->third_party_charge = $request->third_party_charge;
          $setting->return_charge = $request->return_charge;
          $setting->status = 1;

          $setting->save();

          $notification = array(
                'message' => 'Successfully Updated Delivery Charge Setting!',
                'alert-type' => 'success'
          );

           return redirect()->route('service.charge.setting.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $setting = Service_charge_setting::find($id);

          $setting->service_type_id = $request->service_type_id;
          $setting->parcel_type_id  = $request->parcel_type_id;
          $setting->parcel_category_id  = $request->parcel_category_id;
          $setting->weight_id = $request->weight_id;
          $setting->service_city_type_id = $request->service_city_type_id;
          $setting->charge = $request->charge;
          $setting->third_party_charge = $request->third_party_charge;
          $setting->return_charge = $request->return_charge;
          $setting->status = 1;

          $setting->save();

          $notification = array(
                'message' => 'Successfully Updated Delivery Charge Setting!',
                'alert-type' => 'success'
          );

           return redirect()->route('service.charge.setting.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting =  Service_charge_setting::find($id)->delete();
        $notification = array(
                'message' => 'Successfully Deleted Delivery Charge Setting!',
                'alert-type' => 'success'
        );

       return redirect()->route('service.charge.setting.index')->with($notification);
    }
}
