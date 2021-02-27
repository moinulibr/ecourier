@extends('backend.layouts.master')
@section('title','Delivery Application Show')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Deliveryman Application List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Deliveryman List</li>
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
                    <h4 class="card-title">Delivery Man Application List   </h4>
                    
                 
                    <table class="table dt-responsive nowrap w-100">
                         <tbody>
                              <tr>
                                   <th>Name</th>
                                   <td>:</td>
                                   <td>{{  $deliveryman->name }}</td>
                                   <th>Father Name</th>
                                    <td>:</td>
                                   <td>{{  $deliveryman->father_name }}</td>
                              </tr>
                              <tr>
                                  <th>Mother Name</th>
                                  <th>:</th>
                                  <td>{{ $deliveryman->mother_name }}</td>
                                  <th>Father Mobile</th>
                                  <th>:</th>
                                  <td>{{ $deliveryman->father_mobile }}</td>

                              </tr>  

                              <tr>
                                   <th>Phone</th>
                                    <td>:</td>
                                   <td>{{ $deliveryman->mobile }}</td>
                                   <th>Email</th>
                                    <td>:</td>
                                   <td>{{ $deliveryman->email }}</td>
                              </tr>

                              <tr>
                                   <th>Address</th>
                                    <td>:</td>
                                   <td>{{ $deliveryman->address }}</td> 

                                   <th>NID Number</th>
                                    <td>:</td>
                                   <td>{{ $deliveryman->nidnumber }}</td>
                                   
                              </tr>
                              <tr>
                                <th>National ID Card</th>
                                 <td>:</td>
                                <td>
                                  <a href="{{ asset($deliveryman->nidcardpage) }}" download="{{ asset($deliveryman->nidcardpage) }}">Download</a>
                                </td>
                                <th>Father National ID Card</th>
                                 <td>:</td>
                                <td>
                                  <a href="{{ asset($deliveryman->fathernid) }}" download="{{ asset($deliveryman->fathernid) }}">Download</a>
                                </td>
                              </tr>

                              <tr>
                                <th>CV</th>
                                <th>:</th>
                                <td>
                                    <a href="{{ asset($deliveryman->cvfile) }}" download="{{ asset($deliveryman->cvfile) }}">Download</a>
                                </td>
                              </tr>



                              <tr>
                                <th>Application Type</th>
                                 <td>:</td>
                                <td>
                                     @if($deliveryman->status == 1)
                                    <p class="btn btn-sm btn-warning">New Register</p>
                                     @elseif($deliveryman->status == 2) 
                                    <p class="btn btn-sm btn-success">Approved</p>
                                     @endif
                                   </td>
                               
                                 <th>Application Date</th>
                                  <td>:</td>
                                 <td>{{ $deliveryman->created_at }}</td>
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