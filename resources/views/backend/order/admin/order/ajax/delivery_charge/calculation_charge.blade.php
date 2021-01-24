<tr>
    <th>Cash Collections</th>
    <th>:</th>
    <td>Tk <span id="cash_collection_id">{{$collect_amount}}</span></td>
</tr>
<tr>
    <th>Delivery Charge</th>
    <th>:</th>
    <td>Tk <span id="delivery_charge_id">{{$charge}}</span></td>
</tr>
<tr>
    <th>COD Charge</th>
    <th>:</th>
    <td>TK <span id="cod_charge_id">{{$cod_charge}}</span></td>
</tr>
<tr>
    <th colspan="2">Total Payable Amount </th>
    <th><span>TK <strong id="total_payable_amount_id">{{$total_payable_amount}}</strong> </span></th>
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
