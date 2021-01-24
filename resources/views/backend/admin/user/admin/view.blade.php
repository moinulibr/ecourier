@extends('backend.layouts.master')
@section('title','Admin List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Admin List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                    <h4 class="card-title">Admin 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Admin</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" placeholder="Enter Admin Name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Mobile Number</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="phone" placeholder="Enter Admin Mobile Number" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                              <input type="email" class="form-control" name="email" placeholder="Enter Admin Email address" required="">
                                            </div>
                                         </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                              <input type="password" class="form-control" name="password" placeholder="Enter Admin Password" required="">
                                            </div>
                                         </div> 


                                        <div class="form-group">
                                            <label for="" class="col-md-12">User Type</label>
                                            <div class="col-md-12">
                                              <select name="role_id" id="" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Admin</option>
                                              </select>
                                            </div>
                                         </div> 

                                          <div class="form-group">
                                            <label for="" class="col-md-12">Branch</label>
                                            <div class="col-md-12">
                                              <select name="branch_id" class="form-control">
                                                <option value="">Select Branch</option>
                                                @foreach($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->company_name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                         </div> 


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                    </h4>
                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>branch</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($admins as $admin)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $admin->useruid }}</td>
                                   <td>{{ $admin->name }}</td>
                                   <td>{{ $admin->phone }}</td>
                                   <td>{{ $admin->email }}</td>
                                   <td>{{ $admin->branch_id }}</td>
                                   <td>
                                     @if($admin->role_id == 1)
                                     <p class="btn btn-sm btn-primary">Super Admin</p>
                                     @elseif($admin->role_id ==2) 
                                    <p class="btn btn-sm btn-success">Admin</p>
                                     @endif
                                   </td>
                                  <td>
                                       
                                       <a href="{{ route('admin.destroy',$admin->id) }}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>



                        <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#new_area_{{ $admin->id }}"> <i class="fa fa-edit"></i>
                                               Edit
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="new_area_{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <form action="{{ url('area/store') }}" method="post">
                                                        @csrf
                                                   
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add New Area</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                          <label for="" class="col-md-12">Area Name English</label>
                                                          <div class="col-md-12">
                                                            <input type="text" class="form-control" name="area_eng" value="{{ $admin->area_name }}" placeholder="Area Name English" required="">
                                                          </div>
                                                       </div>

                                                       <div class="form-group">
                                                          <label for="" class="col-md-12">Area Name Bangla</label>
                                                          <div class="col-md-12">
                                                            <input type="text" class="form-control" name="area_bn" value="{{ $admin->area_name_bn }}" placeholder="Area Name Bangla" required="">
                                                          </div>
                                                       </div> 
  
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Save Update</button>
                                                    </div>
                                                  </form>
                                                  </div>
                                                </div>
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