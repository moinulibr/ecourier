

 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th>Total Invoice</th>
            <th>Date</th>
            <th>Total <br/> Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$order->send_at}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->total_collect_amount}}</td>
            <td>
                <a class="btn btn-primary btn-sm viewByDate"> Print</a>
            </td>
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