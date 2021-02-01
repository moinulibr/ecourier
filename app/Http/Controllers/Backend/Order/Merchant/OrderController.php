<?php

namespace App\Http\Controllers\Backend\Order\Merchant;

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
use App\Model\Backend\Admin\Parcel\ParcelAmountPaymentType;
use App\Model\Backend\Admin\Parcel\Parcel_type;
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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoice;
use App\Model\Backend\PaymentInvoice\BranchPayToMerchantClientInvoiceDetail;
use PDF;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $query = Order::query();

        if($request->invoice_no){
            $data['invoice_no'] = $request->invoice_no;
            $query = $query->where('invoice_no',$request->invoice_no);
        }

        if($request->merchant_invoice){
            $data['merchant_invoice'] = $request->merchant_invoice;
            $query = $query->where('merchant_invoice',$request->merchant_invoice);
        }
        
        if($request->customer_phone){
            $data['customer_phone'] = $request->customer_phone;
            $customer = Customer::where('customer_phone',$request->customer_phone)->first();
            $query = $query->where('customer_id',$customer->id);
        }



        if($request->date_from && $request->date_to)
        {

            $date_from  = date_create($request->date_from." 00:00:00");
            $date_to    = date_create($request->date_to." 23:59:59");

            $ds = date_format($date_from, "Y/m/d H:i:s");
            $de = date_format($date_to, "Y/m/d H:i:s");
            if($request->order_date_search == 1)
            {
                $query = $query->whereBetween('created_at',[$ds,$de]);                                                
            }
            elseif($request->order_date_search == 2)
            {
                $query = $query->whereBetween('updated_at',[$ds,$de]);                
            }
             
        }

 
        $data['orders'] =$query->OrderBy('id','DESC')->where('merchant_id',Auth::guard('merchant')->user()->id)->get();


         return view('backend.order.merchant.order.allorder',$data);
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
        $data['parcelcategories'] = Parcel_category::all();
        $data['parcel_typies'] = Parcel_type::all();
        $data['weights'] = Weight::all();
        $data['merchants'] = User::where('role_id',4)->get();
        $data['districts'] = District::all();
        $data['service_typies'] = Service_type::all();
        $data['merchant_shopes'] = Merchant_shop::where('merchant_id',Auth::guard('merchant')->user()->id)->get();
        //$data['merchant_shop_id'] = getActiveMerchantShopByMerchantId_HH(Auth::guard('merchant')->user()->id)?getActiveMerchantShopByMerchantId_HH(Auth::guard('merchant')->user()->id)->id:NULL;
        return view('backend.order.merchant.order.new_order',$data);
    }



    public function ifOrderExisting(Request $request)
    {  
        return view('backend.order.merchant.order.ajax.delivery_charge.default_charge');
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
        return view('backend.order.merchant.order.ajax.delivery_charge.calculation_charge',$data);

        /* 
            $merchant_id = $request->merchantId;
            $merchant_shop_id = $request->merchantShopId;
            $weight_id = $request->weightId;
            $customer_area_id = $request->areaId;
            $parcel_category_id = $request->parcelCategoryId;
            $parcel_type_id = $request->parcelTypeId;
            $service_type_id = $request->serviceTypeId;
            $collect_amount = $request->collectAmount;

            $merchant_shop = getMerchantShopByMerchantId_HH($merchant_id,$merchant_shop_id);
            $merchant_pickup_area_id =  $merchant_shop?$merchant_shop->pickup_area_id:NULL;
            $data['merchant_pickup_area_id'] = $merchant_pickup_area_id;
        
            $customerSingleAreaDetail       = getAreaByAreaId_HH($customer_area_id);
            $merchantSingleAreaDetail       = getAreaByAreaId_HH($merchant_pickup_area_id);

            $customer_district_id           = $customerSingleAreaDetail?$customerSingleAreaDetail->district_id:NULL;
            $merchant_district_id           = $merchantSingleAreaDetail?$merchantSingleAreaDetail->district_id:NULL;
            $data['merchant_district_id']   = $merchant_district_id;
            $data['customer_district_id']   = $customer_district_id;
            $data['merchant_branch_id']     = getMerchantByMerchantId_HH($merchant_id)?getMerchantByMerchantId_HH($merchant_id)->branch_id:1;

            $merchantdistrictservicecitytype =  $merchantSingleAreaDetail?$merchantSingleAreaDetail->service_city_type_id:"NULL";

                //========================================================================
                if($customer_area_id == NULL)
                {
                    $merchant_district_service_city_type = 1;
                }
                else if($merchant_district_id == $customer_district_id)
                {
                    $merchant_district_service_city_type = $merchantdistrictservicecitytype;
                }
                else{
                    $merchant_district_service_city_type = 3;
                }
                //====================================================================
            
                $query = Service_charge_setting::query();
                    $query->where('service_type_id',$service_type_id);
                    $query->where('parcel_category_id',$parcel_category_id);
                    $query->where('parcel_type_id',$parcel_type_id);
                    $query->where('weight_id',$weight_id);
                if($merchant_district_service_city_type)
                {
                    $query->where('service_city_type_id',$merchant_district_service_city_type);
                }
                
            $service_charge = $query->first();
            $data['charge'] =  deliveryChargeCalculationAmountForEachMerchant_HH($merchant_id,$merchant_district_service_city_type=1,$service_charge?$service_charge->charge:00.00);
            $data['collect_amount'] =   $collect_amount;
            $data['service_charge_setting_id'] =   $service_charge?$service_charge->id:NULL;

            $data['cod_charge'] =   codChargeCalculationAmountForEachMerchant_HH($merchant_id,$merchant_district_service_city_type=1,$collect_amount);
        
            $data['total_payable_amount'] =   $collect_amount - ($data['cod_charge'] + $data['charge']);

            return view('backend.order.merchant.order.ajax.delivery_charge.calculation_charge',$data);
        */
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
        
        //------------------
        $parcelAmountPayments = parcelAmountPaymentTypeCalculation_HH($request);
        $service_cod_payment_status_id      = $parcelAmountPayments['service_cod_payment_status_id'];
        $service_delivery_payment_status_id = $parcelAmountPayments['service_delivery_payment_status_id'];
        $client_merchant_payable_amount     = $parcelAmountPayments['client_merchant_payable_amount'];
        $collect_amount     = $parcelAmountPayments['collect_amount'];

        
        $parcel_type_id             = $request->parcel_type_id;
        $creating_branch_id         = Auth::guard('merchant')->user()->branch_id;
        $creating_branch            = getBranchByBranchId_HH($creating_branch_id);
        $creating_branch_parent_id  = $creating_branch->parent_id;
        $creating_branch_type_id    = $creating_branch->branch_type_id;
        $creating_area_id           = $creating_branch->area_id;
        
        // destination area,branch,district
        $destination_area_id    =  $request->area_id;
        // destination_branch_id , search area_branch table, where area_id
        $destination_branch             =  getDestinationBranchByDestinationAreaId_HH($destination_area_id);
        $destination_branch_id          =  $destination_branch['branch_id'];  
        $destination_branch_parent_id   =  $destination_branch['branch_parent_id'];  
        $destination_branch_type_id     =  $destination_branch['branch_type_id']; 
        $destination_city_id            =  $destination_branch['branch_city_id'];
         //10.01.2021
        //$findarea = getAreaByAreaId_HH($destination_area_id);

        $order_status_changing_current_branch_id = NULL;
        if($creating_branch_id == $destination_branch_id)
        {
            $order_status_changing_current_branch_id = $creating_branch_id;
        }

        /*return $creating_area_id;*/
        $gen_customer_district_id    =  43;

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
            $order->parcel_owner_type_id    = 1;
            $order->merchant_id             = $request->merchant_id;
            $order->merchant_shop_id        = $request->merchant_shop_id;
            
            $order->creating_branch_id      = $creating_branch_id;
            $order->creating_branch_type_id = $creating_branch_type_id;
            
            $order->creating_area_id        = $creating_area_id;
            $order->weight_id               = $request->weight_id;
            $order->collect_amount          = $request->collect_amount?$request->collect_amount:0.0;

            $order->delivery_charge_type_id = 1;  //delivey_charge_typies 1=include 2.exclude
            $order->parcel_amount_payment_type_id = 2; //
            $order->service_charge_setting_id = $request->service_charge_setting_id;
            $order->service_charge          = $request->charge;
            $order->cod_charge              = $request->cod_charge?$request->cod_charge:0.0;
            $order->others_charge           = 0;


            $order->product_amount          = $request->product_amount;
            $order->client_merchant_payable_amount = $client_merchant_payable_amount;

            $order->parcel_category_id      = $request->parcel_category_id;
            $order->service_type_id         = $request->service_type_id;
            $order->parcel_type_id          = $parcel_type_id;
            $order->customer_id             = $customer_id;
            $order->destination_branch_id   = $destination_branch_id;
            $order->destination_city_id     = $destination_branch_type_id;
            $order->destination_area_id     = $request->area_id;
            $order->order_status_id         = 1;
            $order->order_status_changing_current_branch_id = $order_status_changing_current_branch_id;
            $order->partial                 = 0;
            $order->parcel_quantity         = 1;
            $order->status                  = 1;
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
                $setData = [];
                
                $setData['order_id']            = $order->id;
                $setData['order_status_id']     = 1;
                $setData['branch_id']           = $creating_branch_id;
                $setData['created_by']          = Auth::guard('merchant')->user()->id;
                $setData['status_changer_id']   = Auth::guard('merchant')->user()->id;
                $setData['status']              = 1;
                $setData['changed_branch_id']   = NULL;
                insertOrderProcessingHistory_HH($setData);

                /*---====---- Auto manpower Assign when order Creating---========----*/
                $created_by         = Auth::guard('merchant')->user()->id;
                autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 1,$manpower_type_id=1,$created_by);
                autoManpowerAssigningWhenOrderCreating_HH($order,$processing_type_id = 2,$manpower_type_id=2,$created_by);
                /*---====---- Auto manpower Assign when order Creating---========----*/

                
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


            $qrdata = [
                    "order_id" => $order->invoice_no,
            ];

            $path = "public/qrcodes/qr_".$order->invoice_no.".svg";
            QrCode::size(150)->generate(($order->invoice_no),$path);
           

            $notification = array(
                    'message' => 'New Parcel Entry Successfully Submitted!',
                    'alert-type' => 'success'
                );

            DB::commit();

            Session::flash('success','You are successfully Parcel booking Placed');
            return redirect()->route('merchant.order.success',$order->invoice_no);

           // return redirect()->back()->with('success',"New Parcel Entry Successfully Submitted!");
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





    public function insertingOrderDestinationTable($order_id,$branch_id,$branch_type_id)
    {
        $order_dest = new Order_destination();
        $order_dest->order_id = $order_id;
        $order_dest->branch_id = $branch_id;
        $order_dest->branch_type_id = $branch_type_id;
        //$order_dest->charge = $charge;
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
        //
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
        //
    }


    public function ordersuccess(Request $request,$id)
    {
        $data['order'] = Order::where('invoice_no',$id)->first();
        return view('backend.order.merchant.order.success',$data);
    }




    public function showinvoice($id)
    {
        $data['order'] = Order::where('invoice_no',$id)->first();
        return view('backend.order.merchant.order.invoices.invoice',$data);
    }





  

    public function paymentinvoice()
    {
        $myAuthId = Auth::guard('merchant')->user()->id;
        $data['invoices'] = BranchPayToMerchantClientInvoice::where('parcel_owner_type_id',1)
                                        ->where('pay_to_merchant_client_id',$myAuthId)
                                        ->latest()
                                        ->get();
        /* $data['invoiceDetails'] = BranchPayToMerchantClientInvoiceDetail::where('parcel_owner_type_id',1)
                                    ->where('pay_to_merchant_client_id',$myAuthId)
                                    ->latest()
                                    ->get(); */
       return view('backend.merchant.invoices.view',$data);
    }



    public function paymentinvoiceDetails($id)
    {
        $myAuthId = Auth::guard('merchant')->user()->id;
        $data['invoices'] = BranchPayToMerchantClientInvoiceDetail::where('branch_pay_to_merchant_client_invoice_id',$id)
                                        ->where('pay_to_merchant_client_id',$myAuthId)
                                        ->latest()
                                        ->get();
       $pdf =  PDF::loadView('backend.merchant.invoices.invoice_print',$data);
       //$p = $pdf->stream();
       return $pdf->download('invoice.pdf');
    }




    public function showSingleViewByAjax(Request $request)
    {
        $id = $request->id;
        $data['order'] = Order::find($id);
        return view('backend.order.merchant.order_ajax_view.show',$data);
    }



    
}
