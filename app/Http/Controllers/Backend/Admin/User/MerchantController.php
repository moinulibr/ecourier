<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Backend\Merchant\Shop\Merchant_shop;
use App\Model\Backend\Merchant\Setting\Merchant_Setting;
use Validator;
use Session;
use Carbon\Carbon;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;
use App\Model\Backend\Branch\Branch;


class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
         $data['branches'] = Branch::all();
         $data['merchants'] = User::whereIn('role_id',[4])->get();
         return view('backend.admin.user.merchants.view',$data);
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
        $validators =  Validator::make($request->all(),[
             'name' => 'required',
             'branch_id' => 'required',
             'phone' => 'required|unique:users',
             'email' => 'required|unique:users',
             'password' => 'required',
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            $lastuid = User::orderBy('useruid','DESC')->first();

            $merchant = new User();

            $merchant->useruid = $lastuid->useruid+1;
            $merchant->name    = $request->name;
            $merchant->phone   = $request->phone;
            $merchant->email   = $request->email;
            $merchant->password = bcrypt($request->password);
            $merchant->show_password = $request->password;
            $merchant->role_id =  4;
            $merchant->branch_id = $request->branch_id;
            $merchant->user_approval_status_id=2; 
            $merchant->login_status = 1;
            $merchant->save();

            $merchant_setting = new Merchant_Setting();

            $merchant_setting->merchant_id= $merchant->id;
            $merchant_setting->branch_id = 1;

            $merchant_setting->save();


            $notification = array(
                'message' => 'Successfully add Admin!',
                'alert-type' => 'success'
            );

            return redirect()->route('merchant.index')->with($notification);
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
        $validators =  Validator::make($request->all(),[
                 'name' => 'required',
                 'phone' => 'required',
                 'email' => 'required',
                 'role_id' => 'required',
                 'branch_id' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

                $merchant =  User::find($id);
                $merchant->name = $request->name;
                $merchant->phone = $request->phone;
                $merchant->email = $request->email;
                $merchant->password = bcrypt($request->password);
                $merchant->show_password = $request->password;
                $merchant->role_id = $request->role_id;
                $merchant->branch_id = $request->branch_id;
                $merchant->login_status = 1;

                $merchant->save();

                $notification = array(
                    'message' => 'Successfully add merchant!',
                    'alert-type' => 'success'
                );

             return redirect()->route('merchant.index')->with($notification);
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
        User::find($id)->delete();

        $notification = array(
            'message' => 'Successfully deleted Merchant!',
            'alert-type' => 'success'
        );

        return redirect()->route('merchant.index')->with($notification);
    }



    public function settings($id)
    { 
        $data['merchantinfo'] = User::find($id);
        $data['districts'] = District::all();
        $data['shopes']           = Merchant_shop::where('merchant_id',$id)->get();
        $data['merchant_setting'] = Merchant_Setting::where('merchant_id',$id)->first();

        return view('backend.admin.user.merchants.settings',$data);
    }



    public function shopstore(Request $request)
    {

         $findarea = Area::find($request->area_id);

          $shop = New Merchant_shop();

          $shop->merchant_id     = $request->merchant_id;
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

         return redirect()->route('merchant.setting',$request->merchant_id)->with($notification);


    }


    public function shopupdate(Request $request,$id)
    {

         $findarea = Area::find($request->area_id);

          $shop =  Merchant_shop::find($id);

          $shop->merchant_id     = $request->merchant_id;
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
               'message' => 'Successfully updated Merchant Shop!',
               'alert-type' => 'success'
          );

         return redirect()->route('merchant.setting',$request->merchant_id)->with($notification);


    }





    public function merchantprofileupdate(Request $request ,$id)
    {
        $profile = User::find($id);

        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->email = $request->email;
        if($request->password){
            $profile->password = bcrypt($request->password);
        }
        $profile->save();


        $notification = array(
               'message' => 'Successfully updated Merchant Shop!',
               'alert-type' => 'success'
        );

         return redirect()->route('merchant.setting',$id)->with($notification);
    }





    public function merchant_setting_update(Request $request,$id)
    {
          
          $findarea = Area::find($request->area_id);


          $merchant_setting = Merchant_Setting::find($id);

          $merchant_setting->company_name             = $request->company_name;
          $merchant_setting->company_phone            = $request->company_phone;
          $merchant_setting->delivery_charge_activate = $request->delivery_charge_activate;
          $merchant_setting->delivery_charge_same_city= $request->delivery_charge_same_city;
          $merchant_setting->delivery_charge_out_of_city= $request->delivery_charge_out_of_city;
          $merchant_setting->delivery_charge_other_city = $request->delivery_charge_other_city;
          $merchant_setting->return_charge_activate   = $request->return_charge_activate;
          $merchant_setting->return_charge_same_city  = $request->return_charge_same_city;
          $merchant_setting->return_charge_out_of_city= $request->return_charge_out_of_city;
          $merchant_setting->return_charge_other_city = $request->return_charge_other_city;
          $merchant_setting->cod_charge_activate      = $request->cod_charge_activate;
          $merchant_setting->cod_charge_type          = $request->cod_charge_type;
          $merchant_setting->cod_charge_same_city     = $request->cod_charge_same_city;
          $merchant_setting->cod_charge_out_of_city   = $request->cod_charge_out_of_city;
          $merchant_setting->cod_charge_other_city    = $request->cod_charge_other_city;
          $merchant_setting->others_charge            = $request->others_charge;
          $merchant_setting->rca_order_return_parcent = $request->rca_order_return_parcent;
          $merchant_setting->delivery_otp_activate    = 1;
          $merchant_setting->prepaid_delivery_otp     = 0;
          $merchant_setting->cash_on_delivery_otp     = 0;
          $merchant_setting->payment_receive_confirmation = $request->payment_receive_confirmation;
          $merchant_setting->payment_method_id        = 1;
          $merchant_setting->bank_account_id          = 1;
          $merchant_setting->fb_fan_page              = $request->fb_fan_page;
          $merchant_setting->website                  = $request->website;


          $company_logo = $request->file('company_logo');
        
            if($company_logo){
                     $uniqname = uniqid();
                     $ext = strtolower($company_logo->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     @unlink($data->company_logo);
                    $company_logo->move($filepath,$imagename);

                $merchant_setting->company_logo = $imagename;
            }
      

          $merchant_setting->address = $request->address;
          $merchant_setting->area_id = $request->area_id;
          $merchant_setting->city_id = $findarea->district_id;
          $merchant_setting->status  = 1;


          $merchant_setting->save();


        $notification = array(
               'message' => 'Successfully updated Merchant Setting!',
               'alert-type' => 'success'
        );

          return redirect()->route('merchant.setting',$merchant_setting->merchant_id)->with($notification);


    }








}
