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
                        <li class="breadcrumb-item active">Upcomming</li>
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
                                <th>Branch From <br/> District</th>
                                <th>Destination Branch</th>
                                <th>Charge</th>
                                <th>Status</th>
                                <th>Parcel Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->orders?$order->orders->invoice_no:'' }}</td>
                               
                               {{--   <td>
                                    {{ $order->generalCustomer?$order->generalCustomer->name:'' }}
                                    {{ $order->merchant?$order->merchant->name:'' }} <br>
                                     {{ $order->merchantshop?$order->merchantshop->shop_name:'' }}
                                </td>  --}}
                               {{--   <td>
                                    {{ $order->customer->customer_name }} <br>
                                    {{ $order->customer->customer_phone }} <br>
                                    {{ $order->customer->address }} <br>
                                </td>  --}}
                                <td>
                                 {{ $order->orders?$order->orders->creatingBranches?$order->orders->creatingBranches->company_name:'':'' }} <br>
                                    {{ $order->orders?$order->orders->creatingAreas?$order->orders->creatingAreas->district->name:'':'' }}
                                </td>
                                <td>
                                    {{ $order->orders?$order->orders->destinationBranchs?$order->orders->destinationBranchs->company_name:'':'' }} <br>
                                    {{ $order->orders?$order->orders->destinationDistricts?$order->orders->destinationDistricts->name:'':'' }}
                                </td>
                                <td>
                                    {{ $order->orders?$order->orders->service_charge:0.0 }}
                                </td>
                                <td>
                                    <span style="{{ orderStatusStyle_HH($order->orders?$order->orders->order_status_id:'') }}">
                                        {{  $order->orders?$order->orders->orderStatus?$order->orders->orderStatus->order_status:'':'' }}
                                    </span>
                                </td>
                               {{--   <td>
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
                                </td>  --}}
                                 <td>
                                    @if ($order->orders?$order->orders->parcel_owner_type_id:'' == 1)
                                    Merchant
                                    @else
                                    General Customer
                                    @endif
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