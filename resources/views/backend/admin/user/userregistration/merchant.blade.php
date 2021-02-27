@extends('backend.layouts.master')
@section('title','Merchant Application List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Merchant Application List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Merchant List</li>
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
                    <h4 class="card-title">Merchant Application List   </h4>
                    
                 
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Area</th>
                                <th>Pickup Address</th>
                                <th>Office Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($merchants as $merchant)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                  <td>{{  $merchant->name }}</td>
                                  <td>{{  $merchant->company_name }}</td>
                                   <td>{{ $merchant->mobile }}</td>
                                   <td>{{ $merchant->email }}</td>
                                   <td>{{ $merchant->area->area_name }}</td>
                                   <td>{{ $merchant->pickupaddress }}</td>
                                   <td>{{ $merchant->office_address }}</td>
                                  <td>
                                     @if($merchant->status == 1)
                                     <p class="btn btn-sm btn-warning">New Register</p>
                                     @elseif($merchant->status ==2) 
                                    <p class="btn btn-sm btn-success">Approved</p>
                                     @endif
                                   </td>
                                   <td>
                                     <a href="" class="btn btn-sm btn-primary">Accepted</a>
                                     <a href="{{ route('merchant.registration.show',$merchant->id) }}" class="btn btn-primary">Show Application</a>
                                   </td>
                                  <td>
                                       
                                        
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