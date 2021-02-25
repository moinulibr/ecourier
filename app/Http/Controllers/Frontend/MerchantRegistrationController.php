<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Frontend\Merchant;

class MerchantRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                 'name'         => 'required',
                 'company_name' => 'required',
                 'email'        => 'required|unique:users',
                 'mobile'       => 'required|unique:users',
                 'password'     => 'required',
                 'office_address'=> 'required',
                 'pickupaddress' => 'required',
                 'area_id'      => 'required',
                 'payment_type' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
  

                $findarea = Area::find($request->area_id);

                $merchant = new Merchant();
                $merchant->name         = $request->name;
                $merchant->company_name = $request->company_name;
                $merchant->email        = $request->email;
                $merchant->mobile       = $request->mobile;
                $merchant->password     = $request->password;
                $merchant->office_address = $request->office_address;
                $merchant->pickupaddress = $request->pickupaddress;
                $merchant->division_id   = $findarea->division_id;
                $merchant->district_id   = $findarea->district_id;
                $merchant->area_id       = $findarea->id;
                $merchant->payment_type  = $request->payment_type;
                $merchant->mbankingname  = $request->mbankingname;
                $merchant->mbankingnumber= $request->mbankingnumber;
                $merchant->bankname      = $request->bankname;
                $merchant->bankbrunch    = $request->bankbrunch;
                $merchant->accountname   = $request->accountname;
                $merchant->accountnumber = $request->accountnumber;
                $merchant->account_type  = $request->account_type;
                $merchant->status        = 1;
                
                $merchant->save();


            
                $lastuid  = User::orderBy('useruid','DESC')->first();

                $merchant = new User();

                $merchant->useruid = $lastuid->useruid+1;
                $merchant->name    = $request->name;
                $merchant->phone   = $request->mobile;
                $merchant->email   = $request->email;
                $merchant->password= bcrypt($request->password);
                $merchant->show_password = $request->password;
                $merchant->role_id =  4;
                $merchant->branch_id= 1;
                $merchant->user_approval_status_id=2; 
                $merchant->login_status = 1;
                $merchant->save();

                $merchant_setting = New Merchant_Setting();

                  $merchant_setting->company_name             = $request->company_name;
                  $merchant_setting->company_phone            = $request->mobile;
                  $merchant_setting->delivery_charge_activate = 1;
                  $merchant_setting->delivery_charge_same_city= 0;
                  $merchant_setting->delivery_charge_out_of_city=0;
                  $merchant_setting->delivery_charge_other_city =0;
                  $merchant_setting->return_charge_activate   = 1;
                  $merchant_setting->return_charge_same_city  = 0;
                  $merchant_setting->return_charge_out_of_city= 0;
                  $merchant_setting->return_charge_other_city = 0;
                  $merchant_setting->cod_charge_activate      = 1;
                  $merchant_setting->cod_charge_type          = 1;
                  $merchant_setting->cod_charge_same_city     = 0;
                  $merchant_setting->cod_charge_out_of_city   = 0;
                  $merchant_setting->cod_charge_other_city    = 0;
                  $merchant_setting->others_charge            = 0;
                  $merchant_setting->rca_order_return_parcent = 0;
                  $merchant_setting->delivery_otp_activate    = 1;
                  $merchant_setting->prepaid_delivery_otp     = 0;
                  $merchant_setting->cash_on_delivery_otp     = 0;
                  $merchant_setting->payment_receive_confirmation =0;
                  $merchant_setting->payment_method_id        = 1;
                  $merchant_setting->bank_account_id          = 1;
            

                  $merchant_setting->address = $request->office_address;
                  $merchant_setting->area_id = $request->area_id;
                  $merchant_setting->city_id = $findarea->district_id;
                  $merchant_setting->status  = 1;


                  $merchant_setting->save();

          
                  $shop = New Merchant_shop();

                  $shop->merchant_id     = $merchant->id;
                  $shop->activate_status = 1;
                  $shop->shop_name       = $request->company_name;
                  $shop->shop_address    = $request->office_address;
                  $shop->pickup_address  = $request->pickupaddress;
                  $shop->area_id         = $findarea->id;
                  $shop->city_id         = $findarea->district_id;
                  $shop->pickup_area_id  = $request->area_id;
                  $shop->pickup_city_id  = $findarea->district_id;
                  $shop->pickup_phone    = $request->mobile;
                  $shop->shop_email      = $request->email;
                  $shop->branch_id       = 1;
                  $shop->status          = 1;
                  $shop->save();

     
                    $notification = array(
                        'message' => 'Successfully Merchant Registration Complete!',
                        'alert-type' => 'success'
                    );


               return redirect(url('merchant/login'))->with($notification);
           
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
