<?php
    use App\Model\Backend\Merchant\Shop\Merchant_shop;
    use App\Model\Backend\Merchant\Setting\Merchant_Setting;
    use App\Model\Backend\Manpower\ManpowerType;
    use App\Model\Backend\Branch\Branch_type;
    use App\Model\Backend\Commission\Branch_commission_setting;
    use App\Model\Backend\Commission\Branch_commission;
    use App\Model\Backend\Manpower\ManpowerCommissionSetting;
    use App\Model\Backend\Admin\Parcel\Delivery_charge_type;
    use App\Model\Backend\Admin\Parcel\Delivery_parcel_amount_type;
    use App\Model\Backend\Admin\Parcel\Parcel_category;
    use App\Model\Backend\Admin\Parcel\Parcel_owner_type;
    use App\Model\Backend\Admin\Parcel\Parcel_type;
    use App\Model\Backend\Admin\Service\Service_type;
    use App\Model\Backend\Admin\Service\Service_city_type;
    use App\Model\Backend\Admin\Service\Service_charge_setting;
    use App\Model\Backend\Admin\Weight;
    use Carbon\Carbon;
    use App\Model\Backend\Area\Area;
    use App\Model\Backend\Area\District;
    use App\Model\Backend\Branch\Area_branch;
    use App\Model\Backend\Branch\Branch;
    use App\Model\Backend\Order\Order_sms_sending;
    use App\User;
    use App\Model\Backend\Customer\Customer;
    use App\Model\Backend\Customer\General_customer;
    use App\Model\Backend\Order\Order;
    use App\Model\Backend\Order\Order_assign;
    use App\Model\Backend\Order\Order_processing_history;
    use App\Model\Backend\Manpower\ManpowerAssignToArea;
    use App\Model\Backend\Order\Order_destination;
    use App\Model\Backend\Manpower\ManpowerIncomeHistory;
    use App\Model\Backend\ReceiveAmount\ReceiveAmountHistory;
    use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoiceDetail;
    /*
    |------------------------------------------------------------------
    | User Role  Start
    |------------------
    */
        define('userRoleIdSuperAdmin_HH',1);  // Super Admin
        define('userRoleIdAdmin_HH',2); // Admin
        define('userRoleIdSubAdmin_HH',3);  // Sub Admin
        define('userRoleIdMerchant_HH',4);  // Merchant
        define('userRoleIdManpower_HH',5); // Manpower // delivery Man
        define('userRoleIdOfficeStaff_HH',6); // Office Staff
        define('userRoleIdSubOfficeAdmin_HH',7); // Sub Office Admin
        define('userRoleIdHubAdmin_HH',8); // Hub Admin
        define('userRoleIdAgentAdmin_HH',9); // Agent Admin
    /*
    |---------------
    | User Role  End
    |------------------------------------------------------------------
    */


    /*
    |------------------------------------------------------------------
    | User approval status  | user_approval_status_id
    |------------------
    */
        define('userApprovalStatusPending_HH',1);  // Pending
        define('userApprovalStatusVerified_HH',2); // Verified
        define('userApprovalStatusSuspended_HH',3);  // Suspend
    /*
    |---------------
    | User approval status  | user_approval_status_id End
    |------------------------------------------------------------------
    */


    /*
    |------------------------------------------------------------------
    | Redirect URL And Route login After Login   Start
    |------------------
    */
        //Merchant Login Form Route Name
        define('showMerchantLoginFormRoute_HH','showMerchantLoginFormRoute');
        define('showMerchantLoginFormUrl_HH','merchant/login');
        define('merchantLoginFormSubmitRoute_HH','merchant_login');

        define('merchantDashboardRoute_HH','merchantDashboardRoute');
        define('merchantDashboardUrl_HH','merchant/dashboard');

        //Manpower Login Form Route Name
        define('showManpowerLoginFormRoute_HH','showManpowerLoginFormRoute');
        define('showManpowerLoginFormUrl_HH','manpower/login');
        define('manpowerDashboardRoute_HH','manpowerDashboardRoute');
        define('manpowerLoginFormSubmitRoute_HH','login');
        define('manpowerDashboardUrl_HH','manpower/dashboard');



        //Admin Login Form Route Name
        define('showOfficialUsersLoginFormRoute_HH','officialUserLoginFormRoute');
        define('showOfficialUsersLoginFormUrl_HH','official/user/login');

        // opt expire time , its not using.. using Helper/setting.php file
        define('merchantLoginOptExpireTime_HH',1); // merchant login expire otp time
        define('merchantLoginOptExpireTimeType_HH','minutes'); // merchant login expire otp time type , minutes, seconds , hour
    /*
    |---------------
    | Redirect URL And Route login After Login   End
    |------------------------------------------------------------------
    */




    /*
    |-------------------------------------------------------------------------
    | Merchant, District, Area, Shop Merchant Setting COD And Other
    |------------------------------------------------------------------
    */
        /***Get Head Office/branch Id***/
        function getBranchTypeByBranchTypeID_HH($branch_type_id = 1)
        {
            return Branch::where('branch_type_id',$branch_type_id)->first();
        }
        /***Get Area By Area Id***/
        function getAreaByAreaId_HH($area_id)
        {
            return Area::find($area_id);
        }
        /***Get Branch By Branch Id***/
        function getBranchByBranchId_HH($branch_id)
        {
            return Branch::find($branch_id);
        }

        /***Get Branch By Area Id***/
        function getBranchByAreaId_HH($area_id)
        {
            return Branch::where('area_id',$area_id)->first();
        }
        /***Get Branch By District Id***/
        function getBranchByDistrictId_HH($district_id)
        {
            return Branch::where('district_id',$district_id)->first();
        }
        /***Get District By Branch Id***/
        function getDistrictIdByBranchId_HH($branch_id)
        {
            return Branch::find($branch_id);
        }
        /***Get Area By Branch Id***/
        function getAreaIdByBranchId_HH($branch_id)
        {
            return Branch::find($branch_id);
        }
        /***Get Merchant By Merchant Id***/
        function getMerchantByMerchantId_HH($merchant_id)
        {
            return User::find($merchant_id);
        }
        /***Get All Manpowers***/
        function getAllManpowers_HH()
        {
            return User::where('role_id',userRoleIdManpower_HH)
                    ->whereNull('deleted_at')
                    ->where('user_approval_status_id',userApprovalStatusVerified_HH)
                    ->get();
        }
        /***Get  specific branch's All Manpowers by branch id***/
        function getAllManpowersByBranchId_HH($branch_id)
        {
            return User::where('role_id',userRoleIdManpower_HH)
                    ->where('branch_id',$branch_id)
                    ->whereNull('deleted_at')
                    ->where('user_approval_status_id',userApprovalStatusVerified_HH)
                    ->get();
        }
        /***Get Manpower By Manpower Id***/
        function getManpowerByManpowerId_HH($manpower_id)
        {
            return User::find($manpower_id);
        }
        /***Get User By User Id From User Table***/
        function getUserByUserIdFromUserTable_HH($user_id)
        {
            return User::find($user_id);
        }

        /***Get Merchant Setting By Merchant Id***/
        function getMerchantSettingByMerchantId_HH($merchant_id)
        {
            return  Merchant_Setting::where('merchant_id',$merchant_id)->first();//->whereNull('deleted_at')
        }
        /***Get Merchant Shop By Merchant Id***/
        function getMerchantShopByMerchantId_HH($merchant_id,$shop_id)
        {
            return Merchant_shop::where('merchant_id',$merchant_id)
            ->where('id',$shop_id)
            ->whereNull('deleted_at')
            ->first();
        }

        /***Get All Merchant Shop By Merchant Id***/
        function getAllMerchantShopByMerchantId_HH($merchant_id)
        {
            return Merchant_shop::where('merchant_id',$merchant_id)
            ->whereNull('deleted_at')
            ->get();
        }

        /***Get Active Merchant Shop By Merchant Id***/
        function getActiveMerchantShopByMerchantId_HH($merchant_id)
        {
            return Merchant_shop::where('merchant_id',$merchant_id)
                        ->where('activate_status',1)
                        ->whereNull('deleted_at')
                        ->first();
        }

        function getAllAreaByDistrictId_HH($district_id)
        {
            return Area::where('district_id',$district_id)->get();
        }


        /***Get Branch By Area id From Area Branch Id***/
        function getBranchByAreaIdFromAreaBranch_HH($area_id)
        {
            return Area_branch::where('area_id',$area_id)
                        ->whereNull('deleted_at')
                        ->first();
        }


            /*** Destinaiton branch***/
            function getDestinationBranchByDestinationAreaId_HH($destination_area_id)
            {
                $data['branch_id']          = "";
                $data['branch_type_id']     = "";
                $data['branch_parent_id']   = "";  //10.01.2021
                $data['branch_city_id']     = "";  //10.01.2021
                $branch = getBranchByAreaId_HH($destination_area_id);
                //$branch_id = getBranchByAreaId_HH($destination_area_id)?getBranchByAreaId_HH($destination_area_id)->id:NULL;
                $branch_id = $branch?$branch->id:NULL;
                if($branch_id)
                {
                     //10.01.2021
                    //$branchTypeId = getBranchByAreaId_HH($destination_area_id)->branch_type_id;
                    //$parent =  getBranchByAreaId_HH($destination_area_id)->parent_id;
                    $branchTypeId               = $branch->branch_type_id;
                    $parent_id                  = $branch->parent_id;
                    $data['branch_id']          = $branch_id;
                    $data['branch_type_id']     = $branchTypeId;
                    $data['branch_parent_id']   = $parent_id;
                    $data['branch_city_id']     = $branch->district_id;
                    return $data;
                }else{
                     //10.01.2021
                    //$branch_id =  getBranchTypeByBranchTypeID_HH(1)?getBranchTypeByBranchTypeID_HH(1)->branch_type_id:1;
                    $branch                     =  getBranchTypeByBranchTypeID_HH(1);
                    $data['branch_id']          = $branch->id;
                    $data['branch_parent_id']   = $branch->parent_id;
                    $data['branch_type_id']     = $branch->branch_type_id;
                    $data['branch_city_id']     = $branch->district_id;
                    return $data;
                    /*
                        $district_id    =  getAreaByAreaId_HH($destination_area_id)->district_id;
                        $branch         =  getBranchByDistrictId_HH($district_id);
                        $branch_id      = $branch?$branch->id:NULL;
                        if($branch_id)
                        {
                            if($branch->parent_id == $branch_id)
                            {
                                $data['branch_id'] = $branch_id;
                                $data['branch_parent_id'] = $branch_id;
                                return $data;
                            }else{
                                $data['branch_id']          = $branch_id;
                                $data['branch_parent_id']   = getBranchByBranchId_HH($branch_id)->parent_id;
                                return $data;
                            }
                        }//
                        else{ //if branch id has not
                            $branch_id =  getBranchTypeByBranchTypeID_HH(1)?getBranchTypeByBranchTypeID_HH(1)->branch_type_id:1;
                            $data['branch_id'] = $branch_id;
                            $data['branch_parent_id'] = $branch_id;
                            return $data;
                        }
                    */
                }
            }
            /*** Destinaiton branch***/

            /*

                public function areaIdExistOrNot($branch_id,$checkAreaId)
                {
                    $area_arrays = $this->getAreaByBranchId($branch_id);
                    $areas_single = array();
                    foreach ($area_arrays as $key => $value){
                        $areas_single[$key] = $value['area_id'];
                    }
                    //return $areas_single;
                    //return in_array($checkAreaId,$areas_single, TRUE);
                    if(in_array($checkAreaId,$areas_single, TRUE))
                    {
                        return $checkAreaId;
                    }else{
                        return false;
                    }
                }
            */


            /*
            |------------------------------------------------------------------
            | merchant cod
            |---------------
            */
                function deliveryChargeActivateStatusForEachMerchant_HH($merchant_id)
                {
                    $merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    return $merchant?$merchant->delivery_charge_activate:0;
                }

                function deliveryChargeTypeForEachMerchant_HH($merchant_id)
                {
                    //$merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    return 'fixed';//fixed less
                }
                function deliveryChargeValueForAllCityForEachMerchant_HH($merchant_id,$city_type_id=1)
                {
                    $merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    if($city_type_id == 1 || $city_type_id == NULL){
                        return  $merchant?$merchant->delivery_charge_same_city:0.0;
                    }
                    if($city_type_id == 2){
                        return  $merchant?$merchant->delivery_charge_out_of_city:0.0;
                    }
                    if($city_type_id == 3){
                        return  $merchant?$merchant->delivery_charge_other_city:0.0;
                    }
                }

                function deliveryChargeCalculationAmountForEachMerchant_HH($merchant_id,$city_type_id=1,$calculate_amount = 0)
                {
                    $merchantDeliveryChargeActivateStatus  = deliveryChargeActivateStatusForEachMerchant_HH($merchant_id);
                    $chargeType         = deliveryChargeTypeForEachMerchant_HH($merchant_id);
                    $chargeValue        = deliveryChargeValueForAllCityForEachMerchant_HH($merchant_id,$city_type_id);
                    if($merchantDeliveryChargeActivateStatus == 1)
                    {
                        if($chargeType == "fixed")// less amount
                        {
                            if($calculate_amount > 0)
                            {
                                return  $calculate_amount - $chargeValue;
                            }else{
                                return  $calculate_amount;
                            }
                        }else{
                            return $calculate_amount;
                        }
                    }
                    // default cod setting calculation
                    else{
                            return $calculate_amount;
                        }
                }
            /*
            |---------------
            | merchant cod
            |------------------------------------------------------------------
            */

            /*
            |------------------------------------------------------------------
            | merchant cod
            |---------------
            */
                function codActivateStatusForEachMerchant_HH($merchant_id)
                {
                    $merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    return $merchant?$merchant->cod_charge_activate:NULL;
                }

                function codChargeTypeForEachMerchant_HH($merchant_id)
                {
                    $merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    return $merchant?$merchant->cod_charge_type:0;
                }
                function codChargeValueForAllCityForEachMerchant_HH($merchant_id,$city_type_id=1)
                {
                    $merchant = getMerchantSettingByMerchantId_HH($merchant_id);
                    if($city_type_id == 1 || $city_type_id == NULL){
                        return  $merchant?$merchant->cod_charge_same_city:NULL;
                    }
                    if($city_type_id == 2){
                        return  $merchant?$merchant->cod_charge_out_of_city:NULL;
                    }
                    if($city_type_id == 3){
                        return  $merchant?$merchant->cod_charge_other_city:NULL;
                    }
                }

                function codChargeCalculationAmountForEachMerchant_HH($merchant_id,$city_type_id=1,$calculate_amount = 0)
                {
                    if(codPermissionActivateStatus_HS())
                    {
                        $merchantCodStatus  = codActivateStatusForEachMerchant_HH($merchant_id);
                        $chargeType         = codChargeTypeForEachMerchant_HH($merchant_id);
                        $chargeValue        = codChargeValueForAllCityForEachMerchant_HH($merchant_id,$city_type_id);
                        if($merchantCodStatus == 1)
                        {
                            if($chargeType == "percent")
                            {
                            return  $calculate_amount*$chargeValue / 100;
                            }else{
                                return $chargeValue;
                            }
                        }
                        // default cod setting calculation
                        else{
                                $defaultChargeType  = codDefaultChargeTypeForAllMerchant_HS();
                                $defaultChargeValue = codDefaultChargeForAllMerchant_HS();
                                if($defaultChargeType == "percent")
                                {
                                    return  $calculate_amount*$defaultChargeValue / 100;
                                }else{
                                    return $defaultChargeValue;
                                }
                            }
                    }else{
                        return 00.00;
                    }
                }
            /*
            |---------------
            | merchant cod
            |------------------------------------------------------------------
            */

    /*
    |---------------
    | Merchant, District, Area, Shop Merchant Setting COD And Other
    |------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------
    | Order, Admin, Merchant Agent and others order creating calcuation
    |----------------
    */
    function parcelOrderCreateCalculationFormula_HH($inputs)
    {
        $merchant_id        = $inputs['merchant_id'];
        $merchant_shop_id   = $inputs['merchant_shop_id'];
        $weight_id          = $inputs['weight_id'];
        $customer_area_id   = $inputs['customer_area_id'] ;
        $parcel_category_id = $inputs['parcel_category_id'];
        $parcel_type_id     = $inputs['parcel_type_id'];
        $service_type_id    = $inputs['service_type_id'];
        $collect_amount     = $inputs['collect_amount'] ;

        $data['merchant_id']      =   $merchant_id;
        $data['merchant_shop_id'] =   $merchant_shop_id;

        $merchant_shop = getMerchantShopByMerchantId_HH($merchant_id,$merchant_shop_id);
        $merchant_pickup_area_id =  $merchant_shop?$merchant_shop->pickup_area_id:NULL;
        $data['merchant_pickup_area_id'] = $merchant_pickup_area_id;

        $customerSingleAreaDetail       = getAreaByAreaId_HH($customer_area_id);
        $merchantSingleAreaDetail       = getAreaByAreaId_HH($merchant_pickup_area_id);

        $customer_district_id           = $customerSingleAreaDetail?$customerSingleAreaDetail->district_id:NULL;
        $merchant_district_id           = $merchantSingleAreaDetail?$merchantSingleAreaDetail->district_id:NULL;
        $data['merchant_district_id']   = $merchant_district_id;
        $data['customer_district_id']   = $customer_district_id;

        //creating branch id
        $merchant                   = getMerchantByMerchantId_HH($merchant_id);//from user table
        $creating_branch_id         = $merchant?$merchant->branch_id:getBranchTypeByBranchTypeID_HH(1)->id;
        $data['merchant_branch_id'] = $creating_branch_id;

        // get destination branch id by  customer area_id
        $destinaiton_branch         = getBranchByAreaIdFromAreaBranch_HH($customer_area_id);
        $destinaiton_branch_id      = $destinaiton_branch?$destinaiton_branch->branch_id:NULL;

        $destinaitonAreaDetail                  = $customerSingleAreaDetail;
        $destinaitonAreaId_service_city_type_id = $destinaitonAreaDetail?$destinaitonAreaDetail->service_city_type_id:3;
        $merchantAreaId_service_city_type_id    = $merchantSingleAreaDetail?$merchantSingleAreaDetail->service_city_type_id:3;

        //====================================================================
            if($creating_branch_id == $destinaiton_branch_id)
            {
                if($destinaitonAreaId_service_city_type_id == $merchantAreaId_service_city_type_id)
                {
                    $service_city_type = $destinaitonAreaId_service_city_type_id;
                }
                else if($destinaitonAreaId_service_city_type_id > $merchantAreaId_service_city_type_id)
                {
                    $service_city_type = $destinaitonAreaId_service_city_type_id;
                }
                else if($destinaitonAreaId_service_city_type_id < $merchantAreaId_service_city_type_id)
                {
                    $service_city_type = $merchantAreaId_service_city_type_id;
                }else{
                    $service_city_type = 3;
                }
            }else{
                $service_city_type = 3;
            }

        //====================================================================
            $query = Service_charge_setting::query();
                $query->where('service_type_id',$service_type_id);
                $query->where('parcel_category_id',$parcel_category_id);
                $query->where('parcel_type_id',$parcel_type_id);
                $query->where('weight_id',$weight_id);
            if($service_city_type)
            {
                $query->where('service_city_type_id',$service_city_type);
            }

        $service_charge = $query->first();
        $data['charge'] =  deliveryChargeCalculationAmountForEachMerchant_HH($merchant_id,$service_city_type=1,$service_charge?$service_charge->charge:00.00);
        $data['collect_amount'] =   $collect_amount;
        $data['service_charge_setting_id'] =   $service_charge?$service_charge->id:NULL;
        $data['cod_charge'] =   codChargeCalculationAmountForEachMerchant_HH($merchant_id,$service_city_type=1,$collect_amount);
        $data['total_payable_amount'] =   $collect_amount - ($data['cod_charge'] + $data['charge']);
        return $data;
    }

    /*
    |---------------
    | Order, Admin, Merchant Agent and others order creating calcuation
    |------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------
    | Order, Admin, Merchant Agent and others order creating calcuation
    |----------------
    */
    function parcelAmountPaymentTypeCalculation_HH($inputs)//parcel_amount_payment_type_id
    {
        $parcel_amount_payment_type_id      =  $inputs['parcel_amount_payment_type_id'];
        $collect_amount                     =  $inputs['collect_amount'];
        $charge                             =  $inputs['charge'];
        $cod_charge                         =  $inputs['cod_charge'];
        $total_charge                       =  $inputs['total_charge'];
        $collectable_amount_from_customer   =  $inputs['collectable_amount_from_customer'];
        $collectable_amount_from_merchant   =  $inputs['collectable_amount_from_merchant'];
        $total_payable_amount               =  $inputs['total_payable_amount'];
        $payment_status_id                  =  $inputs['payment_status_id'];

        $client_merchant_payable_amount = 0;
        $service_cod_payment_status_id = NULL;
        $service_delivery_payment_status_id = NULL;
        $collect_amount = $collect_amount ;
        if($parcel_amount_payment_type_id == 1)// product, delivery charge customer dibe.  cod chage client dibe so payment
        {
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = $collect_amount - $charge;
                $service_cod_payment_status_id = 1;
            }else{
                $client_merchant_payable_amount = $collect_amount - ($charge+$cod_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 2) // product, delivery , cod charge customer dibe. so baki
        {
            $client_merchant_payable_amount = $collect_amount - ($charge+$cod_charge);
        }
        else if($parcel_amount_payment_type_id == 3) // product price customer dibe. delivery,cod charge so baki
        {
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = $collect_amount;
                $service_cod_payment_status_id = 1;
                $service_delivery_payment_status_id = 1;
            }else{
                $client_merchant_payable_amount = $collect_amount - ($charge + $cod_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 4) // product price,cod customer dibe. delivery charge so baki
        {
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = $collect_amount - $cod_charge;
                $service_delivery_payment_status_id = 1;
            }else{
                $client_merchant_payable_amount = $collect_amount -  ($charge + $cod_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 5) // customer delivery charge so cod baki
        {
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = 0;
                $service_cod_payment_status_id = 1;
            }else{
                $client_merchant_payable_amount = 0;
            }
        }
        else if($parcel_amount_payment_type_id == 6) // delivery,cod charge customer dibe. nothing baki
        {
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = 0;
            }else{
                $client_merchant_payable_amount = 0;
            }
        }
        else if($parcel_amount_payment_type_id == 7) // customer kisuei dibe na. delivery charge ,cod so baki
        {
            $collect_amount = 0;
            if($payment_status_id == 2)//paid , 1=unpaid
            {
                $client_merchant_payable_amount = 0;
                $service_cod_payment_status_id = 1;
                $service_delivery_payment_status_id = 1;
            }else{
                $client_merchant_payable_amount = 0;
            }
        }
        $data['service_cod_payment_status_id'] = $service_cod_payment_status_id;
        $data['service_delivery_payment_status_id'] = $service_delivery_payment_status_id;
        $data['client_merchant_payable_amount'] = $client_merchant_payable_amount;
        $data['collect_amount'] = $collect_amount;
        return $data;
        return "COD = " .$service_cod_payment_status_id .", Delivery Charge = ".$service_delivery_payment_status_id .", payable amount = ".$client_merchant_payable_amount;
    }

    /*
    |---------------
    | Order, Admin, Merchant Agent and others order creating calcuation
    |------------------------------------------------------------------
    */

    //order_processing_histories
    function insertOrderProcessingHistory_HH($getData)
    {
        $order_id                   = $getData['order_id'];
        $order_status_id            = $getData['order_status_id'];
        $branch_id                  = $getData['branch_id'];
        $created_by                 = $getData['created_by'];
        $status_changer_id          = $getData['status_changer_id'];
        $status                     = $getData['status'];
        $changing_status_branch_id  = $getData['changed_branch_id'];

        $data =  new Order_processing_history();
        $data->order_id                     = $order_id;
        $data->order_status_id              = $order_status_id;
        $data->changing_status_branch_id    = $changing_status_branch_id;
        $data->branch_id                    = $branch_id;
        $data->created_by                   = $created_by;
        $data->status_changer_id            = $status_changer_id;
        $data->status                       = $status;
        $data->save();
        return $data;
    }

    function orderDestinationByOrderId_HH($order_id)
    {
        Order_destination::where('order_id',$order_id)->first();
    }

    function sendStatusIdBranchId_HH($branch_id)
    {
        $branch = getBranchByBranchId_HH($branch_id);
        $branch_type_id = $branch?$branch->branch_type_id:NULL;

        switch ($branch_type_id) {
            case "4":
                return 10;
                break;
            case "3":
                return 6;
                break;
            case "2":
                return 8;
                break;
            case "1":
                return 41;
                break;
            default:
                return 6;
            }
    }
    function receiveStatusIdBranchId_HH($branch_id)
    {
        $branch = getBranchByBranchId_HH($branch_id);
        $branch_type_id = $branch?$branch->branch_type_id:NULL;

        switch ($branch_type_id) {
            case "4":
                return 11;
                break;
            case "3":
                return 7;
                break;
            case "2":
                return 9;
                break;
            case "1":
                return 42;
                break;
            default:
                return 12;
            }
    }

    function getManpowerAssignedAreaByManpowerId_HH($manpower_id)
    {
        $manpower = getManpowerByManpowerId_HH($manpower_id);

    }

    //manpower_assign_to_areas
    function getManpowerIdByAreaIdAndManpowerTypeId_HH($area_id,$manpower_type_id)
    {
        $query = ManpowerAssignToArea::query();
                    if($manpower_type_id < 3)
                    {
                        $query->where('manpower_type_id',$manpower_type_id);
                    }
                    $query->where('area_id',$area_id)
                    ->first();
    }

    //order_assigns
    function insertOrderAssign_HH($getData)
    {
        $order_id                   = $getData['order_id'];

        $area_id                    = $getData['areaId'];
        $manpower_type_id           = $getData['pickup'];
        $assignedArea               = getManpowerIdByAreaIdAndManpowerTypeId_HH($area_id,$manpower_type_id);
        $manpower_id                = $assignedArea?$assignedArea->manpower_id:NULL;

        $order_processing_type_id   = $getData['order_processing_type_id'];
        $assigner_id                = $getData['assigner_id'];
        $order_assigning_status_id  = $getData['order_assigning_status_id'];
        $collection_status          = $getData['collection_status'];
        $branch_id                  = $getData['branch_id'];
        $status                     = $getData['status'];
        $created_by                 = $getData['created_by'];

        if($manpower_id)
        {
            $data =  new Order_assign();
            $data->manpower_id                  = $manpower_id;
            $data->order_id                     = $order_id;
            $data->order_processing_type_id     = $order_processing_type_id;
            $data->assigner_id                  = $assigner_id;
            $data->order_assigning_status_id    = $order_assigning_status_id;
            $data->collection_status            = $collection_status;
            $data->branch_id                    = $branch_id;
            $data->status                       = $status;
            $data->created_by                   = $created_by;
            $data->status                       = $status;
            $data->save();
            return $data;
        }
        return true;
    }






    /*
    |----------------------------------------------------------------------------
    |   Mobile Sms , Sending
    |----------------------------------------------------------------------------
    */
        function sendingSms_HH($number,$content)
        {
            $url = "http://66.45.237.70/api.php";
            $data= array(
                'username'=>smsUsername_HS(),
                'password'=>smsPassword_HS(),
                'number'=>"$number",
                'message'=>"$content"
            );
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];
            return true;
        }
    /*
    |----------------------------------------------------------------------------
    |   SMS CONTENT
    |----------------------------------------------------------------------------
    */


    function deliveryParcelAmountType_HH()
    {
        return 1;
        //delivey_parcel_amount_typies
    }
    /*
    |-----------------------------------------------------------------------------
    | All SMS are sending properly
    |------------------------------------------------
    */
        //Parcel Receiving time, smsToCustomerWhenParcelBookedFromMerchant_HH()
        function smsToCustomerWhenParcelBookedFromMerchant_HH($customer_name = NULL , $invoice_no = NULL,$company_name = NULL,$collect_amount,$delivery_charge_type_id = NULL)
        {
           /*  if($deliveryParcelAmountypeId == deliveryParcelAmountType_HH())
            {
                $with_service_charge = " with delivery charge is ";
            }else{
                $with_service_charge = " is ";
            } */
            $with_service_charge = " (with delivery charge) is ";
return "Dear ".$customer_name.",
Your Parcel has been booked from ".$company_name.". Your parcel amount".$with_service_charge . $collect_amount." taka.
Thanked By ".appUrl_HS();
        } //HH_SENDING_SMS($number,smsToCustomerWhenParcelBookedFromMerchant_HH($customer_name,$invoice_no,$company_name,$collect_amount));


        //sms - to merchant,when Assigned for delivery
        function smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
        {
return "Dear ".$company_name.",
Your Parcel (Invoice No- '" . $invoice_no . "') is assigned to delivery man. Delivery Man : ".$delivery_man_name.", Cell - ".$delivery_man_phone."
Thanked By ".appUrl_HS();
        }// HH_SENDING_SMS($number,smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name,$invoice_no,$delivery_man_name, $delivery_man_phone));


        //sms to customer, Assigned for delivery
        function smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
        {
return "Dear ".$customer_name.",
Your Parcel (Invoice No- '" . $invoice_no . "') is assigned to delivery man. The Parcel will be reached on Expected day and time. Delivery Man : ".$delivery_man_name.", Cell - ".$delivery_man_phone."
Thanked By ".appUrl_HS();
        }// HH_SENDING_SMS($number,smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name,$invoice_no,$delivery_man_name, $delivery_man_phone));


        //Delivery Completed / Success SMS to Merchant smsToMerchantWhenParcelDeliverySuccessful_HH
        function smsToMerchantWhenParcelDeliverySuccessful_HH($company_name = NULL,$invoice_no,$collect_only_product_amount = NULL)
        {
return "Dear ".$company_name.",
Your Parcel (Invoice No- '" . $invoice_no . "') has been delivered successfully. Please Collect your Condition ".$collect_only_product_amount." taka.
Thanked By ".appUrl_HS();
    }// HH_SENDING_SMS($number,smsToMerchantWhenParcelDeliverySuccessful_HH($company_name,$invoice_no,$collect_only_product_amount));


        //Delivery HOLD SMS to Merchant  smsToMerchantWhenParcelHoldDelivery_HH
        function smsToMerchantWhenParcelHoldDelivery_HH($company_name = NULL,$invoice_no)
        {
return "Dear ".$company_name.",
Your Parcel (Invoice No- '" . $invoice_no . "') has been Hold by customer. Please contract with customer.
Thanked By ".appUrl_HS();
    }// HH_SENDING_SMS($number,smsToMerchantWhenParcelHoldDelivery_HH($company_name,$invoice_no));


        //Delivery Cancel SMS to Merchant smsToMerchantWhenParcelCancelDelivery_HH
        function smsToMerchantWhenParcelCancelDelivery_HH($company_name = NULL,$invoice_no)
        {
return "Dear ".$company_name.",
Your Parcel (Invoice No- '" . $invoice_no . "') has been Canceled by customer. Please contract with customer.
Thanked By ".appUrl_HS();
    }// HH_SENDING_SMS($number,smsToMerchantWhenParcelCancelDelivery_HH($company_name,$invoice_no));




    //  Insert In order_sms_sendings table
    function insertSmsWhenOrderProcessing_HH($order_id, $sending_method = NULL,$sending_method_parameter = NULL,$sms_note = NULL
    ,$total_sms = NULL,$content = NULL,$content_lenght = NULL)
    {
        $sms = new Order_sms_sending();
        $sms->order_id = $order_id;
        $sms->sending_method = $sending_method;
        $sms->sending_method_parameter = $sending_method_parameter;
        $sms->sms_note = $sms_note;
        $sms->sms_delivery_status = 0;
        $sms->branch_id = 1;
        $sms->sms_count = $total_sms?$total_sms:1;
        $sms->sms_content = $content;
        $sms->sms_lenght = $content_lenght;
        $sms->save();
        return $sms;
    }

    //sms count
    function smmCount_HH($content,$language = 'english')
    {
        if($language == 'english'){
            $sms_base = 160;
        }else{
            $sms_base = 160;
        }
        return ceil($content/$sms_base);
    }

    /*
    |-----------------------------------------------------
    | All SMS are sending properly
    |-----------------------------------------------------------------------------------------
    */
        function merchantLoginOtpContent_HH($otp)
        {
            return $otp." is your login code for ". appUrl_HS() .". Thank You.";
        }
    /*
    |-----------------------------------------------------
    | All SMS are sending properly
    |-----------------------------------------------------------------------------------------
    */


        function getCustomerByCustomerId_HH($customer_id)
        {
            return Customer::find($customer_id);
        }

        function getCustomerByCustomerPhone_HH($phone_no)
        {
            return Customer::where('customer_phone',$phone_no)->first();
        }

            //insert customer
        function insertCustomer_HH($data)
        {
           /*  $data['customer_name']  = $request->customer_name;
            $data['customer_phone'] = $request->customer_phone;
            $data['area_id']        = $request->area_id;
            $data['district_id']    = $findarea->district_id;
            $data['branch_id']      = $destination_branch_id;
            $data['address']        = $request->address; */
            $customer = New Customer();
            $customer->customer_name =  $data['customer_name'];
            $customer->customer_phone=  $data['customer_phone'];
            $customer->area_id       =  $data['area_id'];
            $customer->district_id   =  $data['district_id'];
            $customer->branch_id     =  $data['branch_id'];
            $customer->address       =  $data['address'];
            $customer->status        = 1;
            $customer->save();
            return $customer;
        }



        function getGeneralCustomerByGeneralCustomerId_HH($customer_id)
        {
            return General_customer::find($customer_id);
        }

        function getGeneralCustomerByGeneralCustomerPhone_HH($phone_no)
        {
            return General_customer::where('phone',$phone_no)->first();
        }
            //insert general customer  as merchant
        function insertGeneralCustomerAsMerchant_HH($data)
        {
            $customer = New General_customer();
            $customer->name          =  $data['name'];
            $customer->phone         =  $data['phone'];
            $customer->area_id       =  $data['area_id'];
            $customer->district_id   =  $data['district_id'];
            $customer->branch_id     =  $data['branch_id'];
            $customer->address       =  $data['address'];
            $customer->status        = 1;
            $customer->save();
            return $customer;
            /*
                $gen_customer = New General_customer();
                $gen_customer->name = $request->name;
                $gen_customer->phone= $request->phone;
                $gen_customer->area_id       = $request->g_c_area_id;
                $gen_customer->address       = $request->g_c_address;
                $gen_customer->district_id   = $gen_customer_district_id;
                $gen_customer->branch_id     = $creating_branch_id;
                $gen_customer->status        = 1;
                $gen_customer->save();
            */
            /*
                $customerData['name']  = $request->name;
                $customerData['phone'] = $request->phone;
                $customerData['area_id']        = $request->g_c_area_id;
                $customerData['district_id']    = $gen_customer_district_id;;
                $customerData['branch_id']      = $creating_branch_id;
                $customerData['address']        = $request->g_c_address;
            */
        }



        function getOrderByOrderId_HH($order_id)
        {
            return Order::find($order_id);
        }
        function orderDetails_HH($order_id)
        {
            $order  =  getOrderByOrderId_HH($order_id);
            $data['invoice_no'] = $order->invoice_no;
            $data['merchant_invoice'] = $order->merchant_invoice;
            $data['parcel_owner_type_id'] = $order->parcel_owner_type_id;
            $data['merchant_id'] = $order->merchant_id;
            $data['creating_branch_id'] = $order->creating_branch_id;
        }


        function getOrderAssignByOrderIdAndProcessingTypeId($order_id,$processing_type_id = 2)
        {
           return Order_assign::where('order_assigning_status_id',2)
                        ->where('order_id',$order_id)
                        ->where('order_processing_type_id',$processing_type_id)
                        ->whereNull('deleted_at')
                        ->first();
            //order_assigning_status_id == 2 == received /accept
            //order_processing_type_id == 2 == delivery /
        }

        function getCustomerInformationDetailByCustomerId_HH($customer_id)
        {
            $data = [];
            $customer =  getCustomerByCustomerId_HH($customer_id);
            $data['customer_name']      = $customer?$customer->customer_name:NULL;
            $data['customer_phone']     = $customer?$customer->customer_phone:NULL;
            return $data;
        }

        function getMerchantInformationDetailByMerchantId_HH($merchant_id)
        {
            $data = [];
            //getMerchantByMerchantId_HH($merchant_id)
            $merchantSetting    =    getMerchantSettingByMerchantId_HH($merchant_id);
            //getMerchantShopByMerchantId_HH($merchant_id,$shop_id)
            $data['companyName']      = $merchantSetting ?$merchantSetting ->company_name:NULL;
            $data['companyPhone']     = $merchantSetting ?$merchantSetting ->company_phone:NULL;
            return $data;
        }
        function getManpowerInformationDetailByManpowerId_HH($manpower_id)
        {
            $deliveryMan                = getManpowerByManpowerId_HH($manpower_id);
            $data['manpower_name']      = $deliveryMan ?$$deliveryMan ->name:NULL;
            $data['manpower_phone']     = $deliveryMan ?$$deliveryMan ->phone:NULL;
            return $data;
        }

        function getOrderInvoiceInformationDetailByOrderId($order_id,$processing_type_id = 2) //$processing_type_id = 2 = delivery
        {
            $data = [];
            $order      = getOrderByOrderId_HH($order_id);

            $customer   = getCustomerInformationDetailByCustomerId_HH($order?$order->customer_id:NULL);
            $data['customer_name']      = $customer?$customer['customer_name']:NULL;
            $data['customer_phone']     = $customer?$customer['customer_phone']:NULL;
            $merchant   = getMerchantInformationDetailByMerchantId_HH($order?$order->merchant_id:NULL);

            $assign     = getOrderAssignByOrderIdAndProcessingTypeId($order?$order->id:NULL,$processing_type_id = 2); //$processing_type_id = 2 = delivery
            $manpower   = getManpowerInformationDetailByManpowerId_HH($assign?$assign->manpower_id:NULL);//manpower_id

            $data['invoice_no']         = $order?$order->invoice_no:NULL;
            $data['collect_amount']     = $order?$order->collect_amount:00.00;
            $data['collect_amount_only']= $order?$order->client_merchant_payable_amount:00.00;

            $data['company_name']       = $merchant?$merchant['companyName']:NULL;
            $data['company_phone']      = $merchant?$merchant['companyPhone']:NULL;

            $data['manpower_name']       = $manpower?$manpower['manpower_name']:NULL;
            $data['manpower_phone']      = $manpower?$manpower['manpower_phone']:NULL;
            return $data;
        }   //return getOrderInvoiceInformationDetailByOrderId(8)['customer_name'];
       // its uses for order sms sending time


       function sendingOrderProcessingSmsWhichIsNotDelivered_HH($order_id,$processing_type_id = 2)
       {
           $remainingDeliverysmses = Order_sms_sending::where('sms_delivery_status',0)->whereNull('deleted_at')->get();
           foreach($remainingDeliverysmses as $Key => $sms)
           {
                $getInformation     = getOrderInvoiceInformationDetailByOrderId($sms->order_id,$processing_type_id = 2);
                $customer_name      = $getInformation['customer_name'];
                $customer_phone     = $getInformation['customer_phone'];
                $invoice_no         = $getInformation['invoice_no'];
                $collect_amount     = $getInformation['collect_amount'];
                $company_name       = $getInformation['company_name'];
                $merchant_phone      = $getInformation['company_phone'];
                $manpower_name      = $getInformation['manpower_name'];
                $manpower_phone     = $getInformation['manpower_phone'];
                $collect_amount_only= $getInformation['collect_amount_only'];

                $content = "";

                if($sms->sending_method == 'smsToCustomerWhenParcelBookedFromMerchant_HH')
                {
                    $content =  smsToCustomerWhenParcelBookedFromMerchant_HH($customer_name,$invoice_no,$company_name,$collect_amount,2);
                    sendingSms_HH($merchant_phone,$content);
                } //$customer_name = NULL , $invoice_no = NULL,$company_name = NULL,$collect_amount,$delivery_charge_type_id = NULL

                if($sms->sending_method == 'smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH')
                {
                    $content =  smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name,$invoice_no,$manpower_name,$manpower_phone,2);
                    sendingSms_HH($merchant_phone,$content);
                }//smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name = NULL,$invoice_no = NULL,$manpower_name, $manpower_phone)

                if($sms->sending_method == 'smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH')
                {
                    $content =  smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name,$invoice_no,$manpower_name,$manpower_phone,2);
                    sendingSms_HH($merchant_phone,$content);
                }//smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)

                if($sms->sending_method == 'smsToMerchantWhenParcelDeliverySuccessful_HH')
                {
                    $content =  smsToMerchantWhenParcelDeliverySuccessful_HH($company_name,$invoice_no,$collect_amount_only,2);
                    sendingSms_HH($merchant_phone,$content);
                }//smsToMerchantWhenParcelDeliverySuccessful_HH($company_name = NULL,$invoice_no,$collect_only_product_amount = NULL)

                if($sms->sending_method == 'smsToMerchantWhenParcelHoldDelivery_HH')
                {
                    $content =  smsToMerchantWhenParcelHoldDelivery_HH($company_name,$invoice_no,2);
                    sendingSms_HH($merchant_phone,$content);
                }//smsToMerchantWhenParcelHoldDelivery_HH($company_name = NULL,$invoice_no)

                if($sms->sending_method == 'smsToMerchantWhenParcelCancelDelivery_HH')
                {
                    $content =  smsToMerchantWhenParcelCancelDelivery_HH($company_name,$invoice_no,2);
                    sendingSms_HH($merchant_phone,$content);
                }//smsToMerchantWhenParcelCancelDelivery_HH($company_name = NULL,$invoice_no)


                $content_lenght = strlen($content);
                $total_sms = smmCount_HH($content_lenght);
                $deliveryStatus = 1;
                $updateSms          = Order_sms_sending::where('id',$sms->id)->first();
                if($updateSms)
                {
                    $sms->sms_delivery_status   = $deliveryStatus;
                    $sms->sms_count             = $total_sms;
                    $sms->sms_content           = $content;
                    $sms->sms_lenght            = $content_lenght;
                    $sms->save();
                    //return true;
                }//end if
           }//end foreach
           return true;
       }//end function

       function updateSmsSendingTable()
       {
            /*
                smsToCustomerWhenParcelBookedFromMerchant_HH($customer_name = NULL , $invoice_no = NULL,$company_name = NULL,$collect_amount,$delivery_charge_type_id = NULL)
                smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
                smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
                smsToMerchantWhenParcelDeliverySuccessful_HH($company_name = NULL,$invoice_no,$collect_only_product_amount = NULL)
                smsToMerchantWhenParcelHoldDelivery_HH($company_name = NULL,$invoice_no)
                smsToMerchantWhenParcelCancelDelivery_HH($company_name = NULL,$invoice_no)
            */
            //return true;
       }


    /*
    |--------------------------------------------------------------------------------------------------------------
    |   All Order Status style
    |-----------------------------------------------------------------------------------------------
    */
        function orderStatusStyle_HH($order_status_id)
        {
            switch ($order_status_id) {
            case "1":
                echo "background-color: #ffff8a;color:red;";
                break;
            case "2":
                echo "background-color: #ADFF2F;color:#00008B;";
                break;
            case "3":
                echo "background-color: #4B0082;color:white;";
                break;
            case "4":
                echo "background-color: #6A5ACD;color:#F0F8FF;";
                break;
            case "5":
                echo "background-color: #008080;color:#FFD700;";
                break;
            case "6":
                echo "background-color: #00FFFF;color:#000080;";
                break;
            case "7":
                echo "background-color: #008080;color:#ADFF2F;";
                break;
            case "8":
                echo "background-color: #008000;color:#FFFF00;";
                break;
            case "9":
                echo "background-color: #008000;color:#FFFF00;";
                break;
            case "10":
                echo "background-color: #556B2F;color:#7FFFD4;";
                break;
            case "11":
                echo "background-color: #00CED1;color:#FFFF00;";
                break;
            case "12":
                echo "background-color: #00FF7F;color:#DC143C;";
                break;
            case "13":
                echo "background-color: #A9A9A9;color:#FF0000;";
                break;
            case "14":
                echo "background-color: #BDB76B;color:#00008B;";
                break;
            case "15":
                echo "background-color: #DC143C;color:#FFFF00;";
                break;
            case "16":
                echo "background-color: #8B0000;color:#FFFF00;";
                break;
            case "17":
                echo "background-color: #B22222;color:#FFFF00;";
                break;
            case "18":
                echo "background-color: #FF0000;color:#FFFF00;";
                break;
            case "19":
                echo "background-color: #FF4500;color:#FFFF00;";
                break;
            case "20":
                echo "background-color: #C71585;color:#FFFF00;";
                break;
            case "21":
                echo "background-color: #F08080;color:#FFFF00;";
                break;
            case "22":
                echo "background-color: #FF1493;color:#FFFF00;";
                break;
            case "23":
                echo "background-color: ##800000;color:#FFFF00;";
                break;
            default:
                echo "background-color: green;color:white;";
            }
        }
    /*
    |----------------------------------------------------------------------------------------------
    |   All Order Status style END
    |---------------------------------------------------------------------------------------------------------------
    */

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Order Status WhereIn
    |-------------------------------------------------------------------------------
    */
        function whereInCurrentStatusWhenAssigningParcelForAdmin_HH()
        {
            return [1,2,3,4,5,42,12,13,16,17,27,28];
        }
        function whereInChangingStatusWhenAssigningParcelForAdmin_HH()
        {
            return [3,5,12,13,16,18,19,27,28,29];
        }

        function whereInCurrentStatusWhenAssigningParcelForAgent_HH()
        {
            return [2,3,4,5,11,12,13,16,17,27,28];
        }
        function whereInChangingStatusWhenAssigningParcelForAgent_HH()
        {
            return [3,5,12,13,16,18,19,27,28,29];
        }
    /*
    |---------------------------------------------------------------------------------------
    |   Order Status WhereIn
    |---------------------------------------------------------------------------------------------------------------
    */


    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Agent Commisson , Hub Commission,branch commission, Manpower Commision
    |-------------------------------------------------------------------------------
    */
        function branchCommissionSettings_HH($branch_id)
        {
            return Branch_commission_setting::where('branch_id',$branch_id) 
                                    ->whereNull('deleted_at')
                                    ->first();
        }
        //---------------======================------------------=====================--------------
        /**Branch Commission Set */
        function getBranchCommissionSettingByBranchIdAndCommissionTypeId_HH($branch_id,$branch_commission_type_id)
        {
            $setting = branchCommissionSettings_HH($branch_id);
            if(!$setting)return 0;
            $data = [];
            $data['commission_amount']     = 0;
            $data['commission_type']       = 0;
            $data['commission_setting_id'] = 0;
            switch ($branch_commission_type_id) 
            {
                case "1":
                    $data['commission_amount']     = $setting->create_and_pick_commission_amount;
                    $data['commission_type']       = $setting->create_and_pick_commission_type_id;
                    $data['commission_setting_id'] = $setting->id;
                    return $data;
                    return $setting->create_and_pick_commission_amount;
                    break;
                case "2":
                    $data['commission_amount']     = $setting->create_pick_and_delivery_commision_amount;
                    $data['commission_type']       = $setting->create_pick_and_delivery_commision_type_id;
                    $data['commission_setting_id'] = $setting->id;
                    return $data;
                    return $setting->create_pick_and_delivery_commision_amount;
                    break;
                case "3":
                    $data['commission_amount']     = $setting->receive_and_delivery_commision_amount;
                    $data['commission_type']       = $setting->receive_and_delivery_commision_type_id;
                    $data['commission_setting_id'] = $setting->id;
                    return $data;
                    return $setting->receive_and_delivery_commision_amount;
                    break;
                case "4":
                    $data['commission_amount']     = $setting->receive_as_media_commision_amount;
                    $data['commission_type']       = $setting->receive_as_media_commision_type_id;
                    $data['commission_setting_id'] = $setting->id;
                    return $data;
                    return $setting->receive_as_media_commision_amount;
                    break;
                case "5":
                    $data['commission_amount']     = $setting->sending_as_media_commision_amount;
                    $data['commission_type']       = $setting->sending_as_media_commision_type_id;
                    $data['commission_setting_id'] = $setting->id;
                    return $data;
                    return $setting->sending_as_media_commision_amount;
                    break;
                default:
                    return $data;
            }
        }

        function insertingBranchCommission_HH($order,$myBranchId)
        {
            $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
            $headBranch = $branch_type_id?$branch_type_id->id:1;
            $creating_branch_id         = $order->creating_branch_id;
            if($creating_branch_id != $headBranch)
            {
                //------------------------------------------
                $destination_branch_id      = $order->destination_branch_id;
                $branch_commission_type_id  = NULL;
                $branch_type_id    = getBranchByBranchId_HH($myBranchId)->branch_type_id;
                if($creating_branch_id  != $destination_branch_id)
                {
                    $branch_commission_type_id = 1;  
                }else{
                    $branch_commission_type_id = 2; 
                } 
                $data = getBranchCommissionSettingByBranchIdAndCommissionTypeId_HH($creating_branch_id,$branch_commission_type_id);
                $commission_type                    = $data['commission_type'];
                $commission_amount                  = $data['commission_amount'];
                $branch_commission_setting_id       = $data['commission_setting_id'];
                $totalCharge            = getOrderTotalServiceCharge_HH($order->id);
                $commissionAmount       = branchCommissionCalculationAmount_HH($commission_type,$commission_amount,$totalCharge);
                //------------------------------------------
                $commission = new Branch_commission();
                $commission->order_id                       = $order->id;  
                $commission->branch_id                      = $myBranchId;  
                $commission->branch_commission_setting_id   = $branch_commission_setting_id;  
                $commission->branch_type_id                 = $branch_type_id;  
                $commission->branch_commission_type_id      = $branch_commission_type_id;  
                $commission->charge                         = $totalCharge;  
                $commission->commission                     = $commissionAmount;  
                $commission->active_status                  = 0;  
                $commission->save();
                return $commission;    
            }return 1;
        }

        function branchCommissionCalculationAmount_HH($commissionType,$commissionAmount,$totalChargeAmount)
        {
            if($commissionType == 1)//parcent 
            {
                return $commissionAmount * $totalChargeAmount / 100;
            }else{
                return $commissionAmount;
            }
        }

        /**total Service Charge */
        function getOrderTotalServiceCharge_HH($order_id)
        {
            $order = getOrderByOrderId_HH($order_id);
            $service_charge = $order->service_charge;
            $cod_charge     = $order->cod_charge;
            $others_charge  = $order->others_charge;
            $total          = $service_charge + $cod_charge + $others_charge;
            return  $total;
        }
        //---------------======================------------------=====================--------------
       
        /*inserting branch commission when receiving and sending*/
        function insertingBranchCommissionWhenReceiveAndSend_HH($order,$myBranchId,$branch_commission_type_id)
        {
            $branchHead                 = getBranchTypeByBranchTypeID_HH(1);
            $headBranchId               = $branchHead?$branchHead->id:1;
            $creating_branch_id         = $order->creating_branch_id;
            $branch_type_id             = getBranchByBranchId_HH($myBranchId)->branch_type_id;
            if($myBranchId != $headBranchId)
            {
                $data = getBranchCommissionSettingByBranchIdAndCommissionTypeId_HH($creating_branch_id,$branch_commission_type_id);
                $commission_type                    = $data['commission_type'];
                $commission_amount                  = $data['commission_amount'];
                $branch_commission_setting_id       = $data['commission_setting_id'];
                $totalCharge            = getOrderTotalServiceCharge_HH($order->id);
                $commissionAmount       = branchCommissionCalculationAmount_HH($commission_type,$commission_amount,$totalCharge);
                //------------------------------------------
                $commission = new Branch_commission();
                $commission->order_id                       = $order->id;  
                $commission->branch_id                      = $myBranchId;  
                $commission->branch_commission_setting_id   = $branch_commission_setting_id;  
                $commission->branch_type_id                 = $branch_type_id;  
                $commission->branch_commission_type_id      = $branch_commission_type_id;  
                $commission->charge                         = $totalCharge;  
                $commission->commission                     = $commissionAmount;  
                $commission->active_status                  = 0;  
                $commission->save();
                return $commission;    
            }return 1;
        }

        function orderReceivingCommissionTypeId_HH($order_id,$myBranchId)
        {
            $order                  = getOrderByOrderId_HH($order_id);
            $creating_branch_id     = $order->creating_branch_id;
            $destination_branch_id  = $order->destination_branch_id;
            $branch_commission_type_id = NULL;

            if($creating_branch_id  != $destination_branch_id)
            {
                if($destination_branch_id == $myBranchId)
                {
                    $branch_commission_type_id = 3;
                }else{
                    $branch_commission_type_id = 4;
                }
            }
            return $branch_commission_type_id;
        }
        
        function orderSendingCommissionTypeId_HH($order_id,$myBranchId)
        {
            $order                  = getOrderByOrderId_HH($order_id);
            $creating_branch_id     = $order->creating_branch_id;
            $destination_branch_id  = $order->destination_branch_id;
            $branch_commission_type_id = NULL;
            if($creating_branch_id  != $destination_branch_id)
            {
                if($creating_branch_id == $myBranchId)
                {
                    $branch_commission_type_id = 1;
                }else{
                    $branch_commission_type_id = 5;
                }
            }
            return $branch_commission_type_id;
        }
        //---------------======================------------------=====================--------------
        /**total Commission of a branch */
      
        /**Manpower Commission */
        function getManpowerAssignedData_HH($order_assigning_status_id,$order_id)
        {
            return Order_assign::where('order_assigning_status_id',$order_assigning_status_id)
                            ->where('order_id',$order_id)
                            //->where('order_processing_type_id',$order_processing_type_id)
                            ->whereNull('deleted_at')
                            ->first();
        }
        function manpowerCommissionAmountInsert_HH($order,$branch_id,$created_by = NULL)
        {
            $amount = 0;
            $totalAmount = 0;
            if($order->branch_id == 1)
            {
                $amount = getOrderTotalServiceCharge_HH($order->order_id);
            }
            else{
                $amount = specificOrderCommissionByBranchId_HH($order->order_id,$order->branch_id);  
            }
            if($order->order_processing_type_id == 1)
            {
                $totalAmount = manpowerPickupCommissionAmount_HH($order->manpower_id,$order->branch_id,$amount);
            }
            else if($order->order_processing_type_id == 2)
            {
                $totalAmount = manpowerDeliveryCommissionAmount_HH($order->manpower_id,$order->branch_id,$amount);
            }

            $data  =  new ManpowerIncomeHistory();
            $data->order_id                 = $order->order_id;
            $data->manpower_id              = $order->manpower_id;
            $data->order_processing_type_id = $order->order_processing_type_id;
            $data->amount                   = $totalAmount;
            $data->branch_id                = $branch_id;
            $data->payment_status_id        = NULL;
            $data->created_by               = $created_by;
            $data->save();
            return $data; 
        }
        
        function specificOrderCommissionByBranchId_HH($order_id,$branch_id)
        {
            return Branch_commission::where('order_id',$order_id)
                            ->where('branch_id',$branch_id)
                            ->sum('commission');
        }

        /**Manpower Commission */
        function manpowerCommissionSettings_HH($manpower_id,$branch_id)
        {
            return ManpowerCommissionSetting::where('manpower_id',$manpower_id)
                                        ->where('branch_id',$branch_id)
                                        ->first();
        }

        function manpowerPickupCommissionAmount_HH($manpower_id,$branch_id,$amount)
        {
            $settings = manpowerCommissionSettings_HH($manpower_id,$branch_id);
            if(!$settings)return 0;
            if($settings->pickup_commission_type_id == 1)
            {
                return  $amount * $settings->pickup_commission_amount / 100;
            }
            // default cod setting calculation
            else{
                return   $settings->pickup_commission_amount;
            }
        }
        function manpowerDeliveryCommissionAmount_HH($manpower_id,$branch_id,$amount)
        {
            $settings = manpowerCommissionSettings_HH($manpower_id,$branch_id);
            if(!$settings)return 0;
            if($settings->delivery_commission_type_id == 1)
            {
                return  $amount * $settings->delivery_commission_amount / 100;
            }
            // default cod setting calculation
            else{
                return   $settings->delivery_commission_amount;
            }
        }
        function manpowerReturnCommissionAmount_HH($manpower_id,$branch_id,$amount)
        {
            $settings = manpowerCommissionSettings_HH($manpower_id,$branch_id);
            if(!$settings)return 0;
            if($settings->return_commission_type_id == 1)
            {
                return  $amount * $settings->return_commission_amount / 100;
            }
            // default cod setting calculation
            else{
                return   $settings->return_commission_amount;
            }
        }

        //mame invoice 
        function makeInvoiceNo_HH($type = "DACBD")
        {
            return $type.date('Y').date('d').date('m').date('his').mt_rand(10,99);
        }
        
    /*
    |---------------------------------------------------------------------------------------
    |    Agent Commisson , Hub Commission,branch commission, Manpower Commision
    |---------------------------------------------------------------------------------------------------------------
    */


    function receivedAmountTypeAmount_HH($order_id,$branch_id,$receive_amount_type_id)
    {
                $q = ReceiveAmountHistory::query();
                        $q->where('received_amount_branch_id',$branch_id);
                        $q->where('order_id',$order_id);
                        $q->select('order_id','receive_amount_type_id','amount',
                        DB::raw('(select sum(amount) where activate_status_id = 1) as amount')
                            //DB::raw('SUM(amount) as amount')
                        );
                        $q->where('receive_amount_type_id',$receive_amount_type_id);
                        $q->where('activate_status_id',1);
                      
                            //->where('destination_branch_id','!=',$branch_id)
                        if($receive_amount_type_id == 1)
                        {
                            $q->where('service_delivery_payment_status_id',1);
                           /*  $result =  $q->first();
                            return $result?$result->amount:00.00; */
                        }
                        else if($receive_amount_type_id == 2)
                        {
                            $q->where('service_cod_payment_status_id',1);
                            /* $result =  $q->latest()->first();
                            return $result?$result->amount:00.00; */
                        }
                        else if($receive_amount_type_id == 4)
                        {
                            $q->where('parcel_amount_payment_status_id',3);
                            /* $result =  $q->latest()->first();
                            return $result?$result->amount:00.00; */
                        }
                            /* ->orWhere(function ($query)
                                {
                                   return $query->orWhere('service_cod_payment_status_id',1)
                                    ->orWhere('service_delivery_payment_status_id',1);
                                })
                            ->where('parcel_amount_payment_status_id',3)
                            ->orWhere('service_cod_payment_status_id',1)
                            ->orWhere('service_delivery_payment_status_id',1) */
                            //$q->orderBy('order_id', 'ASC')
                            //->orderBy('receive_amount_type_id', 'ASC')
               return $result =  $q->sum('amount');
    }

    function payToHeadOfficeInvoiceAmount_HH($order_id,$branch_id,$receive_amount_type_id,$pay_to_head_office_invoice_id)
    {
                $q = PayToHeadOfficeInvoiceDetail::query();
                        $q->where('from_branch_id',$branch_id);
                        $q->where('order_id',$order_id);
                        $q->select('order_id','receive_amount_type_id','amount',
                            DB::raw('SUM(amount) as amount')
                        );
                        $q->where('receive_amount_type_id',$receive_amount_type_id);
                        $q->where('pay_to_head_office_invoice_id',$pay_to_head_office_invoice_id);
                        
               return $result =  $q->sum('amount');
    }

    function receiveFromOtherBranchInvoiceAmount_HH($order_id,$branch_id,$receive_amount_type_id,$pay_to_head_office_invoice_id)
    {
                $q = PayToHeadOfficeInvoiceDetail::query();
                        $q->where('from_branch_id',$branch_id);
                        $q->where('order_id',$order_id);
                        $q->select('order_id','receive_amount_type_id','amount',
                            DB::raw('SUM(amount) as amount')
                        );
                        $q->where('receive_amount_type_id',$receive_amount_type_id);
                        $q->where('pay_to_head_office_invoice_id',$pay_to_head_office_invoice_id);
                        
               return $result =  $q->sum('amount');
    }


    function totalServiceChargePaymentStatusByOrderId_HH($orderId)
    {
        $order = getOrderByOrderId_HH($orderId);
        $parcel_amount_payment_type_id = $order->parcel_amount_payment_type_id;
        $collect_amount     = $order->collect_amount;
        $service_charge     = $order->service_charge;
        $cod_charge         = $order->cod_charge;
        $others_charge      = $order->others_charge;
        $instantPaid        = $order->instant_all_charge_received_status_id;
        if($parcel_amount_payment_type_id == 1) //Customer Pay Delivery charge & Product Price
        {
            // if instant_all_charge_received_status_id has some things or 3, then cod charge client payment instantlly 
            if($instantPaid || $instantPaid == 3)
            {
                return $collect_amount - ($service_charge  + $others_charge);
            }else{
                return $collect_amount - ($service_charge + $cod_charge + $others_charge);
            }
        } 
        else if($parcel_amount_payment_type_id == 2) // Customer Pay Delivery charge & Product Price with COD Charge
        {
            // regular
            return $collect_amount - ($service_charge + $cod_charge + $others_charge);
        }
        else if($parcel_amount_payment_type_id == 3) // Customer Pay Only Product Price
        {
            // if instant_all_charge_received_status_id has some things or 2, then service charge & cod charge client payment instantlly
            // if 1, then service charge ,, if 3 then cod charge client payment instantlly
            if($instantPaid == 1)
            {
                return $collect_amount - ($cod_charge  + $others_charge);
            }
            else if($instantPaid == 2)
            {
                return $collect_amount - ($others_charge);
            }

            else if($instantPaid == 3){
                return $collect_amount - ($service_charge + $others_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 4) // Customer Pay Only Product Price with COD Charge
        {
            // if instant_all_charge_received_status_id has some things or 1, then service charge client payment instantlly
            if($instantPaid || $instantPaid == 1)
            {
                return $collect_amount - ($service_charge  + $others_charge);
            }else{
                return $collect_amount - ($service_charge + $cod_charge + $others_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 5) // Customer Pay Only Service (Delivery) Charge
        {
            // if instant_all_charge_received_status_id has some things or 3, then cod charge client payment instantlly
            if($instantPaid || $instantPaid == 3)
            {
                return 0;
            }else{
                return $collect_amount - ($service_charge + $cod_charge + $others_charge);
            }
        }
        else if($parcel_amount_payment_type_id == 6) // Customer Pay Only Service (Delivery) Charge with COD Charge
        {
            // regular
            return $collect_amount - ($service_charge + $cod_charge + $others_charge);
        } 
        else if($parcel_amount_payment_type_id == 7) // Customer Nothing To Pay (Already Paid)
        {
            // if instant_all_charge_received_status_id has some things or 2, then service charge & cod charge client payment instantlly
            // if 1, then service charge ,, if 3 then cod charge client payment instantlly
            if($instantPaid == 1)
            {
                return $collect_amount - ($cod_charge  + $others_charge);
            }
            else if($instantPaid == 2)
            {
                return 0;
            }

            else if($instantPaid == 3){
                return $collect_amount - ($service_charge + $others_charge);
            }
        }
        // instant_all_charge_received_status_id .... 1 == service charge , 2 = service  & cod  charge , 3 == cod charge
    }




