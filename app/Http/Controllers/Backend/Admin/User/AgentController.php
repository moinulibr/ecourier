<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Carbon\Carbon;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Manpower\ManpowerAssignToArea;
use App\Model\Backend\Branch\Branch;
use App\Model\Backend\Branch\Branch_type;
use App\Model\Backend\Branch\Area_branch;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Manpower\ManpowerCommissionSetting;
use App\Model\Backend\Merchant\Setting\Merchant_Setting;

class AgentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
         $data['agents'] = User::whereIn('role_id',[9])->get();
         $data['branches'] = Branch::whereIn('branch_type_id',[1,2,3,4])->get();

         return view('backend.admin.user.agents.view',$data);
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
             'phone' => 'required|unique:users',
             'email' => 'required|unique:users',
             'password' => 'required',
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            $lastuid = User::orderBy('useruid','DESC')->first();

            $agent = new User();

            $agent->useruid = $lastuid->useruid+1;
            $agent->name    = $request->name;
            $agent->phone   = $request->phone;
            $agent->email   = $request->email;
            $agent->password = bcrypt($request->password);
            $agent->show_password = $request->password;
            $agent->role_id  =  9;
            $agent->branch_id =$request->branch_id;
            $agent->user_approval_status_id = 2;
            $agent->login_status = 1;
            $agent->save();



            $manpowercommissionsetting = new ManpowerCommissionSetting();

            $manpowercommissionsetting->manpower_id      = $agent->id;
            $manpowercommissionsetting->manpower_type_id = 3;
            $manpowercommissionsetting->branch_id        = $request->branch_id;
            $manpowercommissionsetting->branch_type_id   = 4;
            $manpowercommissionsetting->status = 1;
            $manpowercommissionsetting->save();



            $setting = new Merchant_Setting();

            $setting->merchant_id = $agent->id;

            $setting->save();





            $notification = array(
                'message' => 'Successfully add Agent User!',
                'alert-type' => 'success'
            );

            return redirect()->route('agent.index')->with($notification);
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
                    'message' => 'Successfully add Agent User!',
                    'alert-type' => 'success'
                );

             return redirect()->route('agent.index')->with($notification);
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
            'message' => 'Successfully deleted Agent!',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.index')->with($notification);
    }



    public function setting($id)
    {
        $data['manpowerstypes']= ManpowerType::all();
        $data['districts'] = District::all();
        $data['deliverymaninfo'] = User::find($id);
        $data['agentareas'] = ManpowerAssignToArea::where('manpower_id',$id)->get();
        $data['mpcsetting'] = ManpowerCommissionSetting::where('manpower_id',$id)->first();
        $data['branch_typies'] = Branch_type::get();
        $data['merchant_setting'] = Merchant_Setting::where('merchant_id',$id)->first();

        return view('backend.admin.user.agents.setting',$data);
    }






    public function agentstorearea(Request $request)
    {
          $findarea = Area::find($request->area_id);

          $deliverymanarea = New ManpowerAssignToArea();
          $deliverymanarea->area_id         = $findarea->id;
          $deliverymanarea->district_id     = $findarea->district_id;
          $deliverymanarea->manpower_id     = $request->manpower_id;
          $deliverymanarea->manpower_type_id= $request->manpower_type_id;
          $deliverymanarea->branch_id       = 1;
          $deliverymanarea->status          = 1;
          $deliverymanarea->is_active       = 1;
          $deliverymanarea->is_verified     = 1;
          $deliverymanarea->save();

          $notification = array(
               'message' => 'Successfully Add Area!',
               'alert-type' => 'success'
          );

         return redirect()->route('agent.setting',$request->manpower_id)->with($notification);
    }


    public function agentareadestroy($id)
    {
        $findarea = ManpowerAssignToArea::find($id)->delete();
        $notification = array(
               'message' => 'Successfully deleted Delivery Man Area!',
               'alert-type' => 'success'
          );

         return redirect()->back()->with($notification);
    }


    public function agentcommissionsetting(Request $request)
    {
        $manpowersetting = ManpowerCommissionSetting::where('manpower_id',$request->manpower_id)->first();

        $manpowersetting->manpower_type_id = $request->manpower_type_id;
        $manpowersetting->branch_id = 1;
        $manpowersetting->branch_type_id = $request->branch_type_id;
        $manpowersetting->pickup_commission_type_id = $request->pickup_commission_type_id;
        $manpowersetting->pickup_commission_amount = $request->pickup_commission_amount;
        $manpowersetting->delivery_commission_type_id = $request->delivery_commission_type_id;
        $manpowersetting->delivery_commission_amount = $request->delivery_commission_amount;
        $manpowersetting->return_commission_type_id = $request->return_commission_type_id;
        $manpowersetting->return_commission_amount_amount = $request->return_commission_amount_amount;
        $manpowersetting->status = $request->status;
        $manpowersetting->is_active = 1;
        $manpowersetting->is_verified = 1;

        $manpowersetting->save();

        $notification = array(
               'message' => 'Successfully Update Agent Commission Setting!',
               'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }


    public function agentprofileupdate(Request $request)
    {
        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if($request->password){
            $user->password = bcrypt($request->password);
            $user->show_password = $request->password;
        }

        $user->save();
        $notification = array(
               'message' => 'Successfully Update Delivery Man Commission Setting!',
               'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);

    }




    public function agent_setting_update(Request $request,$id)
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

          return redirect()->route('agent.setting',$merchant_setting->merchant_id)->with($notification);


    }












}
