
@php
    $branch_id = Auth::guard('web')->user()->branch_id;
@endphp
 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th> 
            <th></th>
            <th>Order No</th>
            <th>Order <br/> Charge</th>
            <th>Commission Type</th>
            <th>Commission <br/> Amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" id="order_id_{{$order->order_id}}" name="order_id[]"  data-amount="{{ $order->commission }}" value="{{$order->order_id}}"  />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->order_id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>{{$order->orders?$order->orders->invoice_no:NULL}}</td>
            <td>
                {{$order->service_charge}}
            </td>
            <td>
                {{ getBranchCommissionByCommissionTypeId_HH($order->branch_commission_type_id)}}
            </td>
            <td>
                <span id="del_order_id_{{$order->order_id}}">
                    <span id="" class="total_before_action" >
                    {{ $order->commission }}
                    </span>
                </span>
            </td>
            <td></td>
        </tr>
        @endforeach

    </tbody>
    <tfooter>
        <tr>
            <td colspan="4"></td>
            <td style="text-align:right">
                <strong>Total</strong>
            </td>
            <td >
                <strong id="totalAmount"></strong>
                <input type="hidden" value="" id="sendTotalAmount" name="total_amount" />
            </td>
            <td  style="width:5%;">
                <input Type="submit" id="submit" class="btn btn-primary btn-sm" value="Pay To Branch Commission"/>
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
