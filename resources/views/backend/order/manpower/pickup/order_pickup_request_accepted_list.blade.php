@extends('backend.manpower.layouts.master')
@section('title','Accepted Order Pickup Request List')
@section('content')
	<!-- start page title -->
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
                    <h4 class="card-title">Accepted Order Pickup Request List 
                    {{--     <a href="" class="float-right btn btn-primary btn-sm">
                            <i class="icon nav-icon" data-feather="plus"></i>
                            <span class="menu-item" key="t-plus">Create Admin</span>
                        </a> --}}
            </h4>
                    
                    <hr>
                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Order ID</th>
                                <th>Customer   <br> Name , Phone</th>
                                <th>Merchant Shop</th>
                                <th>Pickup  <br/> Address , Phone</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($orders as $key => $item)
                            <tr>
                                <td>{{$key +1 }}</td>
                                <td>{{$item->orders?$item->orders->invoice_no:NULL}}</td>
                                <td>
                                    {{$item->orders?$item->orders->customer?$item->orders->customer->customer_name:NULL:NULL}} <br/>
                                     {{$item->orders?$item->orders->customer?$item->orders->customer->customer_phone:NULL:NULL}}
                                </td>
                                <td>
                                    {{ $item->orders?$item->orders->merchantshop?$item->orders->merchantshop->shop_name:'':NULL }}
                                </td>
                                <td>
                                    {{ $item->orders?$item->orders->merchantshop?$item->orders->merchantshop->pickup_address:'':NULL }} <br/>
                                  Phone :  {{ $item->orders?$item->orders->merchantshop?$item->orders->merchantshop->pickup_phone:'':NULL }}
                                </td>
                                <td>
                                    {{date('Y-m-d h:i:s',strtotime($item->created_at))}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm order_id_class" data-order_type="accepting" data-order_id="{{$item->order_id}}" data-toggle="modal" data-target="#pickingupParcel"><i class="fa fa-eye"></i> Accept</a>
                                    <a href="" class="btn btn-danger btn-sm order_id_class" data-order_type="holding" data-order_id="{{$item->order_id}}" data-toggle="modal" data-target="#parcelPickingTimeOrderHold"><i class="fa fa-trash"></i>Hold </a>
                                    <a href="" class="btn btn-danger btn-sm order_id_class" data-order_type="canceling" data-order_id="{{$item->order_id}}" data-toggle="modal" data-target="#parcelPickingTimeOrderCancel"><i class="fa fa-trash"></i>Cancel</a>
                            </tr>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->






 
    <!-- Modal Picking up-->
    <div id="pickingupParcel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form action="{{route('manpower.OrderPickingParcel')}}" method="POST" >
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pickup Parcel </h4>
                    </div>
                    <div class="modal-body">
                        <h6>Pickup Parcel </h6> <hr/>
                        <div class="form-group">
                            <select name="accept_value" class="form-control">
                                <option value="9">Receive Parcel (From Merchant)</option>
                            </select>
                        </div>
                        <input type="hidden" value="" name="order_id" id="accept_id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-primary"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
 

    <!-- Modal Holding-->
    <div id="parcelPickingTimeOrderHold" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <form action="{{route('manpower.OrderPickingTimeHoldingParcel')}}" method="POST" >
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Order Holding Reason </h4>
                    </div>
                    <div class="modal-body">
                        <h6>Order Holding Reason </h6> <hr/>
                        <div class="form-group">
                            <select name="holding_value" class="form-control">
                            @foreach ($holdingReasons as $item) 
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="next_schedule" value="" class="form-control" placeholder="Please Set Date  / Time"/>
                        </div>
                        <input type="hidden" name="order_id" value="" id="hold_id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-danger"/>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <!-- Modal Canceling-->
    <div id="parcelPickingTimeOrderCancel" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <form action="{{route('manpower.OrderPickingTimeCancelingParcel')}}" method="POST" >
                @csrf
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Order Canceling Reason </h4>
                    </div>
                    <div class="modal-body">
                        <h6>Order Canceling Reason </h6> <hr/>
                        <div class="form-group">
                            <select name="cancel_value" class="form-control">
                            @foreach ($cancelingReasons as $item) 
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="order_id" value="" id="cancel_id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-danger"/>
                    </div>
                </div>
            </form>

        </div>
    </div>




    @push('js')
        <script>
                $(document).ready(function(){
                    $('#accept_id').val();
                    $('#cancel_id').val();
                    $('#hold_id').val();
                });
                $(document).on('click','.order_id_class',function(){
                    var order_id    =   $(this).data('order_id');
                    var order_type  =  $(this).data('order_type');
                    if(order_type == 'accepting')
                    {
                        $('#accept_id').val(order_id);
                    }
                    else if(order_type == 'canceling')
                    {
                        $('#cancel_id').val(order_id);
                    }
                    else if(order_type == 'holding')
                    {
                        $('#hold_id').val(order_id);
                    }
                });
        </script>


    @endpush

@endsection