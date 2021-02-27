<?php

namespace App\Http\Controllers\Backend\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;
use App\Model\Backend\Manpower\ManpowerAssignToArea;
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Manpower\ManpowerCommissionSetting;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stuffs'] = User::where('branch_id',Auth::guard('web')->user()->branch_id)->get();
        $data['districts'] = District::all();
        return view('backend.agent.stuffs.view',$data);  
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
             'area_id' => 'required'
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            $lastuid = User::orderBy('useruid','DESC')->first();

            $admin = new User();

            $admin->useruid      = $lastuid->useruid+1;
            $admin->name         = $request->name;
            $admin->phone        = $request->phone;
            $admin->email        = $request->email;
            $admin->password     = bcrypt($request->password);
            $admin->show_password= $request->password;
            $admin->role_id      =  5;
            $admin->branch_id    =  Auth::guard('web')->user()->branch_id;
            $admin->login_status = 1;
            $admin->user_approval_status_id =2;
            $admin->save();



            $findarea = Area::find($request->area_id);

              $deliverymanarea = New ManpowerAssignToArea();
              $deliverymanarea->area_id         = $findarea->id;
              $deliverymanarea->district_id     = $findarea->district_id;
              $deliverymanarea->manpower_id     = $admin->id;
              $deliverymanarea->manpower_type_id= 3;
              $deliverymanarea->branch_id       = Auth::guard('web')->user()->branch_id;
              $deliverymanarea->status          = 1;
              $deliverymanarea->is_active       = 1;
              $deliverymanarea->is_verified     = 1;
              $deliverymanarea->save();




            $manpowersetting = New ManpowerCommissionSetting();
            $manpowersetting->manpower_id = $admin->id;
            $manpowersetting->manpower_type_id = 3;
            $manpowersetting->branch_id = Auth::guard('web')->user()->branch_id;
            $manpowersetting->branch_type_id =  getAreaIdByBranchId_HH(Auth::guard('web')->user()->branch_id)?getAreaIdByBranchId_HH(Auth::guard('web')->user()->branch_id)->branch_type_id:1;
            $manpowersetting->pickup_commission_type_id = 1;
            $manpowersetting->pickup_commission_amount = 0;
            $manpowersetting->delivery_commission_type_id =1;
            $manpowersetting->delivery_commission_amount = 0;
            $manpowersetting->return_commission_type_id =  1;
            $manpowersetting->return_commission_amount_amount = 0;
            $manpowersetting->status = 1;
            $manpowersetting->is_active = 1;
            $manpowersetting->is_verified = 1;

            $manpowersetting->save();

 

            $notification = array(
                'message' => 'Successfully add Delivery Man!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
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
            

            $admin = new User();
  
            $admin->name         = $request->name;
            $admin->phone        = $request->phone;
            $admin->email        = $request->email;
            if($request->password){
                $admin->password     = bcrypt($request->password);
                $admin->show_password= $request->password;
            }

            $admin->login_status =1;
            $admin->user_approval_status_id =2;
            $admin->save();

  
            $notification = array(
                'message' => 'Successfully Edit Delivery Man!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
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
        $stuff = User::find($id);
        $stuff->status = 0;
        $stuff->save();


        $notification = array(
            'message' => 'Successfully delivery Man Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
           
    }
}
