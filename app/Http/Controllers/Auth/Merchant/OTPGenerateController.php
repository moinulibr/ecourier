<?php

namespace App\Http\Controllers\Auth\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Backend\Merchant\Auth\Sms_authenticate;
use Illuminate\Support\Facades\Hash;
class OTPGenerateController extends Controller
{

    public function makeOtpForMerchant(Request $request)
    {
        $phone = $request->phone;
        $merchant = User::where('phone',$phone)
                ->where('role_id',userRoleIdMerchant_HH)    
                ->where('user_approval_status_id',userApprovalStatusVerified_HH)    
                ->first();

            date_default_timezone_set("Asia/dhaka"); // set it first on the top 
            $expireTime = date("h:i:s",strtotime(date("h:i:s")." +".merchantLoginOptExpireTime_HS().merchantLoginOptExpireTimeType_HS()));

        if($merchant &&  merchantLoginOtpActivateStatus_HS())
        {
            $merchant_id = $merchant->id;
            $otp = mt_rand(1000, 9999);
            $merchant->login_otp = $otp;
            $merchant->password = Hash::make($otp);
            $merchant->login_otp_expire_time = $expireTime;
            $merchant->save();

            //------send otp in merchant phone---------------- 
                $content = merchantLoginOtpContent_HH($otp);
                $smsSend = new Sms_authenticate();
                $smsSend->sms_from = 'login';
                $smsSend->user_id = $merchant_id;
                $smsSend->sms_count = 1;
                $smsSend->sms_delivery_status = 1;
                $smsSend->sms_content = $content;
                $smsSend->sms_note = $phone;
                $smsSend->save();

                //sms send to phone by this method
                sendingSms_HH($phone,$content);

            //------send otp in merchant phone---------------- 

            return response()->json([
                'status' => 'success',
                'expireTime' => $expireTime
            ]);
        }else{
            return response()->json([
               'status' => 'error'
            ]);
        }
        return response()->json();
    }
    


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
