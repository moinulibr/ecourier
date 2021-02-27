@extends('backend.layouts.master')
@section('title','Branch List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Branch List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Branch</li>
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
                    <h4 class="card-title">Branch

                    <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#new_branch">Create Branch</a>
                    </h4>



                    <!-- Modal -->
                    <div class="modal fade" id="new_branch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Create New Branch</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Branch Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" placeholder="Enter Branch Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Branch Type</label>
                                            <div class="col-md-12">
                                                 <select class="form-control" name="branch_type_id" required>
                                                     <option value="">Select Type</option>
                                                     @foreach($branchtypes as $type)
                                                     <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                     @endforeach
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Area </label>
                                            <div class="col-md-12">
                                                <select name="area_id" class="form-control select2" required>
                                                  <option value="">Select Area</option>
                                                  @foreach($districts as $district)
                                                    <optgroup label="{{ $district->name }}">
                                                      @foreach($district->area as $value)
                                                        <option {{ $type->area_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                      @endforeach
                                                    </optgroup>
                                                  @endforeach

                                                </select> 
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-md-12">Branch </label>
                                            <div class="col-md-12">
                                                <select name="parent_id" class="form-control select2" required>
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

                    
                    <hr>
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Branch Type</th>
                                <th>Branch Area</th>
                                <th>Branch District</th>
                                <th>Under Branch</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach($branches as $branch)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $branch->company_name }}</td>
                                   <td>{{ $branch->branchtype->name }}</td>
                                   <td>{{ $branch->area->area_name }}</td>
                                   <td>{{ $branch->district->name }}</td>
                                   <td>{{ $branch->underbranch->company_name }}</td>
                                   <td>
                                        @if($branch->status ==1)
                                        <p class="btn btn-sm btn-primary">Active</p>
                                        @else
                                        <p class="btn btn-sm btn-danger">Deactive</p>
                                        @endif
                                   </td>

                                   <td>   
                                    <a href="{{ route('branch.setting',$branch->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-cogs"></i> Setting</a>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_branch_{{ $branch->id }}"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="{{ route('branch.destroy',$branch->id) }}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>




 <!-- Modal -->
                    <div class="modal fade" id="edit_branch_{{ $branch->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('branch.update',$branch->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Create New Branch</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Branch Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" value="{{ $branch->company_name }}" placeholder="Enter Branch Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Branch Type</label>
                                            <div class="col-md-12">
                                                 <select class="form-control" name="branch_type_id" required>
                                                     <option value="">Select Type</option>
                                                     @foreach($branchtypes as $type)
                                                     <option {{ $branch->branch_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                     @endforeach
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Area </label>
                                            <div class="col-md-12">
                                                <select name="area_id" class="form-control select2" required>
                                                  <option value="">Select Area</option>
                                                  @foreach($districts as $district)
                                                    <optgroup label="{{ $district->name }}">
                                                      @foreach($district->area as $value)
                                                        <option {{ $branch->area_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                      @endforeach
                                                    </optgroup>
                                                  @endforeach

                                                </select> 
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-md-12">Branch </label>
                                            <div class="col-md-12">
                                                <select name="parent_id" class="form-control select2" required>
                                                  <option value="">Select Branch</option>
                                                  @foreach($branches as $branched)
                                                     <option {{ $branch->parent_id == $branched->id ? 'selected' : '' }} }} value="{{ $branched->id }}">{{ $branched->company_name }}</option>
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