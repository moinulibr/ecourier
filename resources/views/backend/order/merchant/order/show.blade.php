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

 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Percel</h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Parcel ID</th>
                                <th>Parcel Owner</th>
                                <th>
                                    Merchant Name <br> Shop Name
                                    <br/>
                                    General Customer
                                </th>
                                <th>Customer info</th>
                                <th>Area</th>
                                <th>Service <br/>Charge</th>
                                <th>Status</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->invoice_no }}</td>
                                <td>
                                    @if ($order->parcel_owner_type_id == 1)
                                    Merchant
                                    @else
                                    General Customer
                                @endif
                                </td>
                                <td>
                                    {{ $order->generalCustomer?$order->generalCustomer->name:'' }}
                                    {{ $order->merchant?$order->merchant->name:'' }} <br>
                                     {{ $order->merchantshop?$order->merchantshop->shop_name:'' }}
                                </td>
                                <td>
                                    {{ $order->customer->customer_name }} <br>
                                    {{ $order->customer->customer_phone }} <br>
                                    {{ $order->customer->address }} <br>
                                </td>
                                <td>
                                    {{ $order->area->area_name }} <br>
                                    {{ $order->district->name }}
                                </td>
                                <td>
                                    {{ $order->service_charge }}
                                </td>
                                <td>
                                    <span style="{{ orderStatusStyle_HH($order->order_status_id) }}">
                                        {{ $order->orderStatus?$order->orderStatus->order_status:'' }}
                                    </span>
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
                                            <li>   
                                                <a href="" class="edit"><i class="fa fa-edit"></i> Edit</a>
                                            </li>
                                             
                                            <li> 
                                                <a id="delete" href="" class="delete"><i class="fa fa-trash"></i> Delete</a>
                                           </li>
                                        </ul> 
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection