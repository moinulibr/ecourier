{{-- @if($collect_amount > 10000)
<tr>
    <th style="width:45%;">Cash Collections</th>
    <th>:</th>
    <td>Tk <span id="cash_collection_id">{{$collect_amount}}</span></td>
</tr>
@endif --}}

    @php
    if(isset($charge))
    {
        $chargeAmount = $charge;
    }else{
        $chargeAmount = 0;
    }
    if(isset($cod_charge))
    {
        $codAmount = $cod_charge;
    }else{
        $codAmount = 0;
    }
@endphp

<input type="hidden" value="{{$collect_amount}}" id="collect_amount" />


<tr>
    <th style="width:45%;">Delivery Charge</th>
    <th>:</th>
    <td>
        <input type="text" value="@isset($charge){{$charge}} @endisset" name="charge" id="deliveryCharge" class="form-control col-md-12 charge" />
        <span id="deliveryChargeErrorMessage" style="color:red;"></span>
    </td>
</tr>
<tr>
    <th style="width:45%;">COD Charge</th>
    <th>:</th>
    <td>
        <input type="text" value="@isset($cod_charge){{$cod_charge}} @endisset" name="cod_charge" id="codCharge" class="form-control col-md-12 charge" />
    </td>
</tr>

<tr style="background-color: blanchedalmond,color:brown;">
    <th>Total Charge</th>
    <th>:</th>
    <td>
        TK <span id="total_charge_id">
        {{ $chargeAmount + $codAmount }}
        </span>
        <input type="hidden" value="{{ $chargeAmount + $codAmount }}" name="total_charge" id="totalChargeId" class="totalChargeClass form-control col-md-12" />
    </td>
</tr>

<tr>
    <th style="width:45%;" colspan="2"><small>Collectable From Customer</small></th>
    <th><span>TK <strong id="collectable_from_customer_id">{{$collect_amount??00}}</strong> </span></th>
    <input type="hidden" value="{{$collect_amount}}" id="collectable_amount_from_customer" name="collectable_amount_from_customer"/>
</tr>

<tr>
    <th style="width:45%;" colspan="2"><small>Collectable From Client</small></th>
    <th><span>TK <strong id="collectable_from_merchant_id">{{ $codAmount }}</strong> </span></th>
    <input type="hidden" value="{{ $codAmount }}" id="collectable_amount_from_merchant" name="collectable_amount_from_merchant"/>
</tr>



<tr>
    <th style="width:70%;" colspan="2"><small><span id="clientMerchantPay">
        Payable To</span> Client </small>
    </th>
    <th>
        <span>TK 
            <strong id="total_payable_amount_id">
            {{ ($collect_amount?$collect_amount:0)-($chargeAmount + $codAmount) }}
            </strong> 
        </span>
    </th>
    <input type="hidden" value="" id="total_payable_amount" name="total_payable_amount"/>
</tr>



<tr id="payment_option_id" style="display: none;">
    <th >Payment Status</th>
    <th colspan="2">
        <select name="payment_status_id" id="payment_status_id"  class=" form-control ">
            <option {{ old('payment_status_id') == 1?'selected':'' }} value="1">Un-paid</option>
            <option {{ old('payment_status_id') == 2?'selected':'' }} value="2">Paid</option>
        </select>
    </th>
</tr>