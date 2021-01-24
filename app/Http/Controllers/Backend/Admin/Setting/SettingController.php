<?php

namespace App\Http\Controllers\backend\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Admin\Setting;
use Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
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
        //
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
    public function edit()
    {
         $data['setting'] = Setting::find(1);
         return view('backend.admin.settings.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $validators =  Validator::make($request->all(),[
             'company_name' => 'required',
             'phone' => 'required',
             'email' => 'required',
             'callcenter' => 'required',
             'address' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

              $setting = Setting::find(1);


              $setting->company_name = $request->company_name;
              $setting->sologan      = $request->sologan;
              $setting->phone        = $request->phone;
              $setting->email        = $request->email;
              $setting->address      = $request->address;
              $setting->hotlinenumber= $request->hotlinenumber;
              $setting->callcenter   = $request->callcenter;

              $image = $request->logo;

                if($image){
                        $uniqname = uniqid();
                        $ext = strtolower($image->getClientOriginalExtension());
                        $filepath = 'public/images/';
                        $imagename = $filepath.$uniqname.'.'.$ext;
                        @unlink($setting->logo);
                        $image->move($filepath,$imagename);
                        $setting->logo  = $imagename;
                        
                }

 


              $setting->save();


               $notification = array(
                    'message' => 'Successfully Setting Updated!',
                    'alert-type' => 'success'
                );

                return redirect()->route('setting.index')->with($notification);

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
        //
    }
}
