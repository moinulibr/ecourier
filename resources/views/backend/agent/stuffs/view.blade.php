@extends('backend.layouts.master')
@section('title','Delivery Man List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Delivery Man List</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Delivery Man</li>
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
                    <h4 class="card-title">Delivery Man 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('agent.stuff.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Delivery Man</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Mobile Number</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                              <input type="email" class="form-control" name="email" placeholder="Enter Email address">
                                            </div>
                                         </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                              <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                                            </div>
                                         </div>
                                          <div class="form-group">
                                             <label for="" class="col-md-12">Area</label>
                                             <div class="col-md-12">
                                               <select name="area_id" class="form-control select2">
                                                  <option value="">Select Area</option>
                                                  @foreach($districts as $district)
                                                    <optgroup label="{{ $district->name }}">
                                                      @foreach($district->area as $value)
                                                        <option value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                      @endforeach
                                                    </optgroup>
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
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($stuffs as $deliveryman)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $deliveryman->useruid }}</td>
                                   <td>{{ $deliveryman->name }}</td>
                                   <td>{{ $deliveryman->phone }}</td>
                                   <td>{{ $deliveryman->email }}</td>
                                   <td>{{ $deliveryman->created_at->format('M d,Y') }}</td>
                                  
                                    
                                  <td>
                                      
                                       <a href="{{ route('agent.stuff.destroy',$deliveryman->id) }}" class="btn btn-danger btn-sm" id="delete"> 
                                          <i class="fa fa-trash"></i> Delete
                                       </a>
 
                       
                                              <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#new_{{ $deliveryman->id }}"> <i class="fa fa-edit"></i>
                                               Edit
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="new_{{ $deliveryman->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                         <form action="{{ route('agent.stuff.update',$deliveryman->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                       
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Edit Delivery Man</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Name</label>
                                                                    <div class="col-md-12">
                                                                      <input type="text" class="form-control" name="name" value="{{ $deliveryman->name }}" placeholder="Enter Name" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Mobile Number</label>
                                                                    <div class="col-md-12">
                                                                      <input type="text" class="form-control" value="{{ $deliveryman->phone }}" name="phone" placeholder="Enter Mobile Number" required="">
                                                                    </div>
                                                                </div> 

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Email</label>
                                                                    <div class="col-md-12">
                                                                      <input type="email" class="form-control" value="{{ $deliveryman->email }}" name="email" placeholder="Enter Email address">
                                                                    </div>
                                                                 </div> 

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Password</label>
                                                                    <div class="col-md-12">
                                                                      <input type="password" class="form-control" name="password" placeholder="Enter Password">
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