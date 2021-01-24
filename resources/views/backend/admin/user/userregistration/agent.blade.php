@extends('backend.layouts.master')
@section('title','Agent Application List')
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
                    <h4 class="card-title">Agent Application List   </h4>
                    
                 
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Area</th>
                                <th>Office Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($agents as $agent)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                  <td>{{  $agent->name }}</td>
                                  <td>{{  $agent->company_name }}</td>
                                   <td>{{ $agent->mobile }}</td>
                                   <td>{{ $agent->email }}</td>
                                   <td>{{ $agent->area->area_name }}</td>
                                
                                   <td>{{ $agent->office_address }}</td>
                                  <td>
                                     @if($agent->status == 1)
                                     <p class="btn btn-sm btn-warning">New Register</p>
                                     @elseif($agent->status ==2) 
                                    <p class="btn btn-sm btn-success">Approved</p>
                                     @endif
                                   </td>
                                   <td>
                                     <a href="" class="btn btn-sm btn-primary">Accepted</a>
                                     <a href="{{ route('agent.registration.show',$agent->id) }}" class="btn btn-primary">Show Application</a>
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