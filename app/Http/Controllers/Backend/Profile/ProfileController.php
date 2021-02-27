<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['profile'] = User::find(Auth::guard('web')->user()->id)->first();
        return view('backend.profile.profile',$data);
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
       $data['profile'] = User::find(Auth::user()->id);
       return view('backend.profile.edit',$data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'. $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $admin = User::find(Auth::user()->id);

            $admin->name    = $request->name;
            $admin->email   = $request->email;
            $admin->phone  = $request->phone;
             
            $image = $request->photo;


            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $admin->photo  = $imagename;
                
            }
            $admin->save();


            $notification = array(
                'message' => 'Profile Update Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('user.profile')->with($notification);
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

     public function setting()
    {
        return view('backend.profile.setting');
    }




    public function changepassword(Request $request ,$id)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->show_password = $request->new_password;
            $user->save();
            $notification = array(
            'message' => 'Successfully password changed.',
            'alert-type' => 'success'
             );

            return redirect()->route('user.profile')->with($notification);
        }else{
            $notification = array(
            'message' => 'Sorry! Your current password dost not match.',
            'alert-type' => 'error'
             );
            return redirect()->back()->with($notification);
        }


    }


}
