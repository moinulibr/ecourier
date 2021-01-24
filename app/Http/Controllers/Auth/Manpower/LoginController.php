<?php

namespace App\Http\Controllers\Auth\Manpower;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsersManpower;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsersManpower;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:manpower')->except('logout');
    }

    public function logout(Request $request)
    {
        //extra added here
            $user = Auth::guard('manpower')->user();
            $user->login_status = 0;
                /* if(merchantAfterLoginPasswordFieldNullActivateMethod_HS())
                {
                    $user->password = NULL;
                }
                if(merchantAfterLoginOptFieldNullActivateMethod_HS())
                {
                    $user->login_otp = NULL;
                } */
            $user->save();
        //extra added here

        $this->guard('manpower')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
                return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('home');
    }
}
