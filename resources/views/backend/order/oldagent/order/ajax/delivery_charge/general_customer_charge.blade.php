@if($collect_amount > 0)
<tr>
    <th style="width:45%;">Cash Collections</th>
    <th>:</th>
    <td>Tk <span id="cash_collection_id">{{$collect_amount}}</span></td>
    <input type="hidden" value="{{$collect_amount}}" id="collect_amount" />
</tr>
@endif
<tr>
    <th style="width:45%;">Delivery Charge</th>
    <th>:</th>
    <td>
        <input type="number" value="0" name="charge" id="deliveryCharge" class="form-control col-md-12 charge" />
    </td>
</tr>
<tr>
    <th style="width:45%;">COD Charge</th>
    <th>:</th>
    <td>
        <input type="number" value="0" name="cod_charge" id="codCharge" class="form-control col-md-12 charge" />
    </td>
</tr>
<tr>
    <th style="width:45%;" colspan="2">Total Payable Amount</th>
    <th><span>TK <strong id="total_payable_amount_id">00.00</strong> </span></th>
    <input type="hidden" value="" id="total_payable_amount" name="total_payable_amount"/>
</tr>