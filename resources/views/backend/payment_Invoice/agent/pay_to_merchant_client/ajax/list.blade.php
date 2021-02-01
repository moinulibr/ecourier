
@php
    $branch_id = Auth::guard('web')->user()->branch_id;
@endphp
 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th></th>
            <th>Order No</th>
             <th>Merchant/Client <br/>Name</th>
            <th>Merchant/Client <br/>Phone</th>
            <th>Service <br/>Charge</th>
            <th>COD <br/>Charge</th>
            <th>Other<br/> Charge</th>
            <th>Collect Amount</th>
            <th>Payable Amount</th>
            <th style="width:5%;"></th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" id="order_id_{{$order->id}}" name="order_id[]"  data-amount="{{ totalServiceChargePaymentStatusByOrderId_HH($order->id) }}" value="{{$order->id}}"  />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>{{$order->invoice_no}}</td>
             <td>
                @if ($order->parcel_owner_type_id == 1)
                    {{ $order->merchant?$order->merchant->name:'' }} 
                @endif
                @if ($order->parcel_owner_type_id == 2)
                    {{ $order->generalCustomer?$order->generalCustomer->name:'' }}
                @endif
               
            </td>
            <td>
                @if ($order->parcel_owner_type_id == 1)
                     {{ $order->merchant?$order->merchant->phone:'' }} <br>
                @endif
                @if ($order->parcel_owner_type_id == 2)
                    {{ $order->generalCustomer?$order->generalCustomer->phone:'' }}
                @endif
            </td>
                {{--
                    {{ $order->customer->customer_name }} <br>
                    {{ $order->customer->customer_phone }} <br>
                    {{ $order->customer->address }} <br>
                ---}}
            <td>
                {{$order->service_charge}}
            </td>
            <td>
                 {{$order->cod_charge}}
            </td>
            <td>
                {{$order->others_charge}}     {{--  //totalServiceChargePaymentStatusByOrderId_HH($orderId)  --}}
            </td>
            <td>
                {{$order->collect_amount}}
            </td>
            <td>
                <span id="del_order_id_{{$order->id}}">
                    <span id="" class="total_before_action" >
                    {{totalServiceChargePaymentStatusByOrderId_HH($order->id) }}
                        {{---$order->client_merchant_payable_amount--}}
                    </span>
                </span>
            </td>
            <td></td>
        </tr>
        @endforeach

    </tbody>
    <tfooter>
        <tr>
            <td colspan="8"></td>
            <td style="text-align:right">
                <strong>Total</strong>
            </td>
            <td >
                <strong id="totalAmount"></strong>
                <input type="hidden" value="" id="sendTotalAmount" name="total_amount" />
            </td>
            <td  style="width:5%;">
                <input Type="submit" id="submit" class="btn btn-primary btn-sm" value="Pay To Merchant/Client"/>
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
