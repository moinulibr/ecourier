<?php

namespace App\Http\Controllers\Backend\Merchant\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Merchant\Shop\Merchant_shop;
use App\Model\Backend\Merchant\Setting\Merchant_Setting;
use Validator;
use DB;
use Auth;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['shops'] = Merchant_shop::where('merchant_id',Auth::guard('merchant')->user()->id)->where('status',1)->get();       
        return view('backend.merchant.shops.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['districts'] = District::all();
        return view('backend.merchant.shops.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

         $validators =  Validator::make($request->all(),[
                 'shop_name' => 'required',
                 'pickup_phone' => 'required',
                 'pickup_address' => 'required',
                 'area_id' => 'required',
                 

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            
                 $findarea = Area::find($request->area_id);

                  $shop = New Merchant_shop();

                  $shop->merchant_id     = Auth::guard('merchant')->user()->id;
                  $shop->activate_status = 1;
                  $shop->shop_name       = $request->shop_name;
                  $shop->shop_address    = $request->shop_address;
                  $shop->pickup_address  = $request->pickup_address;
                  $shop->area_id         = $findarea->id;
                  $shop->city_id         = $findarea->district_id;
                  $shop->pickup_area_id  = $request->area_id;
                  $shop->pickup_city_id  = $findarea->district_id;
                  $shop->pickup_phone    = $request->pickup_phone;
                  $shop->shop_email      = $request->shop_email;
                  $shop->branch_id       = 1;
                  $shop->status          = 1;
                  $shop->save();

                  $notification = array(
                       'message' => 'Successfully add new Merchant Shop!',
                       'alert-type' => 'success'
                  );

                 return redirect()->route('merchant.shop.index')->with($notification);

        }
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
        $data['shop'] = Merchant_shop::find($id);
        $data['districts'] = District::all();
        return view('backend.merchant.shops.edit',$data);

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
        
         $validators =  Validator::make($request->all(),[
                 'shop_name' => 'required',
                 'pickup_phone' => 'required',
                 'pickup_address' => 'required',
                 'area_id' => 'required',
                 

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            
                 $findarea = Area::find($request->area_id);

                  $shop =  Merchant_shop::find($id);

                  $shop->merchant_id     = Auth::guard('merchant')->user()->id;
                  $shop->activate_status = 1;
                  $shop->shop_name       = $request->shop_name;
                  $shop->shop_address    = $request->shop_address;
                  $shop->pickup_address  = $request->pickup_address;
                  $shop->area_id         = $findarea->id;
                  $shop->city_id         = $findarea->district_id;
                  $shop->pickup_area_id  = $request->area_id;
                  $shop->pickup_city_id  = $findarea->district_id;
                  $shop->pickup_phone    = $request->pickup_phone;
                  $shop->shop_email      = $request->shop_email;
                  $shop->branch_id       = 1;
                  $shop->status          = 1;
                  $shop->save();

                  $notification = array(
                       'message' => 'Successfully Shop Updated',
                       'alert-type' => 'success'
                  );

                 return redirect()->route('merchant.shop.index')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $shop = Merchant_shop::find($id);

         $shop->status = 0;

         $shop->save();

         $notification = array(
                       'message' => 'Shop Delete Successfully!',
                       'alert-type' => 'success'
                  );

         return redirect()->route('merchant.shop.index')->with($notification);
    }
}
