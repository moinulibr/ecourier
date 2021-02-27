<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class ManpowerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('manpower')->check() && Auth::guard('manpower')->user()->role_id == userRoleIdManpower_HH ) //|| Auth::user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID
        {
            return $next($request);
        }
        else{
            //Auth::guard('manpower')->logout();
            Auth::logout();
            return redirect()->route('home');
        }
        //return $next($request);
    }
}
