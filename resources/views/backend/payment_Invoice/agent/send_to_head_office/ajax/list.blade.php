
@php
    $branch_id = Auth::guard('web')->user()->branch_id;
@endphp
 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th></th>
            <th>Customer <br/> Name</th>
            <th>Customer<br/>Phone</th>
            <th>Customer<br/>Address</th>
            <th>Condition<br/>Amount</th>
            <th>Order No</th>
            <th>Service <br/>Charge</th>
            <th>COD <br/>Charge</th>
            <th>Total <br/>Charge</th>
            <th>Receiver <br/>Amount</th>
            <th>Delivery <br/>Charge<br/>Bearer</th>
            <th>Cash <br/> Collection</th>
            <th style="width:5%;">(Service Charge)<br/>Status</th>
            <th>Condition<br/>Payment<br/>Status</th>
            <th></th>
        </tr>
    </thead> 
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" id="order_id_{{$order->order_id}}" name="order_id[]"  data-amount="{{$order->total_amount}}" value="{{$order->order_id}}"  />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->order_id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>{{ $order->orders?$order->orders->customer->customer_name : NULL }}</td>
            <td>{{ $order->orders?$order->orders->customer->customer_phone : NULL }}</td>
            <td>{{ $order->orders?$order->orders->customer->address : NULL }}</td>
            <td>{{ $order->orders?$order->orders->collect_amount :NULL }}</td>
            <td>{{$order->orders?$order->orders->invoice_no:NULL}}</td>
            <td>
                {{$order->orders?$order->orders->service_charge:NULL}}
            </td>
            <td>
               {{$order->orders?$order->orders->cod_charge:NULL}}
            </td>
            <td>
                {{($order->orders?$order->orders->service_charge:0) + ($order->orders?$order->orders->cod_charge:0)}}
            </td>
            <td>{{ $order->orders?$order->orders->collect_amount :NULL }}</td>
            <td>
                {{deliveryChargeBearerByOrderId_HH($order->order_id)}}
            </td>
            <td>
                {{--  @php
                    $de_charge = receivedAmountTypeAmount_HH($order->order_id,$branch_id,1);
                    $cod_charge = receivedAmountTypeAmount_HH($order->order_id,$branch_id,2);
                    echo $total = $de_charge + $cod_charge; 
                @endphp  --}}
                <span id="del_order_id_{{$order->order_id}}" >
                    <span id="" class="total_before_action" >
                    {{$order->total_amount}}
                    </span>
                </span>
            </td>
            <td>
                <strong {{ orderServiceChargeStatusByOrderId_HH($order->order_id)['style'] }}> 
                    {{ orderServiceChargeStatusByOrderId_HH($order->order_id)['status'] }}
                </strong>
            </td>
            <td>
               
            </td>
            {{--  <td>
                @php
                    echo receivedAmountTypeAmount_HH($order->order_id,$branch_id,4);
                @endphp
            </td>
            <td>
                <span id="del_order_id_{{$order->order_id}}">
                    <span id="" class="total_before_action" >
                    {{$order->total_amount}}
                    </span>
                </span>
            </td>
            <td></td>  --}}
        </tr>
        @endforeach

    </tbody>
    <tfooter>
        <tr>
            <td colspan="11">
            </td>
            <td style="text-align:right">
                <strong>Total</strong>
            </td>
            <td >
                <strong id="totalAmount"></strong>
                <input type="hidden" value="" id="sendTotalAmount" name="total_amount" />
            </td>
            <td  style="width:5%;" colspan="2">
                <input Type="submit" id="submit" class="btn btn-primary btn-sm" value="Send Head-Office"/>
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
