@extends('backend.layouts.master')
@section('title','Branch Area List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Branch Area List</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Branch Area</li>
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
                        <ul class="nav nav-pills nav-justified bg-light" role="tablist">             
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#area_setting" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Area Setting</span> 
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#commission_setting" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Commission Setting</span> 
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="area_setting" role="tabpanel">
                              <h4 class="card-title">Branch Area
                              <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#new_branch">Add Branch Area</a>
                              </h4>

                          <!-- Modal -->
                          <div class="modal fade" id="new_branch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <form action="{{ route('branch.area.store') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                    
                                              <div class="modal-header">
                                                  <h4 class="modal-title" id="myModalLabel">Add New Branch Area</h4>
                                              </div>
                                              <div class="modal-body">
                                              <input type="hidden" name="branch_id" value="{{ Request::Segment(2) }}">
                                              <div class="form-group">
                                                  <label class="col-md-12">Area </label>
                                                  <div class="col-md-12">
                                                      <select name="area_id" class="form-control select2" required>
                                                        <option value="">Select Area</option>
                                                        @foreach($districts as $district)
                                                          <optgroup label="{{ $district->name }}">
                                                            @foreach($district->area as $value)
                                                              <option  value="{{ $value->id }}">{{ $value->area_name }}</option>
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

                    
                    <hr>

                    @if($areabranchcount>0)
                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Branch Name</th>
                                <th>Branch Area</th>
                                <th>Status</th>
                                <th>District</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                              @foreach($areabranches as $brancharea)

                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brancharea->branch->company_name }}</td>
                                <td>{{ $brancharea->area->area_name }}</td>
                                <td>{{ $brancharea->district->name }}</td>
                                
                                <td>
                                  @if($brancharea->status == 1)
                                  <p class="btn btn-primary btn-sm">Active</p>
                                  @elseif($brancharea->status == 0)
                                  <p class="btn btn-danger btn-sm">Deactive</p>
                                  @endif
                                </td>
                                <td>
                                  <a href="" data-toggle="modal" data-target="#edit_area_branch" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                  

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit_area_branch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <form action="{{ route('branch.area.update',$brancharea->id) }}" method="post" enctype="multipart/form-data">
                                              @csrf
                                         
                                                  <div class="modal-header">
                                                      <h4 class="modal-title" id="myModalLabel">Add New Branch Area</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                  <input type="hidden" name="branch_id" value="{{ Request::Segment(2) }}">
                                                  <div class="form-group">
                                                      <label class="col-md-12">Area </label>
                                                      <div class="col-md-12">
                                                          <select name="area_id" class="form-control select2" required>
                                                            <option value="">Select Area</option>
                                                            @foreach($districts as $district)
                                                              <optgroup label="{{ $district->name }}">
                                                                @foreach($district->area as $value)
                                                                  <option  {{ $brancharea->area_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
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
                                </td>
                              </tr>

                              @endforeach
                            </tbody>
                            </table>
                            @endif


                            </div>
                            <div class="tab-pane" id="commission_setting" role="tabpanel">
                                @if($branchcommissionscount>0)



                                <form action="{{ route('branch.commission.setting') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="row">
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Create and Pick Commission Type</label>
                                                <select name="create_and_pick_commission_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option {{ $branchcommissions->create_and_pick_commission_type_id == 1 ? 'selected' : '' }} value="1">Parcent</option>
                                                  <option {{ $branchcommissions->create_and_pick_commission_type_id == 2 ? 'selected' : '' }} value="2">Fixed</option>
                                                </select>
                                                <input type="hidden" name="branch_id" value="{{ Request::Segment(2) }}">                                                
                                              </div>
                                          </div>
                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Create and Pick Commission Amount</label>
                                                    <input type="text" name="create_and_pick_commission_amount" value="{{ $branchcommissions->create_and_pick_commission_amount }}" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>
                                           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Create Pick and Delivery Commision Type</label>
                                                <select name="create_pick_and_delivery_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option {{ $branchcommissions->create_pick_and_delivery_commision_type_id == 1 ? 'selected' : '' }} value="1">Parcent</option>
                                                  <option {{ $branchcommissions->create_pick_and_delivery_commision_type_id == 2 ? 'selected' : '' }} value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Create Pickup and Delivery Commission amount</label>
                                                    <input type="text" name="create_pick_and_delivery_commision_amount" value="{{ $branchcommissions->create_pick_and_delivery_commision_amount }}" class="form-control" placeholder="amount" >
                                                </div>
                                           </div> 

                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Receive and Delivery Commision Type</label>
                                                <select name="receive_and_delivery_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option {{ $branchcommissions->receive_and_delivery_commision_type_id == 1 ? 'selected' : '' }} value="1">Parcent</option>
                                                  <option {{ $branchcommissions->receive_and_delivery_commision_type_id == 2 ? 'selected' : '' }} value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Receive and Delivery Commission Amount</label>
                                                    <input type="text" name="receive_and_delivery_commision_amount"  value="{{ $branchcommissions->receive_and_delivery_commision_amount }}" class="form-control" placeholder="amount" >
                                                </div>
                                           </div> 


                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Receive as Media Commision Type</label>
                                                <select name="receive_as_media_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                   <option {{ $branchcommissions->receive_as_media_commision_type_id == 1 ? 'selected' : '' }} value="1">Parcent</option>
                                                  <option {{ $branchcommissions->receive_as_media_commision_type_id == 2 ? 'selected' : '' }} value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Receive as Media Commission Amount</label>
                                                    <input type="text" name="receive_as_media_commision_amount" value="{{ $branchcommissions->receive_as_media_commision_amount }}" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Sending as Media Commision Type</label>
                                                <select name="sending_as_media_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option {{ $branchcommissions->sending_as_media_commision_type_id == 1 ? 'selected' : '' }} value="1">Parcent</option>
                                                  <option {{ $branchcommissions->sending_as_media_commision_type_id == 2 ? 'selected' : '' }} value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>


                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Sending as Media Commision Amount</label>
                                                    <input type="text" name="sending_as_media_commision_amount"  value="{{ $branchcommissions->sending_as_media_commision_amount }}" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>
                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="form-control">
                                                  <option value="">Status</option>
                                                  <option {{ $branchcommissions->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                                  <option {{ $branchcommissions->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                              </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>

                                      </div> {{-- row end --}}
                                 
                                @else
                                  <form action="{{ route('branch.commission.setting') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="row">
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Create and Pick Commission Type</label>
                                                <select name="create_and_pick_commission_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option value="1">Parcent</option>
                                                  <option value="2">Fixed</option>
                                                </select>
                                                <input type="hidden" name="branch_id" value="{{ Request::Segment(2) }}">
                                                
                                              </div>
                                          </div>
                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Create and Pick Commission Amount</label>
                                                    <input type="text" name="create_and_pick_commission_amount" value="" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>

                                           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Create Pick and Delivery Commision Type</label>
                                                <select name="create_pick_and_delivery_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option value="1">Parcent</option>
                                                  <option value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Create Pick and Delivery Commission Amount</label>
                                                    <input type="text" name="create_pick_and_delivery_commision_amount" value="" class="form-control" placeholder="amount" >
                                                </div>
                                           </div> 

                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Receive and Delivery Commision Type</label>
                                                <select name="receive_and_delivery_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option value="1">Parcent</option>
                                                  <option value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Receive and Delivery Commision Amount</label>
                                                    <input type="text" name="receive_and_delivery_commision_amount" value="" class="form-control" placeholder="amount" >
                                                </div>
                                           </div> 


                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Receive as Media Commision Type</label>
                                                <select name="receive_as_media_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option value="1">Parcent</option>
                                                  <option value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Receive as Media Commission Amount</label>
                                                    <input type="text" name="receive_as_media_commision_amount" value="" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>
                                          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Sending as Media Commision Type</label>
                                                <select name="sending_as_media_commision_type_id" id="" class="form-control">
                                                  <option>Select Type</option>
                                                  <option value="1">Parcent</option>
                                                  <option value="2">Fixed</option>
                                                </select>
                                              </div>
                                          </div>


                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                <div class="form-group">
                                                  <label for="">Sending as Media Commision Amount</label>
                                                    <input type="text" name="sending_as_media_commision_amount" value="" class="form-control" placeholder="amount" >
                                                </div>
                                           </div>
                                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                              <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="form-control">
                                                  <option value="">Status</option>
                                                  <option value="1">Active</option>
                                                  <option value="0">Inactive</option>
                                                </select>
                                              </div>
                                          </div>


                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>


                                      </div> {{-- row end --}}
                                @endif

                            </div>
                        </div>


                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection