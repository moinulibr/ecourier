<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* fontend controller */
Route::group(['namespace' => 'Frontend'],function(){
    Route::get('/','FrontendController@index');
    Route::get('/contact','FrontendController@contact')->name('contact');
    Route::get('/about','FrontendController@about')->name('about');
    Route::get('/privacy','FrontendController@privacy')->name('privacy');
    Route::get('/return-policy','FrontendController@returnpolicy')->name('returnpolicy');
    Route::get('/blogs','FrontendController@blogs')->name('blogs');
    Route::get('/blog/detail/{slug}','FrontendController@blogdetail')->name('blog.detail');


    Route::get('merchant','FrontendController@merchant')->name('merchant');
    Route::post('registration/merchant/store','MerchantRegistrationController@store')->name('registration.merchant.store');


    Route::get('agent','FrontendController@agent')->name('agent');
    Route::post('registration/agent/store','AgentRegistrationController@store')->name('registration.agent.store');


    Route::get('deliveryman','FrontendController@deliveryman')->name('deliveryman');
    Route::post('registration/deliveryman/store','DeliveryManRegistrationController@store')->name('deliveryman.agent.store');



});
/* // fontend controller */




Route::get('getDivisionAjax','HomeController@getdistrictajax');
Route::get('getMerchantShopAjax','HomeController@getmerchantshopajax');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Auth\LoginController@showLoginForm
// Auth\RegisterController@showRegistrationForm

/*
|-------------------------------------------------
|All User Login
|------------------------------
*/
    // Merchant Login
    Route::get(showMerchantLoginFormUrl_HH,'Auth\Merchant\LoginController@showLoginForm')
            ->name(showMerchantLoginFormRoute_HH);
    Route::post('merchant/make/opt/by/phone','Auth\Merchant\OTPGenerateController@makeOtpForMerchant')
            ->name('makeOtpForMerchant');
    Route::post(showMerchantLoginFormUrl_HH,'Auth\Merchant\LoginController@login')
            ->name(merchantLoginFormSubmitRoute_HH);
    Route::get(merchantDashboardUrl_HH,'Backend\Merchant\DashboardController@index')
            ->name(merchantDashboardRoute_HH);//merchant/dashboard
    Route::post('merchant/logout', 'Auth\Merchant\LoginController@logout')->name('merchant.logout');


    // Official Login
    Route::get(showOfficialUsersLoginFormUrl_HH,'Auth\Official\LoginController@showLoginForm')
            ->name(showOfficialUsersLoginFormRoute_HH);
    Route::post(showOfficialUsersLoginFormUrl_HH,'Auth\Official\LoginController@login')
            ->name(showOfficialUsersLoginFormRoute_HH);

    // Manpower Login
    Route::get(showManpowerLoginFormUrl_HH,'Auth\Manpower\LoginController@showLoginForm')
        ->name(showManpowerLoginFormRoute_HH);

    Route::post(showManpowerLoginFormUrl_HH,'Auth\Manpower\LoginController@login')
            ->name(manpowerLoginFormSubmitRoute_HH);
    Route::get(manpowerDashboardUrl_HH,'Backend\Manpower\DashboardController@index')
            ->name(manpowerDashboardRoute_HH);

    Route::post('manpower/logout', 'Auth\Manpower\LoginController@logout')->name('manpower.logout');

/*
|------------------------------
| All User Login End
|-------------------------------------------------
*/





    #,'routeCheck' ,'routePermission'
    Route::group(['middleware' => ['auth']], function ()
    {
    	/*
        |---------------------------
        |User Role Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('user-role', 'RoleController');
            Route::get('user-role-delete/{id}','RoleController@delete')->name('user-role.delete');
        });

        /*
        |---------------------------
        |User Role Module  Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('user-role-module', 'UserRoleModuleController');
            Route::get('module-delete/{id}','UserRoleModuleController@delete')->name('user-role-module.delete');
        });


        /*
        |---------------------------
        |User Role Module Action Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('user-role-module-action', 'UserRoleModuleActionController');
            Route::get('module-action-delete/{id}','UserRoleModuleActionController@delete')->name('user-role-module-action.delete');
        });


        /*
        |---------------------------
        |User Role Module Action Permition Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('role-module-action-permition', 'UserRoleModuleActionPermitionController');
            Route::get('module-action-permition-delete/{id}','UserRoleModuleActionPermitionController@delete')->name('role-module-action-permition.delete');
        });

        /*
        |---------------------------
        |User Role Menu Title Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('role-menu-title', 'UserRoleMenuTitleController');
            Route::get('user-role-menu-title-delete/{id}','UserRoleMenuTitleController@delete')->name('role-menu-title.delete');
        });

        /*
        |---------------------------
        |User Role Menu Title Permition Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('role-menu-title-permition', 'UserRoleMenuTitlePermitionController');
            Route::get('user-role-menu-title-permition-delete/{id}','UserRoleMenuTitlePermitionController@delete')->name('role-menu-title-permition.delete');
        });



        /*
        |---------------------------
        |User Role Menu Action  Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('user-role-menu-action', 'UserRoleMenuActionController');
            Route::get('user-role-menu-action-delete/{id}','UserRoleMenuActionController@delete')->name('user-role-menu-action.delete');
        });


        /*
        |---------------------------
        |User Role Menu Action Permition Management
        |--------------------------
        */
        Route::group(['as'=> 'admin.', 'prefix'=>'admin' , 'namespace' => 'BackendUserRole\Admin\UserRoleManagement'],function(){
            Route::resource('role-menu-action-permition', 'UserRoleMenuActionPermitionController');
            Route::get('user-role-menu-action-permition-delete/{id}','UserRoleMenuActionPermitionController@delete')->name('role-menu-action-permition.delete');
        });




        Route::group(['as' => 'admin','prefix' => 'division','namespace'=>'Area'],function(){
            Route::get('view','DivisionController@index')->name('division.index');
            Route::get('edit/{id}','DivisionController@edit')->name('division.edit');
            Route::post('update/{id}','DivisionController@update')->name('division.update');
        });


        Route::group(['as' => 'admin','prefix' => 'district','namespace'=>'Area'],function(){
            Route::get('view','DistrictController@index')->name('district.index');
            Route::get('edit/{id}','DistrictController@edit')->name('district.edit');
            Route::post('update/{id}','DistrictController@update')->name('district.update');
        });


        Route::group(['as' => 'admin','prefix' => 'area','namespace'=>'Area'],function(){
            Route::get('view','AreaController@index')->name('area.index');
            Route::post('store','AreaController@store')->name('area.store');
            Route::post('update/{id}','AreaController@update')->name('area.update');
            Route::get('destroy/{id}','AreaController@destroy')->name('area.destroy');
        });


        Route::group(['prefix' => 'area','namespace'=>'Area'],function(){
            Route::get('view','AreaController@index')->name('area.index');
            Route::post('store','AreaController@store')->name('area.store');
            Route::post('update/{id}','AreaController@update')->name('area.update');
            Route::get('destroy/{id}','AreaController@destroy')->name('area.destroy');
        });


        // super admin and admin
        Route::group(['prefix' => 'admin','namespace'=>'Backend\Admin\User'],function(){
            Route::get('view','AdminController@index')->name('admin.index');
            Route::post('store','AdminController@store')->name('admin.store');
            Route::post('update/{id}','AdminController@update')->name('admin.update');
            Route::get('destroy/{id}','AdminController@destroy')->name('admin.destroy');
        });



            // merchant
        Route::group(['prefix' => 'merchant','namespace'=>'Backend\Admin\User'],function(){
            Route::get('view','MerchantController@index')->name('merchant.index');
            Route::post('store','MerchantController@store')->name('merchant.store');
            Route::post('update/{id}','MerchantController@update')->name('merchant.update');
            Route::get('destroy/{id}','MerchantController@destroy')->name('merchant.destroy');


              /* Merchant Settings*/


            Route::get('{id}/setting','MerchantController@settings')->name('merchant.setting');

            Route::post('shop/store','MerchantController@shopstore')->name('merchant.shop.store');
            Route::post('shop/update/{id}','MerchantController@shopupdate')->name('merchant.shop.update');

            Route::post('profile/update/{id}','MerchantController@merchantprofileupdate')->name('merchant.profile.update');
            Route::post('setting/update/{id}','MerchantController@merchant_setting_update')->name('merchant.setting.update');


        });





        Route::group(['prefix' => 'registration','namespace'=>'Backend\Admin\User'],function(){

            Route::get('merchant/list','UserRegistrationController@merchantlist')->name('merchant.registration');
            Route::get('merchant/application/show/{id}','UserRegistrationController@merchantshow')->name('merchant.registration.show');


            Route::get('agent/list','UserRegistrationController@agentlist')->name('agent.registration');
            Route::get('agent/application/show/{id}','UserRegistrationController@agentshow')->name('agent.registration.show');

            Route::get('deliveryman/list','UserRegistrationController@deliverylist')->name('deliveryman.registration');
            Route::get('deliveryman/application/show/{id}','UserRegistrationController@deliveryshow')->name('deliveryman.registration.show');




        });






          // Agent
        Route::group(['prefix' => 'agent','namespace'=>'Backend\Admin\User'],function(){
            Route::get('view','AgentController@index')->name('agent.index');
            Route::post('store','AgentController@store')->name('agent.store');
            Route::post('update/{id}','AgentController@update')->name('agent.update');
            Route::get('destroy/{id}','AgentController@destroy')->name('agent.destroy');


            Route::get('{id}/setting','AgentController@setting')->name('agent.setting');
            Route::post('agent/store/area/','AgentController@agentstorearea')->name('agent.area.store');
            Route::get('agent/area/destroy/{id}','AgentController@agentareadestroy')->name('agent.area.destroy');

            Route::post('agent/commission/setting','AgentController@agentcommissionsetting')->name('agent.commission.setting');
            Route::post('agent/profile/update','AgentController@agentprofileupdate')->name('agent.profile.update');


            Route::post('setting/update/{id}','AgentController@agent_setting_update')->name('agent.setting.update');


        });


         // Man Power // Delivery Man
        Route::group(['prefix' => 'deliveryman','namespace'=>'Backend\Admin\User'],function(){
            Route::get('view','DeliveryManController@index')->name('deliveryman.index');
            Route::post('store','DeliveryManController@store')->name('deliveryman.store');
            Route::post('update/{id}','DeliveryManController@update')->name('deliveryman.update');
            Route::get('destroy/{id}','DeliveryManController@destroy')->name('deliveryman.destroy');

            Route::get('{id}/setting','DeliveryManController@deliverymansetting')->name('deliveryman.setting');
            Route::post('deliveryman/store/area/','DeliveryManController@deliverymanstorearea')->name('deliveryman.area.store');
            Route::get('deliveryman/area/destroy/{id}','DeliveryManController@deliverymanareadestroy')->name('deliveryman.area.destroy');
            Route::post('deliveryman/commission/setting','DeliveryManController@deliverymancommissionsetting')->name('deliveryman.commission.setting');

            Route::post('deliveryman/profile/update','DeliveryManController@deliverymanprofileupdate')->name('deliveryman.profile.update');

        });


        // hub
        Route::group(['prefix' => 'hub','namespace'=>'Backend\Admin\User'],function(){

            Route::get('view','HubController@index')->name('hub.index');
            Route::post('store','HubController@store')->name('hub.store');
            Route::post('update/{id}','HubController@update')->name('hub.update');
            Route::get('destroy/{id}','HubController@destroy')->name('hub.destroy');
        });

        // suboffice
        Route::group(['prefix' => 'suboffice','namespace'=>'Backend\Admin\User'],function(){
            Route::get('view','SubOfficeController@index')->name('sub.office.index');
            Route::post('store','SubOfficeController@store')->name('sub.office.store');
            Route::post('update/{id}','SubOfficeController@update')->name('sub.office.update');
            Route::get('destroy/{id}','SubOfficeController@destroy')->name('sub.office.destroy');

        });


        /* // weight */
          Route::group(['prefix' => 'weight','namespace'=>'Backend\Admin\Service'],function(){
            Route::get('view','WeightController@index')->name('weight.index');
            Route::post('store','WeightController@store')->name('weight.store');
            Route::post('update/{id}','WeightController@update')->name('weight.update');
            Route::get('destroy/{id}','WeightController@destroy')->name('weight.destroy');

        });


        /* // Branch Type*/
        Route::group(['prefix' => 'branchtype','namespace'=>'Backend\Admin\Branch'],function(){
            Route::get('view','BranchTypeController@index')->name('branch.type.index');
            Route::post('store','BranchTypeController@store')->name('branch.type.store');
            Route::post('update/{id}','BranchTypeController@update')->name('branch.type.update');
            Route::get('destroy/{id}','BranchTypeController@destroy')->name('branch.type.destroy');
        });


        Route::group(['prefix' => 'branch','namespace'=>'Backend\Admin\Branch'],function(){
            Route::get('view','BranchController@index')->name('branch.index');
            Route::post('store','BranchController@store')->name('branch.store');
            Route::post('update/{id}','BranchController@update')->name('branch.update');
            Route::get('destroy/{id}','BranchController@destroy')->name('branch.destroy');

            Route::get('{id}/setting','BranchController@branchsetting')->name('branch.setting');

            Route::post('branch/commission/setting','BranchController@commissionsetting')->name('branch.commission.setting');


            Route::post('area/store','AreaBranchController@store')->name('branch.area.store');
            Route::post('area/update/{id}','AreaBranchController@update')->name('branch.area.update');
            Route::get('area/destroy/{id}','AreaBranchController@destroy')->name('branch.area.destroy');
        });


        /* Service Type */
        Route::group(['prefix' => 'servicetype','namespace'=>'Backend\Admin\Service'],function(){
            Route::get('view','ServiceTypeController@index')->name('service.type.index');
            Route::post('store','ServiceTypeController@store')->name('service.type.store');
            Route::post('update/{id}','ServiceTypeController@update')->name('service.type.update');
            Route::get('destroy/{id}','ServiceTypeController@destroy')->name('service.type.destroy');
        });


       /* // Parcel Type */
          Route::group(['prefix' => 'parceltype','namespace'=>'Backend\Admin\ParcelType'],function(){
            Route::get('view','ParcelTypeController@index')->name('parceltype.index');
            Route::post('store','ParcelTypeController@store')->name('parceltype.store');
            Route::post('update/{id}','ParcelTypeController@update')->name('parceltype.update');
            Route::get('destroy/{id}','ParcelTypeController@destroy')->name('parceltype.destroy');
        });



    /* // Parcel Category */
          Route::group(['prefix' => 'parcelcategory','namespace'=>'Backend\Admin\ParcelType'],function(){
            Route::get('view','ParcelCategoryController@index')->name('parcel.category.index');
            Route::post('store','ParcelCategoryController@store')->name('parcel.category.store');
            Route::post('update/{id}','ParcelCategoryController@update')->name('parcel.category.update');
            Route::get('destroy/{id}','ParcelCategoryController@destroy')->name('parcel.category.destroy');
        });



          /* // Service Charge Settings */
        Route::group(['prefix' => 'servicechargesetting','namespace'=>'Backend\Admin\Service'],function(){
            Route::get('view','ServiceChargeSettingController@index')->name('service.charge.setting.index');
            Route::post('store','ServiceChargeSettingController@store')->name('service.charge.setting.store');
            Route::post('update/{id}','ServiceChargeSettingController@update')->name('service.charge.setting.update');
            Route::get('destroy/{id}','ServiceChargeSettingController@destroy')->name('service.charge.setting.destroy');
        });








    /* ===================== order Management  ================================*/
        //order for admin
        Route::group(['prefix' => 'order','namespace'=>'Backend\Order\Admin','middleware'=>['admin']],function(){
            Route::get('view','OrderController@index')->name('order.index');
            Route::get('create','OrderController@create')->name('order.create');
            Route::post('store','OrderController@store')->name('order.store');

            //ajax
            Route::get('if/order/existing','OrderController@ifOrderExisting')->name('ifOrderExisting');
            Route::get('making/delivery/charge','OrderController@makingDeliveryCharge')->name('makingDeliveryCharge');
        
            //==========================================================================================//==========================================================================================================================================================================
            Route::group(['as' => 'admin.','middleware'=>['admin']],function(){
                Route::get('invoice/print/{id}','OrderController@printinvoice')->name('print.order.invoice');

                 //show single view by ajax
                Route::get('show/single/view/by/ajax/from/agent','OrderController@showSingleViewByAjax')->name('showSingleViewByAjax');

                //Assign Parcel 
                Route::get('assign/parcel','OrderAssigningStatusController@index')->name('assign.parcel');
                /**
                 * About Bar code
                */
                Route::get('quick/assign/order','OrderAssigningStatusController@quickAssignParcelAddCart')->name('quickAssignParcelAddCart');

                Route::get('quick/assign/exist/cart','OrderAssigningStatusController@quickAssignParcelExistCart')->name('quickAssignParcelExistCart');
                Route::get('quick/assign/remove/single/cart','OrderAssigningStatusController@quickAssignParcelRemoveSingleCart')->name('quickAssignParcelRemoveSingleCart');
                Route::get('quick/assign/remove/cart','OrderAssigningStatusController@quickAssignParcelRemoveCart')->name('quickAssignParcelRemoveCart');
                Route::post('quick/assign/order/store','OrderAssigningStatusController@quickAssignParcelStoreFromCart')->name('quickAssignParcelStoreFromCart');
                
                //assigned Parcel Print
                Route::get('assigned/manpower','OrderAssignController@index')->name('manpowerAssignedOrder');
                Route::get('show/manpower/assigned/order/list','OrderAssignController@showManpowerOrderAssingedList')->name('showManpowerOrderAssingedList');
                Route::get('print/manpower/assigned/order/list','OrderAssignController@printManpowerOrderAssingedList')->name('printManpowerOrderAssingedList');
                Route::get('pdf/manpower/assigned/order/list','OrderAssignController@pdfDownloadManpowerOrderAssingedList')->name('pdfDownloadManpowerOrderAssingedList');

               
                /**
                 * About Bar code
                */
                //Receive From Another Branch 
                Route::get('receive/parcel','OrderParcelReceiveController@index')->name('receive.parcel');

                Route::get('receive/quick/assign/order','OrderParcelReceiveController@quickAssignParcelAddCart')->name('receive_quickAssignParcelAddCart');
                Route::get('receive/quick/assign/exist/cart','OrderParcelReceiveController@quickAssignParcelExistCart')->name('receive_quickAssignParcelExistCart');
                Route::get('receive/quick/assign/remove/single/cart','OrderParcelReceiveController@quickAssignParcelRemoveSingleCart')->name('receive_quickAssignParcelRemoveSingleCart');
                Route::get('receive/quick/assign/remove/cart','OrderParcelReceiveController@quickAssignParcelRemoveCart')->name('receive_quickAssignParcelRemoveCart');
                Route::post('receive/quick/assign/order/store','OrderParcelReceiveController@quickAssignParcelStoreFromCart')->name('receive_quickAssignParcelStoreFromCart');
                /**
                 * End Send And Receive
                */

                //Send To Another Branch 
                Route::get('send/parcel','OrderParcelSendController@index')->name('send.parcel');

                Route::get('send/quick/assign/order','OrderParcelSendController@quickAssignParcelAddCart')->name('send_quickAssignParcelAddCart');
                Route::get('send/quick/assign/exist/cart','OrderParcelSendController@quickAssignParcelExistCart')->name('send_quickAssignParcelExistCart');
                Route::get('send/quick/assign/remove/single/cart','OrderParcelSendController@quickAssignParcelRemoveSingleCart')->name('send_quickAssignParcelRemoveSingleCart');
                Route::get('send/quick/assign/remove/cart','OrderParcelSendController@quickAssignParcelRemoveCart')->name('send_quickAssignParcelRemoveCart');
                Route::post('send/quick/assign/order/store','OrderParcelSendController@quickAssignParcelStoreFromCart')->name('send_quickAssignParcelStoreFromCart');
                /**
                 * End Send And Receive
                */ //==========================================================================
            });

            //==================================================================================================================================
        });//end admin

        /*
        |-----------------------------------------------------------
        |   Receive Cancel Parcel , Deliverd Amount
        |-----------------------------------------------------------
        */
            Route::group(['as' => 'admin.','prefix' => 'order/delivered','namespace'=>'Backend\OrderParcelOrAmountReceive\Admin','middleware'=>['admin']],function(){
                Route::get('receive/parcel/amount','OrderDeliveredParcelAmountReceiveController@index')->name('manPowerOrderDeliveredAmount');
                Route::get('show/receive/parcel/amount/order/list','OrderDeliveredParcelAmountReceiveController@showParcelAmountOrderList')->name('showParcelAmountOrderList');
                Route::post('store/receive/parcel/amount/order/list','OrderDeliveredParcelAmountReceiveController@storeParcelAmountOrderList')->name('storeParcelAmountOrderList');
            });

            Route::group(['as' => 'admin.','prefix' => 'order/cancel/hold','namespace'=>'Backend\OrderParcelOrAmountReceive\Admin','middleware'=>['admin']],function(){
                Route::get('receive/parcel','OrderParcelCancelHoldReceiveController@index')->name('manPowerOrderCancelHoldParcel');
                Route::get('show/receive/parcel/list','OrderParcelCancelHoldReceiveController@showCancelHoldParcelOrderList')->name('showCancelHoldParcelOrderList');
                Route::post('store/receive/parcel/list','OrderParcelCancelHoldReceiveController@storeCancelHoldParcelOrderList')->name('storeCancelHoldParcelOrderList');
            });
        /*
        |-----------------------------------------------------------
        |   Receive Cancel Parcel , Deliverd Amount
        |-----------------------------------------------------------
        */

       

        //order for Agent
        Route::group(['as'=>'agent.','prefix' => 'agent/order','namespace'=>'Backend\Order\Agent','middleware'=>['agentadmin']],function(){
            Route::get('view','OrderController@index')->name('order.index');
            Route::get('show/{id}','OrderController@show')->name('order.show');
            Route::get('create','OrderController@create')->name('order.create');
            Route::post('store','OrderController@store')->name('order.store');

            //ajax
            Route::get('get/merchantShopAjax','OrderController@getmerchantshopajax')->name('getMerchantShopAjax');
            Route::get('if/order/existing','OrderController@ifOrderExisting')->name('ifOrderExisting');
            Route::get('making/delivery/charge','OrderController@makingDeliveryCharge')->name('makingDeliveryCharge');
            
            //show single view by ajax
            Route::get('show/single/view/by/ajax/from/agent','OrderController@showSingleViewByAjax')->name('showSingleViewByAjax');

            Route::get('order/invoice/print/{id}','OrderController@printinvoice')->name('print.order.invoice');

            //assigned Parcel Print
            Route::get('assigned/manpower','OrderAssignController@index')->name('manpowerAssignedOrder');
            Route::get('show/manpower/assigned/order/list','OrderAssignController@showManpowerOrderAssingedList')->name('showManpowerOrderAssingedList');
            Route::get('print/manpower/assigned/order/list','OrderAssignController@printManpowerOrderAssingedList')->name('printManpowerOrderAssingedList');
            Route::get('pdf/manpower/assigned/order/list','OrderAssignController@pdfDownloadManpowerOrderAssingedList')->name('pdfDownloadManpowerOrderAssingedList');
            
            //Assign Parcel
            Route::get('assign/parcel','OrderAssigningStatusController@index')->name('assign.parcel');
            /**
             * About Bar code
            */
            Route::get('quick/assign/order','OrderAssigningStatusController@quickAssignParcelAddCart')->name('quickAssignParcelAddCart');

            Route::get('quick/assign/exist/cart','OrderAssigningStatusController@quickAssignParcelExistCart')->name('quickAssignParcelExistCart');
            Route::get('quick/assign/remove/single/cart','OrderAssigningStatusController@quickAssignParcelRemoveSingleCart')->name('quickAssignParcelRemoveSingleCart');
            Route::get('quick/assign/remove/cart','OrderAssigningStatusController@quickAssignParcelRemoveCart')->name('quickAssignParcelRemoveCart');
            Route::post('quick/assign/order/store','OrderAssigningStatusController@quickAssignParcelStoreFromCart')->name('quickAssignParcelStoreFromCart');
            
            //order success and invoice
            Route::get('success/{id}','OrderController@ordersuccess')->name('order.success');
            Route::get('show/invoice/{id}','OrderController@showinvoice')->name('order.show.invoice');

            /**
             * About Bar code
            */
            //Receive From Another Branch 
            Route::get('receive/parcel','OrderParcelReceiveController@index')->name('receive.parcel');

            Route::get('receive/quick/assign/order','OrderParcelReceiveController@quickAssignParcelAddCart')->name('receive_quickAssignParcelAddCart');
            Route::get('receive/quick/assign/exist/cart','OrderParcelReceiveController@quickAssignParcelExistCart')->name('receive_quickAssignParcelExistCart');
            Route::get('receive/quick/assign/remove/single/cart','OrderParcelReceiveController@quickAssignParcelRemoveSingleCart')->name('receive_quickAssignParcelRemoveSingleCart');
            Route::get('receive/quick/assign/remove/cart','OrderParcelReceiveController@quickAssignParcelRemoveCart')->name('receive_quickAssignParcelRemoveCart');
            Route::post('receive/quick/assign/order/store','OrderParcelReceiveController@quickAssignParcelStoreFromCart')->name('receive_quickAssignParcelStoreFromCart');
            /**
             * End Send And Receive
            */

             //Send To Another Branch 
            Route::get('send/parcel','OrderParcelSendController@index')->name('send.parcel');

            Route::get('send/quick/assign/order','OrderParcelSendController@quickAssignParcelAddCart')->name('send_quickAssignParcelAddCart');
            Route::get('send/quick/assign/exist/cart','OrderParcelSendController@quickAssignParcelExistCart')->name('send_quickAssignParcelExistCart');
            Route::get('send/quick/assign/remove/single/cart','OrderParcelSendController@quickAssignParcelRemoveSingleCart')->name('send_quickAssignParcelRemoveSingleCart');
            Route::get('send/quick/assign/remove/cart','OrderParcelSendController@quickAssignParcelRemoveCart')->name('send_quickAssignParcelRemoveCart');
            Route::post('send/quick/assign/order/store','OrderParcelSendController@quickAssignParcelStoreFromCart')->name('send_quickAssignParcelStoreFromCart');
            /**
             * End Send And Receive
            */ 
        });//end agent
        /*
        |-----------------------------------------------------------
        |   Receive Cancel Parcel , Deliverd Amount
        |-----------------------------------------------------------
        */
            Route::group(['as' => 'agent.','prefix' => 'agent/order/delivered','namespace'=>'Backend\OrderParcelOrAmountReceive\Agent','middleware'=>['agentadmin']],function(){
                Route::get('receive/parcel/amount','OrderDeliveredParcelAmountReceiveController@index')->name('manPowerOrderDeliveredAmount');
                Route::get('show/receive/parcel/amount/order/list','OrderDeliveredParcelAmountReceiveController@showParcelAmountOrderList')->name('showParcelAmountOrderList');
                Route::post('store/receive/parcel/amount/order/list','OrderDeliveredParcelAmountReceiveController@storeParcelAmountOrderList')->name('storeParcelAmountOrderList');
            });

            Route::group(['as' => 'agent.','prefix' => 'agent/order/cancel/hold','namespace'=>'Backend\OrderParcelOrAmountReceive\Agent','middleware'=>['agentadmin']],function(){
                Route::get('receive/parcel','OrderParcelCancelHoldReceiveController@index')->name('manPowerOrderCancelHoldParcel');
                Route::get('show/receive/parcel/list','OrderParcelCancelHoldReceiveController@showCancelHoldParcelOrderList')->name('showCancelHoldParcelOrderList');
                Route::post('store/receive/parcel/list','OrderParcelCancelHoldReceiveController@storeCancelHoldParcelOrderList')->name('storeCancelHoldParcelOrderList');
            });
        /*
        |-----------------------------------------------------------
        |   Receive Cancel Parcel , Deliverd Amount
        |-----------------------------------------------------------
        */


        /*
        |-----------------------------------------------------------
        |  Receive From Another branch : Admin
        |----------------------------------------------------------- 
        */
            /*For Admin*/
            Route::group(['as' => 'admin.','prefix' => 'admin','namespace'=>'Backend\PaymentInvoice\Admin','middleware'=>['admin']],function(){
                Route::get('receive/from/others/branch','ReceiveFromBranchController@receiveFromOtherBranch')->name('receiveFromOtherBranch');
                Route::get('receive/from/other/branch/single/{id}','ReceiveFromBranchController@receiveFromOtherBranchSingleView')->name('receiveFromOtherBranchSingleView');
                Route::get('receiving/from/other/branch/now/{id}','ReceiveFromBranchController@receivingFromOtherBranchNow')->name('receivingFromOtherBranchNow');
            
                /*======= Send To Others Branch==========*/
                Route::get('others/brach/from/admin/send/list','HeadOfficePayToBranchInvoiceController@sendInvoiceList')->name('sendInvoiceList');
                Route::get('others/brach/from/admin/send/list/{id}','HeadOfficePayToBranchInvoiceController@sendInvoiceListDetails')->name('sendInvoiceListDetails');
                Route::get('send/to/others/brach/from/admin','HeadOfficePayToBranchInvoiceController@sendToOthersBranchFromAdmin')->name('sendToOthersBranchFromAdmin');
                Route::get('send/to/others/brach/from/admin/list','HeadOfficePayToBranchInvoiceController@sendToOthersBranchFromAdminAjaxList')->name('sendToOthersBranchFromAdminAjaxList');
                Route::post('send/to/others/brach/from/admin/list/store','HeadOfficePayToBranchInvoiceController@sendToOthersBranchFromAdminListStore')->name('sendToOthersBranchFromAdminListStore');
                /*======= Send To Others Branch==========*/


                /*======= Pay to Merchant/Client ==========*/
                Route::get('parcel/amount/merchant/client/payment','BranchPayToMerchantClientController@payToMerchantClientIndex')->name('payToMerchantClientIndex');
                Route::get('parcel/amount/merchant/client/payment/details/{id}','BranchPayToMerchantClientController@payToMerchantClientViewDetails')->name('payToMerchantClientViewDetails');
                Route::get('parcel/amount/merchant/client/payment/create','BranchPayToMerchantClientController@payToMerchantClientCreate')->name('payToMerchantClientCreate');
                //getClientListparcelOwnerType
                Route::get('get/client/list/by/parcel/owner/type','BranchPayToMerchantClientController@getClientListparcelOwnerType')->name('getClientListparcelOwnerType');

                Route::get('parcel/amount/merchant/client/payment/create/list','BranchPayToMerchantClientController@payToMerchantClientCreateList')->name('payToMerchantClientCreateList');
                Route::post('parcel/amount/merchant/client/payment/create/store','BranchPayToMerchantClientController@payToMerchantClientCreateListStore')->name('payToMerchantClientCreateListStore');
                /*======= Pay to Merchant/Client ==========*/

            });
            /*For Admin*/

            Route::group(['as' => 'admin.','prefix' => 'admin','namespace'=>'Backend\Admin\Account','middleware'=>['admin']],function(){
                /*======= Admin Branch Total Amount ==========*/
                Route::get('current/balanch/account/of/my/branch','BranchCurrentAccountController@currentBalanchOfMyBranch')->name('currentBalanchOfMyBranch');
                /*======= Admin Branch Total Amount ==========*/
            });
        /*
        |-----------------------------------------------------------
        |   Receive From Another branch : Admin
        |-----------------------------------------------------------
        */


        /*
        |-----------------------------------------------------------
        |   Pay to HeadOffice Invoice From Agent
        |-----------------------------------------------------------
        */
            /*For Agent*/
            Route::group(['as' => 'agent.','prefix' => 'agent','namespace'=>'Backend\PaymentInvoice\Agent','middleware'=>['agentadmin']],function(){
                Route::get('pay/to/head-office','PayToHeadOfficeInvoiceController@payToHeadOfficeCreate')->name('payToHeadOffice');
                Route::get('pay/to/head-office/view/list','PayToHeadOfficeInvoiceController@payToHeadOfficeListView')->name('payToHeadOfficeListView');
                Route::get('pay/to/head-office/view/single/{id}','PayToHeadOfficeInvoiceController@payToHeadOfficeListShowSingle')->name('payToHeadOfficeListShowSingle');
                Route::get('pay/to/head-office/list','PayToHeadOfficeInvoiceController@payToHeadOfficeList')->name('payToHeadOfficeList');
                Route::post('pay/to/head-office/store','PayToHeadOfficeInvoiceController@payToHeadOfficeStore')->name('payToHeadOfficeStore');
            

                /*======= Receive From Others Branch ==========*/
                Route::get('receive/from/head/0ffice/send/list','ReceiveFromHeadOfficeController@headOfficeSendInvoiceList')->name('headOfficeSendInvoiceList');
                Route::get('receive/from/head/0ffice/send/list/{id}','ReceiveFromHeadOfficeController@headOfficeSendInvoiceListDetails')->name('headOfficeSendInvoiceListDetails');
                Route::get('receive/from/head/0ffice/receive/{id}','ReceiveFromHeadOfficeController@receiveInvoiceFromheadOfficeSend')->name('receiveInvoiceFromheadOfficeSend');
                /*======= Receive From Others Branch ==========*/


                /*======= Pay to Merchant/Client ==========*/
                Route::get('parcel/amount/merchant/client/payment','BranchPayToMerchantClientInvoiceController@payToMerchantClientIndex')->name('payToMerchantClientIndex');
                Route::get('parcel/amount/merchant/client/payment/details/{id}','BranchPayToMerchantClientInvoiceController@payToMerchantClientViewDetails')->name('payToMerchantClientViewDetails');
                Route::get('parcel/amount/merchant/client/payment/create','BranchPayToMerchantClientInvoiceController@payToMerchantClientCreate')->name('payToMerchantClientCreate');
                //getClientListparcelOwnerType
                Route::get('get/client/list/by/parcel/owner/type','BranchPayToMerchantClientInvoiceController@getClientListparcelOwnerType')->name('getClientListparcelOwnerType');

                Route::get('parcel/amount/merchant/client/payment/create/list','BranchPayToMerchantClientInvoiceController@payToMerchantClientCreateList')->name('payToMerchantClientCreateList');
                Route::post('parcel/amount/merchant/client/payment/create/store','BranchPayToMerchantClientInvoiceController@payToMerchantClientCreateListStore')->name('payToMerchantClientCreateListStore');
                /*======= Pay to Merchant/Client ==========*/
            });
             /*For Agent*/
        /*
        |-----------------------------------------------------------
        |   Pay to HeadOffice Invoice From Agent
        |-----------------------------------------------------------
        */




        //Destination order for all official users
        Route::group(['as'=>'destination.','prefix' => 'destination','namespace'=>'Backend\Order\Official','middleware'=>['official']],function(){
            Route::get('order','UpcommingParcel@index')->name('order.index');//destination.order.index
        });


});//end auth middleware



        //order for Merchant
        Route::group(['as'=>'merchant.','prefix' => 'merchant/order','namespace'=>'Backend\Order\Merchant','middleware'=>['merchant']],function(){
            Route::get('view','OrderController@index')->name('order.index');
            Route::get('create','OrderController@create')->name('order.create');
            Route::post('store','OrderController@store')->name('order.store');

            Route::get('success/{id}','OrderController@ordersuccess')->name('order.success');
            Route::get('show/invoice/{id}','OrderController@showinvoice')->name('order.show.invoice');


            //show single view by ajax
            Route::get('show/single/view/by/ajax/from/list','OrderController@showSingleViewByAjax')->name('showSingleViewByAjax');





            //ajax
            Route::get('geting/merchantShopAjax','OrderController@getmerchantshopajax')->name('getMerchantShopAjax');
            Route::get('if/order/existing','OrderController@ifOrderExisting')->name('ifOrderExisting');
            Route::get('making/delivery/charge','OrderController@makingDeliveryCharge')->name('makingDeliveryCharge');

            //merchant payment invoice
            Route::get('payment/index','OrderController@paymentinvoice')->name('payments');
            Route::get('payment/invoice/details/download/{id}','OrderController@paymentinvoiceDetails')->name('paymentinvoiceDetails');
        });







/* ===================== END order Management  ================================*/


/*
        Merchant Shop Setting*/


       Route::group(['as'=>'merchant.','prefix' => 'merchant/shops','namespace'=>'Backend\Merchant\Setting','middleware'=>['merchant']],function(){



            Route::get('view','SettingController@index')->name('shop.index');
            Route::get('create','SettingController@create')->name('shop.create');
            Route::post('store','SettingController@store')->name('shop.store');
            Route::get('edit/{id}','SettingController@edit')->name('shop.edit');
            Route::post('update/{id}','SettingController@update')->name('shop.update');
            Route::get('destroy/{id}','SettingController@destroy')->name('shop.destroy');

       });





/* = ================ Agent management ==================== */



         Route::group(['as'=>'agent.','prefix' => 'agent/stuff','namespace'=>'Backend\Agent','middleware'=>['agentadmin']],function(){

            Route::get('view','StuffController@index')->name('stuff.index');
            Route::get('create','StuffController@create')->name('stuff.create');
            Route::post('store','StuffController@store')->name('stuff.store');
            Route::post('update/{id}','StuffController@update')->name('stuff.update');
            Route::get('destroy/{id}','StuffController@destroy')->name('stuff.destroy');

         });













