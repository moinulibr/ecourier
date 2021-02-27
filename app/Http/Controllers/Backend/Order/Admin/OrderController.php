<?php

namespace App\Http\Controllers\Backend\Order\Admin;

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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
        $data['orders'] = Order::latest()->get();
         return view('backend.order.admin.order.allorder',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       /*  $processing_type_id = 2;
        $order_id = 8;
        return sendingOrderProcessingSmsWhichIsNotDelivered_HH($order_id,$processing_type_id = 2); */
        //return getOrderInvoiceInformationDetailByOrderId(8);
        $data['parcelcategories'] = Parcel_category::all();
        $data['parcel_typies'] = Parcel_type::all();
        $data['weights'] = Weight::all();
        $data['merchants'] = User::where('role_id',4)->get();
        $data['districts'] = District::all();
        $data['service_typies'] = Service_type::all();
        $data['parcelAmountPaymentTypies'] = ParcelAmountPaymentType::all();

        return view('backend.order.admin.order.new_order',$data);
    }



    public function ifOrderExisting()
    {
        return view('backend.order.admin.order.ajax.delivery_charge.default_charge');
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
        return view('backend.order.admin.order.ajax.delivery_charge.calculation_charge',$data); 
        
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
        
        $parcelAmountPayments = parcelAmountPaymentTypeCalculation_HH($request);
        $service_cod_payment_status_id      = $parcelAmountPayments['service_cod_payment_status_id'];
        $service_delivery_payment_status_id = $parcelAmountPayments['service_delivery_payment_status_id'];
        $client_merchant_payable_amount     = $parcelAmountPayments['client_merchant_payable_amount'];
        $collect_amount     = $parcelAmountPayments['collect_amount'];

        
        $parcel_category_id         = $request->parcel_category_id;
        $service_type_id            = $request->service_type_id;
        $parcel_type_id             = $request->parcel_type_id;
        $creating_branch_id         = Auth::guard('web')->user()->branch_id;
        $creating_branch            = getBranchByBranchId_HH($creating_branch_id);
        $creating_branch_parent_id  = $creating_branch->parent_id;
        $creating_branch_type_id    = $creating_branch->branch_type_id;
        $creating_area_id           = $creating_branch->area_id;
        
        
        // destination area,branch,district
        $destination_area_id            =  $request->area_id;
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
            $order->collect_amount          = $request->collect_amount?$request->collect_amount:0;

            $order->delivery_charge_type_id = 1;  //delivey_charge_typies 1=include 2.exclude
            $order->parcel_amount_payment_type_id = 2; //
            $order->service_charge_setting_id   = $request->service_charge_setting_id;
            $order->service_charge              = $request->charge?$request->charge:0;
            $order->cod_charge                  = $request->cod_charge?$request->cod_charge:0;
            $order->others_charge               = 0;

            $order->product_amount      = $request->product_amount;
            $order->client_merchant_payable_amount = $client_merchant_payable_amount;

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
            $setData['order_status_id']     = 2;
            $setData['branch_id']           = $creating_branch_id;
            $setData['created_by']          = Auth::guard('web')->user()->id;
            $setData['status_changer_id']   = Auth::guard('web')->user()->id;;
            $setData['status']              = 1;
            $setData['changed_branch_id']   = NULL;
            insertOrderProcessingHistory_HH($setData);
            

            /*Order Branch Commission Amount insert*/
            insertingBranchCommission_HH($order,$myBranchId=Auth::guard('web')->user()->branch_id);
            /*Order Branch Commission Amount insert*/


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

            
            /*  //===sms permission and setting===
             if(smsToCustomerWhenParcelBookedFromMerchantActivateStatus_HS())
             {
                 //Sending SMS
                 $note = "when parcel receive office";
                 insertSmsWhenOrderProcessing_HH($order->id,"smsToCustomerWhenParcelBookedFromMerchant_HH","customer_name,invoice_no,company_name,collect_amount,delivery_charge_type_id",$note);
             }
             //===sms permission and setting=== */

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
            return redirect()->back()->with($notification);

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
    

    //not using this yet now.. but it will be used latter...
    //$this->insertOrderPaymentReceivingHistoryTable($order_id,$manpower_id);
    /*Order Receive Amount History*/
    public function insertOrderPaymentReceivingHistoryTable($order_id,$manpower_id)
    {
        $cod_charge     = $order_id->cod_charge;
        $service_charge = $order_id->service_charge;
        $client_merchant_payable_amount = $order_id->client_merchant_payable_amount;

        if($order_id->parcel_amount_payment_type_id == 1)
        {
            $this->OrderPaymentReceivingHistory($order_id,1,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 2)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 3)
        {
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 4)
        {
            $this->OrderPaymentReceivingHistory($order_id,2 ,$cod_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,4 ,$client_merchant_payable_amount,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 5)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 6)
        {
            $this->OrderPaymentReceivingHistory($order_id,1 ,$service_charge,$manpower_id);
            $this->OrderPaymentReceivingHistory($order_id,2,$cod_charge,$manpower_id);
        }
        else if($order_id->parcel_amount_payment_type_id == 7)
        {
            //$this->OrderPaymentReceivingHistory($order_id, 1,0,$manpower_id);
        }
        return true;
    }

    
    public function OrderPaymentReceivingHistory($order_id,$receive_amount_type_id,$amount,$manpower_id)
    {
        $branch_id = Auth::guard('web')->user()->branch_id;
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


        $orderProcessing =  new ReceiveAmountHistory();
        $orderProcessing->order_id                          = $order_id->id;
        $orderProcessing->parcel_owner_type_id              = $order_id->parcel_owner_type_id;
        $orderProcessing->receive_amount_type_id            = $receive_amount_type_id;
        $orderProcessing->received_by                       = Auth::guard('web')->user()->id;
        $orderProcessing->amount                            = $amount;
        $orderProcessing->received_from                     = $manpower_id;
        $orderProcessing->received_from_user_role_id        = getManpowerByManpowerId_HH($manpower_id)?getManpowerByManpowerId_HH($manpower_id)->role_id:NULL;
        $orderProcessing->creating_branch_id                = $order_id->creating_branch_id;
        $orderProcessing->received_amount_branch_id         = $branch_id;
        $orderProcessing->creating_branch_type_id           = $order_id->creating_branch_type_id;
        $orderProcessing->destination_branch_id             = $order_id->destination_branch_id;
        $orderProcessing->received_branch_type_id           = getBranchByBranchId_HH($branch_id)?getBranchByBranchId_HH($branch_id)->branch_type_id:NULL;
        
        $orderProcessing->service_cod_payment_status_id      = $service_cod_payment_status_id;
        $orderProcessing->service_delivery_payment_status_id = $service_delivery_payment_status_id;
        $orderProcessing->parcel_amount_payment_status_id    = $parcel_amount_payment_status_id;
        $orderProcessing->created_by                         = Auth::guard('web')->user()->id;
        $orderProcessing->save();
        return $orderProcessing;
    }
    /*Order Receive Amount History*/
    //not using this yet now.. but it wi ll be used latter...




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
        $order =  Order::findOrFail($id);
        DB::beginTransaction();
        try
        {   
            insertOrupdateOrderStatusByOrderId_HH($id,$setStatus=3);

            $order->orderProcessingHistories()->delete();
            $order->orderAssigns()->delete();
            $order->branchCommissions()->delete();
            $order->manpowerIncomeHistories()->delete();
            $order->orderDestinations()->delete();
            $order->branchCommissionInvoices()->delete();

            $order->headOfficePayToBranchInvoiceDetails()->delete();
            $order->branchPayToMerchantClientInvoiceDetails()->delete();
            $order->payToHeadofficeInvoiceDetails()->delete();
            $order->orderDescriptions()->delete();

            $order->orderReceiveAmounts()->delete();
            $order->delete();
            DB::commit();
            return redirect()->back()->with('success','Parcel Deleted Successfully');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = $e->getMessage() ;//"Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
        return $order->headOfficePayToBranchInvoiceDetails;
        return $order->orderDescriptions;
        $user = User::find($id);

        
        // delete related   
        //$user->photos()->delete();
        //$user->delete();
    }

    public function showSingleViewByAjax(Request $request)
    {
        $id = $request->id;
        $data['order'] = Order::find($id);
        return view('backend.order.admin.order_ajax_view.show',$data);
    }

    public function printinvoice($id)
    {
        $data['order'] = Order::find($id);
        $data['setting'] = Setting::find(1);
        return view('backend.order.admin.order.parcelinvoice',$data);

    }
   
}
