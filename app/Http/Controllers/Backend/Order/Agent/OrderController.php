<?php

namespace App\Http\Controllers\Backend\Order\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Backend\Order\Order;
use App\Model\Backend\Order\Order_destination;
use App\Model\Backend\Order\Delivery_otp;
use App\Model\Backend\Order\Order_assign;
use App\Model\Backend\Order\Order_assigning_status;
use App\Model\Backend\Order\Order_description;
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
use Validator;
use Session;
use App\Model\Backend\Manpower\ManpowerType;
use App\Model\Backend\Branch\Branch_type;
use App\Model\Backend\Manpower\ManpowerCommissionSetting;
use App\Model\Backend\Admin\Parcel\Delivery_charge_type;
use App\Model\Backend\Admin\Parcel\Delivery_parcel_amount_type;
use App\Model\Backend\Admin\Parcel\Parcel_category;
use App\Model\Backend\Admin\Parcel\Parcel_owner_type;
use App\Model\Backend\Admin\Parcel\Parcel_type;
use App\Model\Backend\Admin\Parcel\ParcelAmountPaymentType;
use App\Model\Backend\Admin\Service\Service_type;
use App\Model\Backend\Admin\Service\Service_city_type;
use App\Model\Backend\Admin\Service\Service_charge_setting;
use App\Model\Backend\Admin\Weight;
use Carbon\Carbon;
use App\Model\Backend\Area\Area;
use App\Model\Backend\Area\District;
use App\Model\Backend\Branch\Area_branch;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Backend\Admin\Setting;
use App\Model\Backend\ReceiveAmount\ReceiveAmountHistory;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::where('creating_branch_id',Auth::guard('web')->user()->branch_id)
                            ->orWhere('order_status_changing_current_branch_id',Auth::guard('web')->user()->branch_id)
                            ->whereNull('deleted_at')
                            ->latest()
                            ->get();
        return view('backend.order.agent.order.allorder',$data);
    }

    public function getmerchantshopajax(Request $request){
        $unionHtmlOption = "<option value=''>Select Merchant Shop</option>";
        $merchant_id = $request->merchant_id;

        $merchantshops = Merchant_shop::where('merchant_id',$merchant_id)->get();
        foreach ($merchantshops as $merchantshop) {
          $unionHtmlOption .= "<option value='$merchantshop->id'>$merchantshop->shop_name</option>";
        }
        // echo $cityHtmlOption;
        return ($unionHtmlOption);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $processing_type_id = 2;
        $order_id = 8;
        return sendingOrderProcessingSmsWhichIsNotDelivered_HH($order_id,$processing_type_id = 2); */
        //return getOrderInvoiceInformationDetailByOrderId(8);
        $branch_id = Auth::guard()->user()->branch_id;
        $data['parcelcategories']   = Parcel_category::all();
        $data['parcel_typies']      = Parcel_type::all();
        $data['weights']            = Weight::all();
        $data['merchants']          = User::where('role_id',4)
                                        //->where('branch_id',$branch_id)
                                        ->whereNull('deleted_at')
                                        ->get();
        $data['districts']          = District::all();
        $data['service_typies']     = Service_type::all();
        $data['parcelAmountPaymentTypies'] = ParcelAmountPaymentType::all();
        return view('backend.order.agent.order.new_order',$data);
    }



    public function ifOrderExisting(Request $request)
    {
        $data['collect_amount'] = 0;
        if($request->parcel_owner_type_id == 1)
        {
            return view('backend.order.agent.order.ajax.delivery_charge.default_charge');
        }else{
            return view('backend.order.agent.order.ajax.delivery_charge.general_customer_charge',$data);
        }
    }


    public function makingDeliveryCharge(Request $request)
    {
        $input['merchant_id']           = $request->merchantId;
        $input['merchant_shop_id']      = $request->merchantShopId;
        $input['weight_id']             = $request->weightId;
        $input['customer_area_id']      = $request->areaId;
        $input['parcel_category_id']    = $request->parcelCategoryId;
        $input['parcel_type_id']        = $request->parcelTypeId;
        $input['service_type_id']       = $request->serviceTypeId;
        $input['collect_amount']        = $request->collectAmount;
        $data = parcelOrderCreateCalculationFormula_HH($input);
        if($request->parcel_owner_type_id == 1)
        {
            return view('backend.order.agent.order.ajax.delivery_charge.calculation_charge',$data);
        }else{
            return view('backend.order.agent.order.ajax.delivery_charge.general_customer_charge',$data);
        }
        //-------------------------------------------------------------------------------------------------


    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input,[
            //'parcel_owner_type_id' => 'required',
            'charge' => 'required',
            'area_id' => 'required',
            //'description.*' => 'nullable|max:100',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $parcel_category_id         = $request->parcel_category_id;
        $service_type_id            = $request->service_type_id;
        $parcel_type_id             = $request->parcel_type_id;
        $creating_branch_id         = Auth::guard('web')->user()->branch_id;
        $creating_branch            = getBranchByBranchId_HH($creating_branch_id);
        $creating_branch_parent_id  = $creating_branch->parent_id;
        $creating_branch_type_id    = $creating_branch->branch_type_id;
        $creating_area_id           = $creating_branch->area_id;
        $creating_district_id       = $creating_branch->district_id;
        //10.01.2021

      /*====------======-------======This is not using for hawladar--======-------======----=======*/
        // destination area,branch,district
        $destination_area_id            =  $request->area_id;
        // destination_branch_id , search area_branch table, where area_id
        $destination_branch             =  getDestinationBranchByDestinationAreaId_HH($destination_area_id);
        $destination_branch_id          =  $destination_branch['branch_id'];
        $destination_branch_parent_id   =  $destination_branch['branch_parent_id'];
        $destination_branch_type_id     =  $destination_branch['branch_type_id'];
        $destination_city_id            =  $destination_branch['branch_city_id'];
        if($request->g_c_area_id) // its for inserting general customer table
        {
            $g_destination_branch       =  getDestinationBranchByDestinationAreaId_HH($request->g_c_area_id);
            $g_destination_branch_id    =  $g_destination_branch['branch_id'];
            $gen_customer_district_id   =  getBranchByBranchId_HH($g_destination_branch_id)->district_id;
        }
        $findarea = getAreaByAreaId_HH($destination_area_id);
        $order_status_changing_current_branch_id = NULL;
        if($creating_branch_id == $destination_branch_id)
        {
            $order_status_changing_current_branch_id = $creating_branch_id;
        }
        /*====------======-------======This is not using for hawladar--======-------======----=======*/

        //------------------
        $parcelAmountPayments = parcelAmountPaymentTypeCalculation_HH($request);
        $service_cod_payment_status_id      = $parcelAmountPayments['service_cod_payment_status_id'];
        $service_delivery_payment_status_id = $parcelAmountPayments['service_delivery_payment_status_id'];
        $client_merchant_payable_amount     = $parcelAmountPayments['client_merchant_payable_amount'];
        $collect_amount     = $parcelAmountPayments['collect_amount'];
        //--------------------

        if($request->parcel_owner_type_id == 1)
        {
            $validator = Validator::make($input,[
                'merchant_id' => 'required',
                'merchant_shop_id' => 'required',
                'customer_name' => 'required',
                'customer_phone' => 'required',
                'area_id' => 'required',
                'address' => 'required',
                'weight_id' => 'required',
                'collect_amount' => 'required',
                'charge' => 'required',
                //'description.*' => 'nullable|max:100',
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $findarea = getAreaByAreaId_HH($destination_area_id);
            $findmerchant_branch_id = User::find($request->merchant_id);
            $merchantshop = Merchant_shop::find($request->merchant_shop_id);

            // Start transaction!
            DB::beginTransaction();
            try
            {
                $customer_id = NULL;
                if($customer = getCustomerByCustomerPhone_HH($request->customer_phone))
                {
                    $customer_id = $customer?$customer->id:NULL;
                }else{
                    $customerData['customer_name']  = $request->customer_name;
                    $customerData['customer_phone'] = $request->customer_phone;
                    $customerData['area_id']        = $request->area_id;
                    $customerData['district_id']    = $findarea->district_id;
                    $customerData['branch_id']      = $destination_branch_id;
                    $customerData['address']        = $request->address;
                    $customer = insertCustomer_HH($customerData);
                    $customer_id = $customer?$customer->id:NULL;
                }

                $checkordercount    = Order::count();
                $checkorder         = Order::orderBy('id','DESC')->first();

                $order = New Order();
                if($checkordercount>0){
                    $order->invoice_no           =  $checkorder->invoice_no+1;
                }
                else{
                    $order->invoice_no           =  202100001;
                }

                $order->merchant_invoice        = $request->merchant_invoice;
                $order->parcel_owner_type_id    = $request->parcel_owner_type_id;
                $order->merchant_id             = $request->merchant_id;
                $order->merchant_shop_id        = $request->merchant_shop_id;
                $order->creating_branch_id      = $creating_branch_id;

                $order->creating_branch_type_id = $creating_branch_type_id;
                $order->creating_area_id        = $creating_area_id;
                $order->weight_id               = $request->weight_id;
                $order->collect_amount          = $collect_amount;

                $order->delivery_charge_type_id         = 1;  //delivey_charge_typies 1=include 2.exclude
                $order->parcel_amount_payment_type_id   = $request->parcel_amount_payment_type_id; //
                $order->service_charge_setting_id       = $request->service_charge_setting_id;
                $order->service_charge                  = $request->charge;
                $order->cod_charge                      = $request->cod_charge?$request->cod_charge:0.0;
                $order->others_charge                   = 0;
                $order->service_cod_payment_status_id      = $service_cod_payment_status_id;

                $order->service_delivery_payment_status_id = $service_delivery_payment_status_id;

                $order->product_amount                     = $request->product_amount;
                $order->client_merchant_payable_amount     = $client_merchant_payable_amount;

                $order->parcel_category_id      = $request->parcel_category_id;
                $order->service_type_id         = $request->service_type_id;
                $order->parcel_type_id          = $parcel_type_id;
                $order->customer_id             = $customer_id;
                $order->destination_branch_id   = $destination_branch_id;
                $order->destination_city_id     = $destination_city_id;
                $order->destination_area_id     = $request->area_id;
                $order->order_status_id         = 2;
                $order->order_status_changing_current_branch_id = $order_status_changing_current_branch_id;
                $order->partial                 = 0;
                $order->parcel_quantity         = 1;
                $order->status                  = 2;
                $order->is_active               = 1;
                $order->is_verified             = 1;
                $order->save();

                if($request->parcel_description){
                    $order_description = New Order_description();
                    $order_description->order_id  = $order->id;
                    $order_description->branch_id = $creating_branch_id;
                    $order_description->parcel_description = $request->parcel_description;
                    $order_description->status = 1;
                    $order_description->save();
                }

                //order Processing History; order_processing_histories
                $setData['order_id']            = $order->id;
                $setData['order_status_id']     = 2;
                $setData['branch_id']           = $creating_branch_id;
                $setData['created_by']          = Auth::guard('web')->user()->id;
                $setData['status_changer_id']   = Auth::guard('web')->user()->id;;
                $setData['status']              = 1;
                $setData['changed_branch_id']   = NULL;
                insertOrderProcessingHistory_HH($setData);


                /*---====---- Auto manpower Assign when order Creating---========----*/
                $created_by         = Auth::guard('web')->user()->id;
                autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 1,$manpower_type_id=1,$created_by);
                autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 2,$manpower_type_id=2,$created_by);
                /*---====---- Auto manpower Assign when order Creating---========----*/


                /*Order Branch Commission Amount insert*/
                insertingBranchCommission_HH($order,$myBranchId=Auth::guard('web')->user()->branch_id);
                /*Order Branch Commission Amount insert*/

                /*Order Amount Receive amount*/
                if($request->payment_status_id == 2)//paid
                {
                    $this->insertOrderPaymentReceivingHistoryTable($order);
                }
                /*Order Amount Receive amount*/

                // destination branch is
                if($creating_branch_id != $destination_branch_id)
                {
                    if($creating_branch_id != $creating_branch_parent_id)
                    {
                        //insert here by parent id
                        $this->insertingOrderDestinationTable($order->id,$creating_branch_parent_id,$creating_branch_type_id);
                    }
                    if(($destination_branch_id != $destination_branch_parent_id) &&
                        ($destination_branch_parent_id != $creating_branch_parent_id)
                    )
                    {//insert here by parent id
                        $this->insertingOrderDestinationTable($order->id,$destination_branch_parent_id,$destination_branch_type_id);
                    }
                    //insert here by destination parent id
                    $this->insertingOrderDestinationTable($order->id,$destination_branch_id,$destination_branch_type_id);
                }

                $notification = array(
                        'message' => 'New Parcel Entry Successfully Submitted!',
                        'alert-type' => 'success'
                    );

                DB::commit();
                return redirect()->back()->with($notification);

            }
            catch(\Exception $e)
            {
                DB::rollback();
                if($e->getMessage())
                {
                    $message = "Something went wrong! Please Try again";
                }
                return Redirect()->back()
                    ->with('error',$message);
            }

        }//end if for merchant
        //=================================================================================================
        // for general customer
        else{
                $validator = Validator::make($input,[
                    'name' => 'required',
                    'phone' => 'required',
                    //'g_c_address' => 'required',
                    'charge' => 'required',
                    //'description.*' => 'nullable|max:100',
                ]);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                // Start transaction!
                DB::beginTransaction();
                try
                {
                    //=================General Customer======================
                  $g_customer_id = NULL;
                  if($gCustomer = getGeneralCustomerByGeneralCustomerPhone_HH($request->phone))
                  {
                      $g_customer_id = $gCustomer?$gCustomer->id:NULL;
                  }else{
                      $gcustomerData['name']            = $request->name;
                      $gcustomerData['phone']           = $request->phone;
                      $gcustomerData['area_id']         = $creating_area_id;
                      $gcustomerData['district_id']     = $creating_district_id;
                      $gcustomerData['branch_id']       = $creating_branch_id;
                      $gcustomerData['address']         = "";//$request->g_c_address;
                      $customerG = insertGeneralCustomerAsMerchant_HH($gcustomerData);
                      $g_customer_id = $customerG?$customerG->id:NULL;
                  }
                   // Sending customerss
                  //=================General Customer======================


                // receiving customerss
                $customer_id = NULL;
                if($customer = getCustomerByCustomerPhone_HH($request->customer_phone))
                {
                    $customer_id = $customer?$customer->id:NULL;
                }else{
                    $customerData['customer_name']  = $request->customer_name;
                    $customerData['customer_phone'] = $request->customer_phone;
                    $customerData['area_id']        = $request->area_id;
                    $customerData['district_id']    = $findarea->district_id;
                    $customerData['branch_id']      = $destination_branch_id;
                    $customerData['address']        = $request->address;
                    $customer = insertCustomer_HH($customerData);
                    $customer_id = $customer?$customer->id:NULL;
                }
                //===============customer===============


                $checkordercount    = Order::count();
                $checkorder         = Order::orderBy('id','DESC')->first();

                $order = New Order();
                if($checkordercount>0){
                    $order->invoice_no           =  $checkorder->invoice_no+1;
                }
                else{
                    $order->invoice_no           =  202100001;
                }
                $order->merchant_invoice        = $request->merchant_invoice;
                $order->parcel_owner_type_id    = $request->parcel_owner_type_id;
                $order->general_customer_id    =  $g_customer_id;
                $order->creating_branch_id      = $creating_branch_id;
                $order->creating_branch_type_id = $creating_branch_type_id;
                $order->creating_area_id        = $creating_area_id;
                $order->weight_id               = $request->weight_id;
                $order->collect_amount          = $collect_amount;

                //$order->delivery_charge_type_id = 1;  //delivey_charge_typies 1=include 2.exclude
                $order->parcel_amount_payment_type_id = $request->parcel_amount_payment_type_id; //
                //$order->service_charge_setting_id = $request->service_charge_setting_id;
                $order->service_charge          = $request->charge;
                $order->cod_charge              = $request->cod_charge?$request->cod_charge:0.0;
                $order->others_charge           = 0;

                $order->service_cod_payment_status_id      = $service_cod_payment_status_id;
                $order->service_delivery_payment_status_id = $service_delivery_payment_status_id;

                 // 1 == service charge , 2 = service  & cod  charge , 3 == cod charge  instant_all_charge_received_status_id
                if($service_cod_payment_status_id && $service_delivery_payment_status_id)
                {
                    $order->instant_all_charge_received_status_id = 2;
                }
                else if($service_delivery_payment_status_id && $service_cod_payment_status_id == NULL)
                {
                    $order->instant_all_charge_received_status_id = 1;
                }
                else if($service_cod_payment_status_id && $service_delivery_payment_status_id == NULL)
                {
                    $order->instant_all_charge_received_status_id = 3;
                }

                $order->product_amount          = $request->product_amount;
                $order->client_merchant_payable_amount = $client_merchant_payable_amount;

                $order->parcel_category_id      = $request->parcel_category_id;
                $order->service_type_id         = $request->service_type_id;
                $order->parcel_type_id          = $parcel_type_id;
                $order->customer_id             = $customer_id;
                $order->destination_branch_id   = $destination_branch_id;
                $order->destination_city_id     = $destination_city_id;
                $order->destination_area_id     = $request->area_id;
                $order->order_status_id         = 5;
                $order->order_status_changing_current_branch_id = $order_status_changing_current_branch_id;
                $order->partial                 = 0;
                $order->parcel_quantity         = 1;
                $order->status                  = 2;
                $order->is_active               = 1 ;
                $order->is_verified             = 1 ;
                $order->save();

                if($request->parcel_description){
                    $order_description = New Order_description();
                    $order_description->order_id  = $order->id;
                    $order_description->branch_id = $creating_branch_id;
                    $order_description->parcel_description = $request->parcel_description;
                    $order_description->status = 1;
                    $order_description->save();
                }


                //order Processing History; order_processing_histories
                $setData['order_id']            = $order->id;
                $setData['order_status_id']     = 5;
                $setData['branch_id']           = $creating_branch_id;
                $setData['created_by']          = Auth::guard('web')->user()->id;
                $setData['status_changer_id']   = Auth::guard('web')->user()->id;;
                $setData['status']              = 1;
                $setData['changed_branch_id']   = NULL;
                insertOrderProcessingHistory_HH($setData);

                /*---====---- Auto manpower Assign when order Creating---========----*/
                $created_by         = Auth::guard('web')->user()->id;
                if($order->order_status_id != 5)
                {
                    autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 1,$manpower_type_id=1,$created_by);
                }
                autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 2,$manpower_type_id=2,$created_by);
                /*---====---- Auto manpower Assign when order Creating---========----*/


                /*Order Branch Commission Amount insert*/ 
                insertingBranchCommission_HH($order,$myBranchId=Auth::guard('web')->user()->branch_id);
                /*Order Branch Commission Amount insert*/

                /*Order Amount Receive amount*/
                if($request->payment_status_id == 2)//paid
                {
                    $this->insertOrderPaymentReceivingHistoryTable($order);
                }
                /*Order Amount Receive amount*/

                // destination branch is
                if($creating_branch_id != $destination_branch_id)
                {
                    if($creating_branch_id != $creating_branch_parent_id)
                    {
                        //insert here by parent id
                        $this->insertingOrderDestinationTable($order->id,$creating_branch_parent_id,$creating_branch_type_id);
                    }
                    if(($destination_branch_id != $destination_branch_parent_id) &&
                        ($destination_branch_parent_id != $creating_branch_parent_id)
                    )
                    {//insert here by parent id
                        $this->insertingOrderDestinationTable($order->id,$destination_branch_parent_id,$destination_branch_type_id);
                    }
                    //insert here by destination parent id
                    $this->insertingOrderDestinationTable($order->id,$destination_branch_id,$destination_branch_type_id);
                }


                 //===sms permission and setting===
                 if(smsToCustomerWhenParcelBookedFromMerchantActivateStatus_HS())
                 {
                     //Sending SMS
                     $note = "when parcel receive office";
                     insertSmsWhenOrderProcessing_HH($order->id,"smsToCustomerWhenParcelBookedFromMerchant_HH","customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id",$note);
                 }
                 //===sms permission and setting===

                $notification = array(
                        'message' => 'New Parcel Entry Successfully Submitted!',
                        'alert-type' => 'success'
                    );

                DB::commit();

                //
                return redirect()->route('agent.order.success',$order->invoice_no)->with($notification);

            }
            catch(\Exception $e)
            {
                DB::rollback();
                if($e->getMessage())
                {
                    $message = $e->getMessage();//"Something went wrong! Please Try again";
                }
                return Redirect()->back()
                    ->with('error',$message);
            }
        }

    }



    //$this->insertOrderPaymentReceivingHistoryTable($order_id);
    /*Order Receive Amount History*/
    public function insertOrderPaymentReceivingHistoryTable($order_id)
    {
        $cod_charge     = $order_id->cod_charge;
        $service_charge = $order_id->service_charge;
        $client_merchant_payable_amount = $order_id->client_merchant_payable_amount;
        $created_by     = Auth::guard('web')->user()->id;
        if($order_id->parcel_amount_payment_type_id == 1)
        {
            $this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 2)//noting paid
        {
            //$this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$created_by);
            //$this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$created_by);
            //$this->OrderPaymentReceivingHistory($order_id,4 ,$product_amount,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 3)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$created_by);
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 4)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 5)
        {
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 6) //nothing paid
        {
            //$this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$created_by);
            //$this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$created_by);
        }
        else if($order_id->parcel_amount_payment_type_id == 7)//nothing paid
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$created_by);
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$created_by);
        }
        return true;
    }

    public function OrderPaymentReceivingHistory($order_id,$receive_amount_type_id ,$amount,$created_by)
    {
        $branch_type_id = getBranchTypeByBranchTypeID_HH($branch_type_id = 1);
        $parcel_amount_payment_status_id =  NULL;
        $service_delivery_payment_status_id = NULL;
        $service_cod_payment_status_id = NULL;
        if($receive_amount_type_id == 1)
        {
            $service_delivery_payment_status_id = 1;
        }
        else if($receive_amount_type_id == 2)
        {
            $service_cod_payment_status_id = 1;
        }
        else if($receive_amount_type_id == 4)
        {
            if($order_id->creating_branch_id == $branch_type_id->id &&
                $order_id->destination_branch_id == $branch_type_id->id
            )//$branch_type_id->id == head offfice
            {
                $parcel_amount_payment_status_id = 8; //Branch received Amount And Preparing
            }
            else if($order_id->destination_branch_id == $branch_type_id->id &&
                $order_id->creating_branch_id != $branch_type_id->id
            )
            {
                $parcel_amount_payment_status_id = 5;//8
            }else{
                 //Branch received from delivery man
                 $parcel_amount_payment_status_id = 3;
            }
        }

        $branch_id = Auth::guard('web')->user()->branch_id;
        $owner = $order_id->parcel_owner_type_id;
        if($owner == 1)
        {
            $customer_id = $order_id->merchant_id;
        }else{
            $customer_id = $order_id->general_customer_id;
        }
        $orderProcessing =  new ReceiveAmountHistory();
        $orderProcessing->order_id                          = $order_id->id;
        $orderProcessing->parcel_owner_type_id              = $order_id->parcel_owner_type_id;
        $orderProcessing->receive_amount_type_id            = $receive_amount_type_id;
        $orderProcessing->received_by                       = $created_by;
        $orderProcessing->amount                            = $amount;
        $orderProcessing->received_from                     = $customer_id;
        $orderProcessing->received_from_user_role_id        = $owner == 1?getUserByUserIdFromUserTable_HH($customer_id)->role_id:NULL;//?getUserByUserIdFromUserTable_HH($created_by)->role_id:NULL
        $orderProcessing->creating_branch_id                = $order_id->creating_branch_id;
        $orderProcessing->received_amount_branch_id         = $branch_id;
        $orderProcessing->creating_branch_type_id           = $order_id->creating_branch_type_id;
        $orderProcessing->destination_branch_id             = $order_id->destination_branch_id;
        $orderProcessing->received_branch_type_id           = getBranchByBranchId_HH($branch_id)?getBranchByBranchId_HH($branch_id)->branch_type_id:NULL;

        $orderProcessing->parcel_amount_payment_status_id    = $parcel_amount_payment_status_id;
        $orderProcessing->service_cod_payment_status_id      = $service_cod_payment_status_id;
        $orderProcessing->service_delivery_payment_status_id = $service_delivery_payment_status_id;
        $orderProcessing->created_by                         = $created_by;
        $orderProcessing->save();
        return $orderProcessing;
    }
    /*Order Receive Amount History*/




    public function insertingOrderDestinationTable($order_id,$branch_id,$branch_type_id)
    {
        $order_dest = new Order_destination();
        $order_dest->order_id = $order_id;
        $order_dest->branch_id = $branch_id;
        $order_dest->branch_type_id = $branch_type_id;
        ///$order_dest->charge = $charge;
        $order_dest->order_receiving_sending_status_id = 1;
        $order_dest->save();
        return $order_dest;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] = Order::find($id);
        return view('backend.order.agent.order.show',$data);
    }

    public function showSingleViewByAjax(Request $request)
    {
        $id = $request->id;
        $data['order'] = Order::find($id);
        return view('backend.order.agent.order_ajax_view.show',$data);
    }





    public function ordersuccess(Request $request,$id)
    {
        $data['order'] = Order::where('invoice_no',$id)->first();
        return view('backend.order.agent.order.success',$data);
    }


    /**Print Customer Copy */
    public function successInvoicePrintCustomerCopyByAjaxPrintJs(Request $request)
    {
        $invoice_no =  $request->invoice_no;
        $data['order'] = Order::where('invoice_no',$invoice_no)->first();

        $data['setting'] = Setting::find(1);
        return view('backend.order.agent.order.print.parcelinvoice',$data);
    }
    /**Print Customer Copy */

    /**Print Slip */
    public function successInvoicePrintSlipByAjaxPrintJs(Request $request)
    {
        $invoice_no =  $request->invoice_no;
        $data['order'] = Order::where('invoice_no',$invoice_no)->first();

        $data['setting'] = Setting::find(1);
        return view('backend.order.agent.order.print.label',$data);
    }
    /**Print Slip */


    /**Multiple Print Slip */
    public function multipleSlipOfInvoicePrint(Request $request)
    {

        $input = $request->all();
        $allorder = [];
        if($input['ids'] != ''){
            foreach ($input['ids'] as $key => $value) {
                array_push($allorder, $input['ids'][$key]);

            }
        }
        
        $data['setting'] = Setting::find(1);
        $data['orders'] = Order::whereIn('id',$allorder)->get();
        return view('backend.order.agent.order.print.multiple_print.label',$data);

       
    }
    /**Multiple Print Slip */






    public function showinvoice($id)
    {
        $data['order'] = Order::where('invoice_no',$id)->first();
        return view('backend.order.agent.order.invoices.invoice',$data);
    }

    public function paymentinvoice()
    {
        return view('backend.agent.invoices.view');
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
        return $id;
    }


    public function printinvoice($id)
    {
        $data['order'] = Order::find($id);
        $data['setting'] = Setting::find(1);
        return view('backend.order.agent.order.parcelinvoice',$data);

    }












}
