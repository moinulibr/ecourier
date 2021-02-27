@extends('backend.layouts.master')
@section('title','Agent Application Show')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Agent Application List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Agent List</li>
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
                    <h4 class="card-title">agent Application List   </h4>
                    
                 
                    <table class="table dt-responsive nowrap w-100">
                         <tbody>
                              <tr>
                                   <th>Name</th>
                                   <td>:</td>
                                   <td>{{  $agent->name }}</td>
                                   <th>Company Name</th>
                                    <td>:</td>
                                   <td>{{  $agent->company_name }}</td>
                              </tr>  

                              <tr>
                                   <th>Phone</th>
                                    <td>:</td>
                                   <td>{{ $agent->mobile }}</td>
                                   <th>Email</th>
                                    <td>:</td>
                                   <td>{{ $agent->email }}</td>
                              </tr>

                              <tr>
                                   <th>Area</th>
                                    <td>:</td>
                                   <td>{{ $agent->area->area_name }}</td>
                                   <th>District</th>
                                    <td>:</td>
                                   <td>{{ $agent->district->name }}</td>
                              </tr>
                              <tr>
                                 <th>Pickup Address</th>
                                  <td>:</td>
                                 <td>{{ $agent->pickupaddress }}</td>
                                 <th>Office Address</th>
                                  <td>:</td>
                                 <td>{{ $agent->office_address }}</td>
                              </tr>

                              <tr>
                                <th>Payment type</th>
                                 <td>:</td>
                                <td>
                                  @if($agent->payment_type ==1)
                                  <p>Mobile Banking</p>
                                  @elseif($agent->payment_type ==2)
                                  <p>Bank</p>
                                  @else
                                  Cash
                                  @endif
                                </td>
                              </tr>

                              <tr>
                                <th>National ID Card</th>
                                 <td>:</td>
                                <td>
                                  <a href="{{ asset($agent->nidcardpdf) }}" download="{{ asset($agent->nidcardpdf) }}">Download</a>
                                </td>
                                <th>Father National ID Card</th>
                                 <td>:</td>
                                <td>
                                  <a href="{{ asset($agent->fathernid) }}" download="{{ asset($agent->fathernid) }}">Download</a>
                                </td>
                              </tr>



                              <tr>
                                <th>Application Type</th>
                                 <td>:</td>
                                <td>
                                     @if($agent->status == 1)
                                    <p class="btn btn-sm btn-warning">New Register</p>
                                     @elseif($agent->status == 2) 
                                    <p class="btn btn-sm btn-success">Approved</p>
                                     @endif
                                   </td>
                               
                                 <th>Application Date</th>
                                  <td>:</td>
                                 <td>{{ $agent->created_at }}</td>
                              </tr>
                                   
                              <tr>
                                  <th>Action</th>
                                   <td>:</td>
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