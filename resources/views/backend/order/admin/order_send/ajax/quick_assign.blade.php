@php
$cartNameSend = session()->has('cartNameSend') ? session()->get('cartNameSend')  : [];
//$total = array_sum(array_column($cart,'total_price'));
$i = 1;
@endphp

@foreach ($cartNameSend as $key => $item)
<tr>
    <td>
        {{ $i }}
        <input type="hidden" value="{{ $i }}" class="totalId" />
    </td>
    <td>
        <input name="order_id[]" type="hidden" value="{{ $item['order_id'] }}" />
        <input name="order_session_id[]" type="hidden" value="{{ $item['order_session_id'] }}" />
        <input name="sending_to_branch_id[]" type="hidden" value="{{ $item['sending_to_branch_id'] }}" />
        <a href="#" class="viewSingleDataByAjax"   data-id="{{ $item['order_id'] }}" >{{ $item['invoice_no'] }} </a>
    </td>
    <td>
        <strong style="{{ orderStatusStyle_HH($item['status_id']) }}"> 
            {{ $item['status'] }}
        </strong>
       {{--   <input value="{{ $item['status'] }}" name="qty" id="qty-{{ $item['status'] }}" class="clickToGet" type="text" style="width:100%;">  --}}
    </td>
    <td>
        <span class="clickToGet" id="price-{{ $item['creating_branch'] }}">{{ $item['creating_branch'] }}</span>
    </td>
    <td>
        <span id="set-{{ $item['sending_to_branch'] }}">{{ $item['sending_to_branch'] }}</span>
    </td>
    <td>
        <span id="set-{{ $item['destination_branch'] }}">{{ $item['destination_branch'] }}</span>
    </td>
    <td>
        <a href="#" class="clickForGetId"  data-url="{{ route('agent.send_quickAssignParcelRemoveSingleCart')}}" data-id="{{ $item['order_session_id'] }}">
            <i class="fas fa-trash"></i>
            Remove
        </a>
        {{-- <span id="set-{{ $item['product_id'] }}">{{ $item['total_price'] }}</span> --}}
    </td>
</tr>
{{ $i++ }}
@endforeach

<input type="hidden" value="{{count($cartNameSend)}}" id="total_row" />