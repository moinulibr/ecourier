<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Frontend\DeliveryMan;
use Validator;

class DeliveryManRegistrationController extends Controller
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
                 'father_name' => 'required',
                 'mother_name' => 'required',
                 'father_mobile' => 'required',
                 'email'        => 'required',
                 'mobile'       => 'required',
                 'cvfile'       => 'required',
                
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

                $deliveryman = new DeliveryMan();
                $deliveryman->name         = $request->name;
                $deliveryman->father_name  = $request->father_name;
                $deliveryman->mother_name  = $request->mother_name;
                $deliveryman->father_mobile= $request->father_mobile;
                $deliveryman->email        = $request->email;
                $deliveryman->mobile       = $request->mobile;
                $deliveryman->nidnumber    = $request->nidnumber;




                $nidcardpage = $request->file('nidcardpage');

                if($nidcardpage){
                     $uniqname = uniqid();
                     $ext = strtolower($nidcardpage->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $nidcardpage->move($filepath,$imagename);
                     $deliveryman->nidcardpage = $imagename;
                }

                $fathernid = $request->file('fathernid');

                if($fathernid){
                     $uniqname = uniqid();
                     $ext = strtolower($fathernid->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $fathernid->move($filepath,$imagename);
                     $deliveryman->fathernid = $imagename;
                }  

                $cvfile = $request->file('cvfile');

                if($cvfile){
                     $uniqname = uniqid();
                     $ext = strtolower($cvfile->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $cvfile->move($filepath,$imagename);
                     $deliveryman->cvfile = $imagename;
                }
 
                $deliveryman->address        = $request->address;
                $deliveryman->status        = 1;
                
                $deliveryman->save();

                $notification = array(
                    'message' => 'You are successfully application submitted! Please wait for confirmation',
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
