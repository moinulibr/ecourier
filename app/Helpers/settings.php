<?php

    /*
    |-------------------------------------
    | Merchant Login Otp Activate
    |-------------------------------------
    */
    function appUrl_HS()
    {
        return "Dakbd.com";
    }

    function merchantLoginOtpActivateStatus_HS()
    {
        return 1;
    }

    function merchantLoginOptExpireTime_HS()
    {
        return 1;
        // merchant login expire otp time 
    }

    function merchantLoginOptExpireTimeType_HS()
    {
        return 'minutes';
        // merchant login expire otp time type , minutes, seconds , //hour , hour is not allowed
    }






    /*
    |-------------------------------------
    | Merchant Login Username and password
    |-------------------------------------
    */
    function merchantLoginByUsernameFieldInUserMethod_HS()
    {
    	return "phone";
    }

    function merchantLoginByPasswordFieldInasPasswordMethod_HS()
    {
    	return "password";
    }

    function merchantAfterLoginOptFieldNullActivateMethod_HS()
    {
    	return 1;
    }

    function merchantAfterLoginPasswordFieldNullActivateMethod_HS()
    {
    	return 1;
    }


    function merchantLoginOtpExpireTimeActivateMethod_HS()
    {
        return 1;
    }



    /*
    |-------------------------------------
    | Manpower Login Username and password
    |-------------------------------------
    */
    function manpowerLoginByUsernameFieldInUserMethod_HS()
    {
    	return "email";
    }

    function manpowerLoginByPasswordFieldInasPasswordMethod_HS()
    {
    	return "password";
    }


    /*
    |---------------------------------------------------
    | branch commission with or without cod charge
    |-------------------------------------
    */ 
        function branchCommissionWithOrWithoutCodCharge_HS()
        {
            return 0;
        }
    /*
    |-------------------------------------
    | branch commission with or without cod charge
    |--------------------------------------------------
    */


    /*
    |-------------------------------------
    | marchant COD Parmission 
    |-------------------------------------
    */
    function codPermissionActivateStatus_HS()
    {
    	return 1;
    }
    function codDefaultChargeForAllMerchant_HS()
    {
    	return 1;
    }
    function codDefaultChargeTypeForAllMerchant_HS()
    {
    	return "percent";
    }

    /*
    |-------------------------------------
    | marchant COD Parmission 
    |-------------------------------------
    */



    /*
    |-----------------------About SMS , Setting , Sending And content--------------------
    |
    |----------------------------------------------------------------------------
    |   Mobile Sms MY Password and Username
    |----------------------------------------------------------------------------
    */
        function smsUsername_HS()
        {
            return "parcelex";
        }
        function smsPassword_HS()
        {
            return "22882532@@";
        }
    /*
    |----------------------------------------------------------------------------
    |   Mobile Sms MY Password and Username
    |------------------------------------------------------------------------------------------------
    */


    /*
    |---------------------------------------------------------------------------------------------------
    |   Mobile Sms Permission 
    |-------------------------------------------------------------------------
    */
        // for order status changing sms permission
        function smsToCustomerWhenParcelBookedFromMerchantActivateStatus_HS()
        {
            return 1;  
        }
        function smsToMerchantWhenParcelAssigningToManpowerForDeliveryActivateStatus_HS()
        {
            return 1;
        }
        function smsToCustomerWhenParcelAssigningToManpowerForDeliveryActivateStatus_HS()
        {
            return 1;
        }
        function smsToMerchantWhenParcelDeliverySuccessfulActivateStatus_HS()
        {
            return 1;
        }
        function smsToMerchantWhenParcelHoldDeliveryActivateStatus_HS()
        {
            return 1;
        }
        function smsToMerchantWhenParcelCancelDeliveryActivateStatus_HS()
        {
            return 1;
        }
        //smsToCustomerWhenParcelBookedFromMerchant_HH($customer_name = NULL , $invoice_no = NULL,$company_name = NULL,$collect_amount,$delivery_charge_type_id = NULL)
        //smsToMerchantWhenParcelAssigningToManpowerForDelivery_HH($company_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
        //smsToCustomerWhenParcelAssigningToManpowerForDelivery_HH($customer_name = NULL,$invoice_no = NULL,$delivery_man_name, $delivery_man_phone)
        //smsToMerchantWhenParcelDeliverySuccessful_HH($company_name = NULL,$invoice_no,$collect_only_product_amount = NULL)
        //smsToMerchantWhenParcelHoldDelivery_HH($company_name = NULL,$invoice_no)
        //smsToMerchantWhenParcelCancelDelivery_HH($company_name = NULL,$invoice_no)
        //return getOrderInvoiceInformationDetailByOrderId(8)['customer_name'];
    /*
    |----------------------------------------------------------------------------
    |   Mobile Sms Permission
    |------------------------------------------------------------------------------------------------
    */




   