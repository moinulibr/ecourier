
@php
    $branch_id = Auth::guard('web')->user()->branch_id;
@endphp
 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th></th>
            <th>Order No</th>
           {{--   <th>Service <br/>Charge</th>
            <th>COD <br/>Charge</th>
            <th>Other<br/> Charge</th>  --}}
            <th>Parcel  Amount</th>
           {{--   <th>Sub Total</th>  --}}
            <th style="width:5%;"></th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" id="order_id_{{$order->order_id}}" name="order_id[]"  data-amount="{{$order->client_merchant_payable_amount}}" value="{{$order->order_id}}"  />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->order_id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>{{$order->orders?$order->orders->invoice_no:NULL}}</td>
            {{--  <td>
                @php
                    echo receivedAmountTypeAmount_HH($order->order_id,$branch_id,1);
                @endphp
            </td>
            <td>
                @php
                    echo receivedAmountTypeAmount_HH($order->order_id,$branch_id,2);
                @endphp
            </td>
            <td>
                00.00 @php
                    echo receivedAmountTypeAmount_HH($order->order_id,$branch_id,4);
                @endphp
            </td>  --}}
            {{--  <td>
                {{$order->client_merchant_payable_amount}}
            </td>  --}}
            <td>
                <span id="del_order_id_{{$order->order_id}}">
                    <span id="" class="total_before_action" >
                    {{$order->client_merchant_payable_amount}}
                    </span>
                </span>
            </td>
            <td></td>
        </tr>
        @endforeach

    </tbody>
    <tfooter>
        <tr>
            <td colspan="2"></td>
            <td style="text-align:right">
                <strong>Total</strong>
            </td>
            <td >
                <strong id="totalAmount"></strong>
                <input type="hidden" value="" id="sendTotalAmount" name="total_amount" />
            </td>
            <td  style="width:5%;">
                <input Type="submit" id="submit" class="btn btn-primary btn-sm" value="Send Others Branch"/>
            </td>
        </tr>
    </tfooter>
</table>




{{----
 @foreach($ods as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" id="order_id_{{$order->order_id}}" name="order_id[]" data-amount="{{$order->orders->collect_amount}}" value="{{$order->order_id}}" />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->order_id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>
                <a class="viewSingleDataByAjax"   data-id="{{ $order->orders->id }}" href="#">
                    {{$order->orders->invoice_no}}
                </a>
            </td>
            <td>{{$order->orders->merchant_invoice}}</td>
            <td>{{$order->manpowers?$order->manpowers->name:''}}</td>
            <td>
                <span id="del_order_id_{{$order->order_id}}">
                    <span id="" class="total_before_action" >{{$order->orders->collect_amount}}</span>
                </span>
            </td>
            <td>
                Receive
            </td>
        </tr>
        @endforeach

----}}
