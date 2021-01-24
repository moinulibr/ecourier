<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Carbon\Carbon;
use App\Model\Backend\Branch\Branch;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['admins'] = User::whereIn('role_id',[1,2])->get();
         $data['branches'] = Branch::whereIn('branch_type_id',[1,2,3,4])->get();
         return view('backend.admin.user.admin.view',$data);
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
             'role_id' => 'required',
             'branch_id' => 'required',

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
            $admin->role_id = $request->role_id;
            $admin->branch_id= $request->branch_id;
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
}
