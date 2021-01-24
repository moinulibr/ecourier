@extends('backend.layouts.master')
@section('title','Merchant Application Show')
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
                    
                 
                    <table class="table dt-responsive nowrap w-100">
                         <tbody>
                              <tr>
                                   <th>Name</th>
                                   <td>{{  $merchant->name }}</td>
                                   <th>Company Name</th>
                                   <td>{{  $merchant->company_name }}</td>
                              </tr>  

                              <tr>
                                   <th>Phone</th>
                                   <td>{{ $merchant->mobile }}</td>
                                   <th>Email</th>
                                   <td>{{ $merchant->email }}</td>
                              </tr>

                              <tr>
                                   <th>Area</th>
                                   <td>{{ $merchant->area->area_name }}</td>
                                   <th>District</th>
                                   <td>{{ $merchant->district->name }}</td>
                              </tr>
                              <tr>
                                 <th>Pickup Address</th>
                                 <td>{{ $merchant->pickupaddress }}</td>
                                 <th>Office Address</th>
                                 <td>{{ $merchant->office_address }}</td>
                              </tr>

                              <tr>
                                <th>Payment type</th>
                                <td>
                                  @if($merchant->payment_type ==1)
                                  <p>Mobile Banking</p>
                                  @elseif($merchant->payment_type ==2)
                                  <p>Bank</p>
                                  @else
                                  Cash
                                  @endif
                                </td>
                              </tr>

                              <tr>
                                <th>Application Type</th>
                                <td>
                                     @if($merchant->status == 1)
                                     <p class="btn btn-sm btn-warning">New Register</p>
                                     @elseif($merchant->status == 2) 
                                    <p class="btn btn-sm btn-success">Approved</p>
                                     @endif
                                   </td>
                               
                                 <th>Application Date</th>
                                 <td>{{ $merchant->created_at }}</td>
                              </tr>
                        
                        

                      
                             
                                 
                                 
                                  
                                  
                                   
                              <tr>
                                  <th>Action</th>
                                   <td>
                                     <a href="" class="btn btn-sm btn-primary">Accepted</a>
                                   </td>
                                   
                               </tr>

                              
               
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection