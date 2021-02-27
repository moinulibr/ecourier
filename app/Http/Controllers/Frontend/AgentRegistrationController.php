<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Area\Division;
use App\Model\Backend\Area\District;
use App\Model\Backend\Area\Area;
use App\Model\Merchant;
use App\Model\Frontend\Agent;
use Validator;

class AgentRegistrationController extends Controller
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
                 'email'        => 'required',
                 'mobile'       => 'required',
                 'password'     => 'required',
                 'office_address'=> 'required',
                 'area_id'      => 'required',
                 'payment_type' => 'required',
                 'nidnumber' => 'required',
                 'fathernid' => 'required',
                 'nidcardpdf' => 'required',

        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators)->withInput();
        }
        else{

             $findarea = Area::find($request->area_id);

                $agent = new Agent();
                $agent->name          = $request->name;
                $agent->company_name  = $request->company_name;
                $agent->email         = $request->email;
                $agent->mobile        = $request->mobile;
                $agent->password      = $request->password;
                $agent->office_address= $request->office_address;
                $agent->nidnumber     = $request->nidnumber;
                $agent->district_id   = $findarea->district_id;
                $agent->area_id       = $findarea->id;



                $nidcardpdf = $request->file('nidcardpdf');

                if($nidcardpdf){
                     $uniqname = uniqid();
                     $ext = strtolower($nidcardpdf->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $nidcardpdf->move($filepath,$imagename);
                     $agent->nidcardpdf = $imagename;
                }

                $companytradelicense = $request->file('companytradelicense');

                if($companytradelicense){
                     $uniqname = uniqid();
                     $ext = strtolower($companytradelicense->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $companytradelicense->move($filepath,$imagename);
                     $agent->companytradelicense = $imagename;
                }  

                $fathernid = $request->file('fathernid');

                if($fathernid){
                     $uniqname = uniqid();
                     $ext = strtolower($fathernid->getClientOriginalExtension());
                     $filepath = 'public/images/users/';
                     $imagename = $filepath.$uniqname.'.'.$ext;
                     $fathernid->move($filepath,$imagename);
                     $agent->fathernid = $imagename;
                }

 

                $agent->payment_type  = $request->payment_type;
                $agent->mbankingname  = $request->mbankingname;
                $agent->mbankingnumber= $request->mbankingnumber;
                $agent->bankname      = $request->bankname;
                $agent->bankbrunch    = $request->bankbrunch;
                $agent->accountname   = $request->accountname;
                $agent->accountnumber = $request->accountnumber;
                $agent->account_type  = $request->account_type;
                $agent->status        = 1;
                
                $agent->save();

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
