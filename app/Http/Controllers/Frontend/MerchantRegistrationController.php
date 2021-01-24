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
                 'email'        => 'required',
                 'mobile'       => 'required',
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
