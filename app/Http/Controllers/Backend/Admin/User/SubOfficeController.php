<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Carbon\Carbon;

class SubOfficeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
         $data['suboffices'] = User::whereIn('role_id',[7])->get();
         return view('backend.admin.user.suboffices.view',$data);
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

            $merchant = new User();

            $merchant->useruid = $lastuid->useruid+1;
            $merchant->name    = $request->name;
            $merchant->phone   = $request->phone;
            $merchant->email   = $request->email;
            $merchant->password = bcrypt($request->password);
            $merchant->show_password = $request->password;
            $merchant->role_id =  7;
            $merchant->branch_id= 1;
            $merchant->login_status = 1;
            $merchant->save();

            $notification = array(
                'message' => 'Successfully add Sub Office User!',
                'alert-type' => 'success'
            );

            return redirect()->route('sub.office.index')->with($notification);
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
}
