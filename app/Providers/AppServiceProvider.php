<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

         /* Auth::getDefaultDriver() */
        
       

        //Auth::guard('merchant')->user()->name
        // only Supper Admin directive
       
           /*  Blade::if('super_admin', function () {
                if(auth("web") &&  Auth::guard('web')->check())
                {
                    return Auth::guard('web')->check() && Auth::guard('web')->user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID;
                }else{
                    return false;
                }
            }); */
       
        // only  Admin directive
            /* Blade::if('admin', function () {
                if(auth("web") &&  Auth::guard('web')->check())
                {
                    return Auth::guard('web')->check() && Auth::guard('web')->user()->role_id  == HS_ADMIN_USER_ROLE_ID || Auth::guard('web')->user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID ;
                }else{
                    return false;
                }
            }); */
        // only Manager directive
       /*  Blade::if('manager', function () {
            if(auth("web") &&  Auth::guard('web')->check())
            {
                return Auth::guard('web')->check() && Auth::guard('web')->user()->role_id == HS_MANAGER_USER_ROLE_ID; //|| Auth::user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID
            }else{
                return false;
            }
        }); */

        // only Merchant  directive
        /* Blade::if('merchant', function () {
            if(auth("merchant") &&  Auth::guard('merchant')->check())
            {
                return Auth::guard('merchant')->check() && Auth::guard('merchant')->user()->role_id == HS_MERCHANT_USER_ROLE_ID  ; //|| Auth::user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID
            }else{
                return false;
            }
        }); */
        // only Delivery Man  directive
        /* Blade::if('deliveryman', function () {
            if(auth("deliveryman") &&  Auth::guard('deliveryman')->check())
            {
                return Auth::check() && Auth::guard('deliveryman')->user()->role_id == HS_DELIVERYMAN_USER_ROLE_ID ; //|| Auth::user()->role_id == HS_SUPER_ADMIN_USER_ROLE_ID
            }else{
                return false;
            }
        }); */


    }
}