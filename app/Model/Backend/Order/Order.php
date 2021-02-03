<?php

namespace App\Model\Backend\Order;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Order\Order;
use App\Model\Backend\Order\Delivery_otp;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_description;
use App\Model\Backend\Order\Order_destination;
use App\Model\Backend\Order\Order_note;
use App\Model\Backend\Order\Order_processing_history;
use App\Model\Backend\Order\Order_processing_type;
use App\Model\Backend\Order\Order_receiving_sending_history;
use App\Model\Backend\Order\Order_sms_sending;
use App\Model\Backend\Order\Order_status;
use App\Model\Backend\Order\Order_third_party;
use App\Model\Backend\Merchant\Shop\Merchant_shop;
use App\Model\Backend\Merchant\Setting\Merchant_Setting;
use App\Model\Backend\Customer\Customer;
use App\Model\Backend\Customer\General_customer;
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Branch\Branch_type;
use App\Model\Backend\Branch\Branch;
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
use App\User;
use App\Model\Backend\ReceiveAmount\ReceiveAmountHistory;
use App\Model\Backend\Commission\Branch_commission;
use App\Model\Backend\Manpower\ManpowerIncomeHistory;
use App\Model\Backend\PaymentInvoice\HeadOfficePayToBranchInvoiceDetail;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;
use App\Model\Backend\PaymentInvoice\PayToHeadOfficeInvoiceDetail;
use App\Model\Backend\PaymentInvoice\PayToBranchCommissionInvoiceDetail;
class Order extends Model
{
    public function merchantshop()
    {
    	return $this->belongsTo(Merchant_shop::class,'merchant_shop_id');
    }

    public function merchant()
    {
    	return $this->belongsTo(User::class,'merchant_id');
    }

    public function customer() 
    {
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    public function generalCustomer()
    {
    	return $this->belongsTo(General_customer::class,'general_customer_id');
    }

    public function area()
    {
    	return $this->belongsTo(Area::class,'destination_area_id');
    }

    public function district()
    {
    	return $this->belongsTo(District::class,'destination_city_id');
    }

    public function orderStatus()
    {
    	return $this->belongsTo(Order_status::class,'order_status_id');
    }

    public function orderBranch()
    {
    	return $this->belongsTo(Branch::class,'creating_branch_id');
    }
    
    public function destinationBranchs()
    {
    	return $this->belongsTo(Branch::class,'destination_branch_id');
    }
    
    public function destinationDistricts()
    {
    	return $this->belongsTo(District::class,'destination_city_id');
    }

    public function creatingAreas()
    {
    	return $this->belongsTo(Area::class,'creating_area_id');
    }

    public function creatingBranches()
    {
    	return $this->belongsTo(Branch::class,'creating_branch_id');
    }

    public function destinationAreas()
    {
    	return $this->belongsTo(Area::class,'destination_area_id');
    }

    public function creatingDistricts()
    {
    	//return $this->belongsTo(District::class,'destination_city_id');
    }

    public function weights()
    {
    	return $this->belongsTo(Weight::class,'weight_id');
    }


    public function orderStatusCurrentBranchs()
    {
    	return $this->belongsTo(Branch::class,'order_status_changing_current_branch_id');
    }



  
    /*hasMany and hasOne relationship for delete and others*/
      // order processing history
      public function orderProcessingHistories()
      {
            return $this->hasMany(Order_processing_history::class,'order_id','id');
      }

      public function orderReceiveAmounts()
      {
            return $this->hasMany(ReceiveAmountHistory::class,'order_id','id');
      }

      public function orderAssigns()
      {
            return $this->hasMany(Order_assign::class,'order_id','id');
      }

      public function branchCommissions()
      {
            return $this->hasMany(Branch_commission::class,'order_id','id');
      }

      public function manpowerIncomeHistories()
      {
            return $this->hasMany(ManpowerIncomeHistory::class,'order_id','id');
      }

      public function orderDestinations()
      {
            return $this->hasMany(Order_destination::class,'order_id','id');
      }
      public function branchCommissionInvoices()
      {
            return $this->hasMany(PayToBranchCommissionInvoiceDetail::class,'order_id','id');
      }
      
    /*hasMany and hasOne relationship for delete and others*/


    /*hasOne and hasOne relationship for delete and others*/
    public function orderDescriptions()
    {
          return $this->hasOne(Order_description::class,'order_id','id');
    }
    public function orderNotes()
    {
          return $this->hasOne(Order_note::class,'order_id','id');
    }

    public function headOfficePayToBranchInvoiceDetails()
    {
          return $this->hasOne(HeadOfficePayToBranchInvoiceDetail::class,'order_id','id');
    }
    public function branchPayToMerchantClientInvoiceDetails()
    {
          return $this->hasOne(BranchPayToMerchantClientInvoiceDetail::class,'order_id','id');
    }
    public function payToHeadofficeInvoiceDetails()
    {
          return $this->hasOne(PayToHeadOfficeInvoiceDetail::class,'order_id','id');
    } 
    /*hasOne and hasOne relationship for delete and others*/


}
