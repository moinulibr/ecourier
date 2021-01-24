<?php

namespace App\Http\Controllers\Auth\Merchant;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsersMerchant;
use Illuminate\Http\Request;
use Auth;

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

    use AuthenticatesUsersMerchant;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = merchantDashboardRoute_HH;
   // protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {   
        return view('auth.merchant.login');
    }
    

  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:merchant')->except('logout');
    }


    /*public function login(Request $request)
    {
         $credentials = ['phone' => $request->phone, 'password' => $request->password];

        //if (Auth::guard('merchant')->attempt($credentials, false, false)) {

        //$credentials = $request->only('email', 'password');

        if(Auth::guard('merchant')->attempt($credentials)){
            $user = Auth::guard('merchant')->user();
            //$success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['token'] =  $user->accessToken;
            //return response()->json(['success' => $success], $this->successStatus);
            session()->flash('msg','Login Successfully!');
            response()->json(['success' => $success]);
            return "login";
            return redirect()->route('home');
        }
        else{
            return "no";
            return response()->json(['error'=>'Email or password incorrect'], 401);
        }

    }*/


    public function logout(Request $request)
    {
        //extra added here
            $user = Auth::guard('merchant')->user();
            $user->login_status = 0;
                if(merchantAfterLoginPasswordFieldNullActivateMethod_HS())
                {
                    $user->password = NULL;
                }
                if(merchantAfterLoginOptFieldNullActivateMethod_HS())
                {
                    $user->login_otp = NULL;
                }
            $user->save();
        //extra added here

        $this->guard('merchant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
                return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('home');
    }

    protected function guard()
    {
        return Auth::guard('merchant');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginAttempt(Request $request)
    {
        dd('merchant.login');
       /*  $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        } */
        $credentials = ['phone' => $request->phone, 'password' => $request->password];

        //if (Auth::guard('merchant')->attempt($credentials, false, false)) {

        //$credentials = $request->only('email', 'password');

        if(Auth::guard('merchant')->attempt($credentials)){
            $user = Auth::guard('merchant')->user();
            //$success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['token'] =  $user->accessToken;
            //return response()->json(['success' => $success], $this->successStatus);
            session()->flash('msg','Login Successfully!');
            response()->json(['success' => $success]);
            return redirect()->route('merchant.order.k');
            return redirect()->route('home');
        }
        else{
            return response()->json(['error'=>'Email or password incorrect'], 401);
        }



        if (method_exists($this, 'hasTooManyLoginAttempts') &&
        $this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

            if ($this->attemptLogin($request)) {
            //extra added here
                $user = auth()->user();
                $user->login_status = 1;
                $user->save();
            //extra added here
            if(auth()->user()->role_id != HS_MERCHANT_USER_ROLE_ID || auth()->user()->role_id != HS_DELIVERYMAN_USER_ROLE_ID)
            {
                return $this->sendLoginResponse($request);
            }
            else{
                $user = auth()->user();
                $user->login_status = 0;
                $user->save();
                Auth::logout();
                return redirect()->route(HS_MERCHANT_LOGIN_WEB_ROUTE_NAME);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        //$this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);



            $credentials = $request->except('_token');

                /* $validator = Validator::make($input,[
                'email' = 'required|email',
                'password' = 'required|min:6'
                ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            } */
            $request->email = "alamgir@gmail.com";
            $request->password = "123456";
            //$email = "alamgir@gmail.com";
            //$password = "123456";
            $credentials = ['email' => $request->email, 'password' => $request->password];

            if (Auth::guard('merchant')->attempt($credentials, false, false)) {
                //return ['result' => 'ok'];
                $request->session()->invalidate();
                //$request->session()->regenerateToken();
                $request->session()->regenerate();
                session()->flash('msg','Login Successfully!');
                return redirect()->route('home');
            }


            return ['result' => 'not ok'];

            if(Auth::attemp(['email'=>$email,'password'=>$password])){
                session()->flash('msg','Login Successfully!');
                return redirect()->route('home');
            }
            //if(Auth::guard('admin')->attemp()){}  [by default guard = user.. its from config->auth.php]

            if(Auth::attemp($credentials)){
                session()->flash('msg','Login Successfully!');
                return redirect()->route('home');
            }
                session()->flash('error','Wrong Credentials');
            return redirect()->back();


       /*  if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // The user is active, not suspended, and exists.
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            //
        }

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // The user is being remembered...
        } */
    }









}

