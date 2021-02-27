@php
$cartName = session()->has('cartName') ? session()->get('cartName')  : [];
//$total = array_sum(array_column($cart,'total_price'));
$i = 1;
@endphp

@foreach ($cartName as $key => $item)
<tr>
    <td>
        {{ $i }}
        <input type="hidden" value="{{ $i }}" class="totalId" />
    </td>
    <td>
        <input name="order_id[]" type="hidden" value="{{ $item['order_id'] }}" />
        <a href="#" class="viewSingleDataByAjax"   data-id="{{ $item['order_id'] }}" >{{ $item['invoice_no'] }} </a>
    </td>
    <td>
        <strong style="{{ orderStatusStyle_HH($item['status_id']) }}"> 
            {{ $item['status'] }}
        </strong>
       {{--   <input value="{{ $item['status'] }}" name="qty" id="qty-{{ $item['status'] }}" class="clickToGet" type="text" style="width:100%;">  --}}
    </td>
    <td>
        <span class="clickToGet" id="price-{{ $item['customer_name'] }}">{{ $item['customer_name'] }}</span>
    </td>
    <td>
        <span id="set-{{ $item['customer_phone'] }}">{{ $item['customer_phone'] }}</span>
    </td>
    <td>
        <a href="#" class="clickForGetId"  data-url="{{ route('agent.quickAssignParcelRemoveSingleCart')}}" data-id="{{ $item['order_id'] }}">
            <i class="fas fa-trash"></i>
            Remove
        </a>
        {{-- <span id="set-{{ $item['product_id'] }}">{{ $item['total_price'] }}</span> --}}
    </td>
</tr>
{{ $i++ }}
@endforeach

<input type="hidden" value="{{count($cartName)}}" id="total_row" />