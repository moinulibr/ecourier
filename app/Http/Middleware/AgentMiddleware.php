<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AgentMiddleware
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
        if(Auth::guard('web')->check() && Auth::guard('web')->user()->role_id == userRoleIdAgentAdmin_HH ) //|| Auth::user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID
        {
            return $next($request);
        }
        else{
            //Auth::guard('manpower')->logout();
            //Auth::logout();
            return redirect()->route('home');
        }
        //return $next($request);
    }
}
