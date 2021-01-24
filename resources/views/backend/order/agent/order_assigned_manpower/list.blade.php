

 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th>Invoice No</th>
            <th>Customer Invoice</th>
            <th>Collect <br/> Amount</th>
            <th>Customer Name</th>
            <th>Customer Phone</th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <a class="viewSingleDataByAjax"   data-id="{{ $order->orders->id }}" href="#">
                    {{$order->orders->invoice_no}}
                </a>
            </td>
            <td>{{$order->orders->merchant_invoice}}</td>
            <td>{{$order->orders->collect_amount}}</td>
            <td>{{$order->orders->customer->customer_name}}</td>
            <td>{{$order->orders->customer->customer_phone}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
       {{--   <tr>
            <td colspan="5"></td>
            <td >
                <a href="#" id="clearAll" class="btn btn-sm btn-danger clearAll">Clear All</a>
            </td>
        </tr>  --}}
    </tfooter>
</table>
    {{$orders->links()}}



{{--  @foreach($orders as $key=> $order)

    <tr>
        <td>{{$key+1}}</td>
        <td>
            <a class="viewSingleDataByAjax"   data-id="{{ $order->orders->id }}" href="#">
                {{$order->orders->invoice_no}}
            </a>
        </td>
        <td>{{$order->orders->merchant_invoice}}</td>
        <td>{{$order->orders->collect_amount}}</td>
        <td>{{$order->orders->customer->customer_name}}</td>
        <td>{{$order->orders->customer->customer_phone}}</td>
    </tr>

@endforeach  --}}