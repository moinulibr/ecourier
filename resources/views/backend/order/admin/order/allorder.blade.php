@extends('backend.layouts.master')
@section('title','Order List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Order List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Agent</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    @if (session()->has('error'))
    <div class="alert alert-danger">
        @if(is_array(session('error')))
            <ul>
                @foreach (session('error') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('error') }}
        @endif
    </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
    @endif
 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Percel</h4>
                    
                    <hr>
                  <div class="table-responsive">
                    <table id="" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                
                                <th>Parcel ID</th>
                                <th>Sender Info</th>
                                <th>Customer Info</th>
                                <th>Address </br>  Area</th>
                               
                                 <th>Address <br> Destination Area </th>
                                <th>Collection <br> Amount</th>
                                <th>Charge</th>
                                 <th>
                                    <a data-toggle="modal" data-target="#myModal">Status</a>
                                </th>
                                <th>Order <br/>Tracking</th>
                                <th>Customer <br/>
                                    Service <br/>Charge<br/>Payment Status
                                </th>
                                <th>
                                    Parcel <br/>Amount<br/>Payment Status
                                </th>
                                <th>From Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                
                                <td>
                                    <a href="#" class="viewSingleDataByAjax"   data-id="{{ $order->id }}" >
                                        {{ $order->invoice_no }}
                                    </a>
                                </td>
                                <td>
                                    {{ $order->generalCustomer?$order->generalCustomer->name:'' }}
                                    {{ $order->generalCustomer?$order->generalCustomer->phone:'' }}
                                   
                                </td>
                                <td>
                                    {{ $order->customer->customer_name }} <br>
                                    {{ $order->customer->customer_phone }} <br>
                                    
                                </td>
                                <td>
                                    {{ $order->customer->address }} <br>
                                    {{ $order->area->area_name }} <br>
                                    {{ $order->district->name }}
                                </td>
                                <td> {{ $order->collect_amount }}  </td>
                                <td> {{ $order->service_charge }}  </td>
                                <td> {{ $order->cod_charge }}  </td>
                                <td>
                                    <span style="">
                                        {{ getOrderStatusByOrderStatus_HH($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span style="{{ orderStatusStyle_HH($order->order_status_id) }}">
                                        {{ $order->orderStatus?$order->orderStatus->order_status:'' }}
                                    </span>
                                </td>
                                 <td>
                                    <strong {{ orderServiceChargeStatusByOrderId_HH($order->id)['style'] }}> 
                                        {{ orderServiceChargeStatusByOrderId_HH($order->id)['status'] }}
                                    </strong>
                                </td>
                                <td>
                                    <strong {{ orderParcelAmountPaymentStatusByOrderId_HH($order->id)['style'] }}> 
                                        {{ orderParcelAmountPaymentStatusByOrderId_HH($order->id)['status'] }}
                                    </strong>
                                </td>
                                <td>
                                    {{ $order->orderBranch?$order->orderBranch->company_name:'' }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                            <a href="#" class="viewSingleDataByAjax"   data-id="{{ $order->id }}" >
                                                <li>   
                                                    <i class="fa fa-eye"></i> View
                                                </li>
                                            </a>
                                            <li>
                                                <a href="{{ route('admin.print.order.invoice',$order->id) }}"><i class="fa fa-print"></i> Print</a>
                                            </li> 
                                            <li>   
                                                <a href="" class="edit"><i class="fa fa-edit"></i> Edit</a>
                                            </li>
                                             
                                            <li> 
                                                <a id="delete" href="{{ route('admin.order.destroy', $order->id) }}" class="delete"><i class="fa fa-trash"></i> Delete</a>
                                                {{--  <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete?')">       
                                                </form>  --}}
                                           </li>
                                        </ul> 
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->







<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       @foreach(getOrderStatus_HH() as $key => $data)
            <button id="status_id" name="status_id" value="{{$data['id']}}"class="status_id_class btn btn-md" >
                {{$data['name']}}
            </button> <br/>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


{{-- ----------------Fmor Modal randering---------------- --}}
{{-- --- class="viewSingleDataByAjax"   data-id="{{ $order->id }}" --}}
<!-- Modal -->
<div id="viewSingleDataByAjax" class="modal fade" role="dialog" aria-hidden="true" ></div>

    <div id="showSingleViewByAjax" data-url="{{ route('admin.showSingleViewByAjax')}}"></div>
    @section('ajaxdropdown')
    <script>
        $(document).on('click','.viewSingleDataByAjax', function(e){
            e.preventDefault();
            var id          =  $(this).data('id');
            var url         =  $('#showSingleViewByAjax').data("url");
                $.ajax({
                    url: url,
                    data: {id:id},
                    type: "GET",
                    success: function(response){
                        $('#viewSingleDataByAjax').html(response).modal('show');
                    },
                });
        });
        $(document).on('click','.modalDismissClass',function(h){
            h.preventDefault();
            $('#viewSingleDataByAjax').html('').modal('hide');
        });
        //========invoice details==============

    </script>
    @endsection
    {{-- ----------------Fmor Modal randering End---------------- --}}



@endsection