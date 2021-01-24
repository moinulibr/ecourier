@extends('backend.layouts.master')
@section('title','Weight List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Weight List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Weight</li>
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
                    <h4 class="card-title">Weight 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('weight.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Weight</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" placeholder="Enter Admin Name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-12">Calculation</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="calculation" placeholder="Enter Calculation" required="">
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
                                <th>Name</th>
                                <th>Calculation</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($weights as $weight)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   
                                   <td>{{ $weight->name }}</td>
                                   <td>{{ $weight->calculation }}</td>
                                    <td>
                                  
                                    <a href="{{ route('weight.destroy',$weight->id) }}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>



                        <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#new_area_{{ $weight->id }}"> <i class="fa fa-edit"></i>
                                               Edit
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="new_area_{{ $weight->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                   <form action="{{ route('weight.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Add New Weight</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">Name</label>
                                                                <div class="col-md-12">
                                                                  <input type="text" class="form-control" name="name" placeholder="Enter Admin Name" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">Calculation</label>
                                                                <div class="col-md-12">
                                                                  <input type="text" class="form-control" name="phone" placeholder="Enter Admin Mobile Number" required="">
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