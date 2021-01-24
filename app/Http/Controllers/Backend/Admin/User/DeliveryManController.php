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
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Manpower\ManpowerCommissionSetting;
use App\Model\Backend\Branch\Branch_type;
use App\Model\Backend\Branch\Branch;

class DeliveryManController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['deliverymans'] = User::whereIn('role_id',[5])->get();
         $data['manpowerstypes']= ManpowerType::all();
         $data['districts'] = District::all();
         $data['branch_typies'] = Branch_type::get();
         $data['branches'] = Branch::whereIn('branch_type_id',[1,2,3,4])->get();

         return view('backend.admin.user.manpowers.view',$data);
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
             'area_id' => 'required',
             'branch_id' => 'required',
             'manpower_type_id' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{
            $lastuid = User::orderBy('useruid','DESC')->first();

            $admin = new User();

            $admin->useruid = $lastuid->useruid+1;
            $admin->name    = $request->name;
            $admin->phone   = $request->phone;
            $admin->email   = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->show_password = $request->password;
            $admin->role_id =  5;
            $admin->branch_id= $request->branch_id;
            $admin->login_status = 1;
            $admin->save();



            $findarea = Area::find($request->area_id);

              $deliverymanarea = New ManpowerAssignToArea();
              $deliverymanarea->area_id         = $findarea->id;
              $deliverymanarea->district_id     = $findarea->district_id;
              $deliverymanarea->manpower_id     = $admin->id;
              $deliverymanarea->manpower_type_id= $request->manpower_type_id;
              $deliverymanarea->branch_id       = $request->branch_id;
              $deliverymanarea->status          = 1;
              $deliverymanarea->is_active       = 1;
              $deliverymanarea->is_verified     = 1;
              $deliverymanarea->save();




            $manpowersetting = New ManpowerCommissionSetting();
            $manpowersetting->manpower_id = $admin->id;
            $manpowersetting->manpower_type_id = $request->manpower_type_id;
            $manpowersetting->branch_id = $request->branch_id;
            $manpowersetting->branch_type_id =  getAreaIdByBranchId_HH($request->branch_id)?getAreaIdByBranchId_HH($request->branch_id)->branch_type_id:1;
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

            return redirect()->route('deliveryman.index')->with($notification);
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

                $admin =  User::find($id);
                $admin->name = $request->name;
                $admin->phone = $request->phone;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->show_password = $request->password;
                $admin->role_id = $request->role_id;
                $admin->branch_id = $request->branch_id;
                $admin->login_status = 1;

                $admin->save();

                $notification = array(
                    'message' => 'Successfully add Admin!',
                    'alert-type' => 'success'
                );

             return redirect()->route('admin.index')->with($notification);
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
            'message' => 'Successfully deleted Admin!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.index')->with($notification);
    }



    public function deliverymansetting($id)
    {
        $data['manpowerstypes']= ManpowerType::all();
        $data['districts'] = District::all();
        $data['deliverymaninfo'] = User::find($id);
        $data['deliverymanareas'] = ManpowerAssignToArea::where('manpower_id',$id)->get();
        $data['mpcsetting'] = ManpowerCommissionSetting::where('manpower_id',$id)->first();
        $data['branch_typies'] = Branch_type::get();
        return view('backend.admin.user.manpowers.setting',$data);
    }


    public function deliverymanstorearea(Request $request)
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

         return redirect()->route('deliveryman.setting',$request->manpower_id)->with($notification);
    }


    public function deliverymanareadestroy($id)
    {
        $findarea = ManpowerAssignToArea::find($id)->delete();
        $notification = array(
               'message' => 'Successfully deleted Delivery Man Area!',
               'alert-type' => 'success'
          );

         return redirect()->back()->with($notification);
    }


    public function deliverymancommissionsetting(Request $request)
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
               'message' => 'Successfully Update Delivery Man Commission Setting!',
               'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }


    public function deliverymanprofileupdate(Request $request)
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



}
