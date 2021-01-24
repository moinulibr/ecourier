{{-- <tr>
    <th>Cash Collections</th>
    <th>:</th>
    <td>Tk <span id="cash_collection_id">{{$collect_amount}}</span></td>
</tr>
 --}}

 <input type="hidden" value="{{$collect_amount}}" id="collect_amount" />



<tr>
    <th>Delivery Charge</th>
    <th>:</th>
    <td>
        Tk <span id="delivery_charge_id">{{$charge}}</span>
        <input type="hidden" value="{{$charge}}" name="charge" id="deliveryCharge" class="form-control col-md-12 charge" />
      <span id="deliveryChargeErrorMessage" style="color:red;"></span>
    </td>
</tr>
<tr>
    <th>COD Charge</th>
    <th>:</th>
    <td>
        TK <span id="cod_charge_id">{{$cod_charge}}</span>
        <input type="hidden" value="{{$cod_charge}}" name="cod_charge" id="codCharge" class="form-control col-md-12 charge" />
    </td>
</tr>


<tr style="background-color: blanchedalmond,color:brown;">
    <th>Total Charge</th>
    <th>:</th>
    <td>
        TK <span id="total_charge_id">{{$charge + $cod_charge}}</span>
        <input type="hidden" value="{{$charge + $cod_charge}}" name="total_charge" id="totalChargeId" class="totalChargeClass form-control col-md-12" />
    </td>
</tr>

{{-- <tr>
    <th colspan="2">Total Payable Amount </th>
    <th><span>TK <strong id="total_payable_amount_id">{{$total_payable_amount}}</strong> </span></th>
</tr>
 --}}

 <tr>
    <th style="width:70%;" colspan="2"><small>Collectable From Customer</small></th>
    <th><span>TK <strong id="collectable_from_customer_id">{{$collect_amount??00}}</strong> </span></th>
    <input type="hidden" value="{{$collect_amount}}" id="collectable_amount_from_customer" name="collectable_amount_from_customer"/>
</tr>

<tr>
    <th style="width:45%;" colspan="2"><small>Collectable From Merchant</small></th>
    <th><span>TK <strong id="collectable_from_merchant_id"></strong> </span></th>
    <input type="hidden" value="" id="collectable_amount_from_merchant" name="collectable_amount_from_merchant"/>
</tr>


<tr>
    <th style="width:70%;" colspan="2"><small><span id="clientMerchantPay">
        Payable To</span> Client </small>
    </th>
    <th>
        <span>TK 
            <strong id="total_payable_amount_id">
            {{ ($collect_amount?$collect_amount:0)-($charge + $cod_charge) }}
            </strong> 
        </span>
    </th>
    <input type="hidden" value="" id="total_payable_amount" name="total_payable_amount"/>
</tr>

<tr id="payment_option_id" style="display: none;">
    <th >Payment Status</th>
    <th colspan="2">
        <select name="payment_status_id" id="payment_status_id" required class="form-control ">
            <option {{ old('payment_status_id') == 1?'selected':'' }} value="1">Un-paid</option>
            <option {{ old('payment_status_id') == 2?'selected':'' }} value="2">Paid</option>
        </select>
    </th>
</tr>


        <input type="hidden" name="merchant_pickup_area_id" value="{{$merchant_pickup_area_id?$merchant_pickup_area_id:'NULL'}}" />
        <input type="hidden" name="merchant_branch_id" value="{{$merchant_branch_id?$merchant_branch_id:1}}" />
        <input type="hidden" name="service_charge_setting_id" value="{{$service_charge_setting_id?$service_charge_setting_id:1}}" />
        <input type="hidden" name="merchant_district_id" value="{{$merchant_district_id?$merchant_district_id:'NULL'}}" />
        <input type="hidden" name="customer_district_id" value="{{$customer_district_id?$customer_district_id:'NULL'}}" />
        <input type="hidden" name="charge" value="{{$charge?$charge:'00.00'}}" />
        <input type="hidden" name="collect_amount" value="{{$collect_amount?$collect_amount:0.0}}" />
        <input type="hidden" name="cod_charge" value="{{$cod_charge?$cod_charge:0.0}}" />
        <input type="hidden" name="total_payable_amount" value="{{$total_payable_amount?$total_payable_amount:0.0}}" />
