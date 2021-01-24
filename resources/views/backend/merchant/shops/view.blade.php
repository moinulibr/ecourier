@extends('backend.merchant.layouts.master')
@section('title','Shop List')
@section('merchant_content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Shop List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
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
                      
                	<a href="{{ route('merchant.shop.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add New Shop</a>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Shop Name</th>
                                <th>Shop Address</th>
                                <th>Pickup Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Area</th>
                                <th>District</th>
                                <th>Action</th>
                             </tr>
                        </thead>
                        <tbody>

                        	@foreach($shops as $shop)
                             <tr>
                                 <td>{{ $shop->shop_name }}</td>
                                 <td>{{ $shop->shop_address }}</td>
                                 <td>{{ $shop->pickup_address }}</td>
                                 <td>{{ $shop->pickup_phone }}</td>
                                 <td>{{ $shop->shop_email }}</td>
                                 <td>{{ $shop->area?$shop->area->area_name:null }}</td>
                                 <td>{{ $shop->district?$shop->district->name:null }}</td>
                                 <td>
                                     <a class="btn  btn-primary btn-sm" href="{{ route('merchant.shop.edit',$shop->id) }}"> <i class="fa fa-edit"></i> Edit</a>
                                     <a class="btn  btn-danger btn-sm" id="delete" href="{{ route('merchant.shop.destroy',$shop->id) }}"> <i class="fa fa-trash"></i> Delete</a>
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