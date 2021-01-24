@extends('backend.layouts.master')
@section('title','Delivery Man')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Delivery Man</h4>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Delivery Man Setting</h4>
                <hr>
                 
                <div class="row">
                  
                  
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                                
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-toggle="tab" href="#area_setting" role="tab" aria-selected="true">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Area Setting</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#comission_setting" role="tab" aria-selected="false">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Commission Setting</span> 
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#personal_information" role="tab" aria-selected="false">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Personal Informations</span>   
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="area_setting" role="tabpanel">
                                  <div class="row">
                                      <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="table-responsive">
                                               <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#new_area"> 
                                                <i class="fa fa-plus"></i> Add New Area
                                              </a>


                                            <!-- Modal -->
                                            <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <form action="{{ route('deliveryman.area.store') }}" method="post">
                                                    @csrf
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add New Area to Delivery Man</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                        <div class="col-xs-12 col-sm-12 col-lg-12">
                                                            <div class="form-group">
                                                                 <input type="hidden" name="manpower_id" value="{{ Request::Segment(2) }}">
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

                                                            <div class="form-group">
                                                                  <select name="manpower_type_id" class="form-control select2">
                                                                    <option value="">Select Type</option>
                                                                    @foreach($manpowerstypes as $manpowerstype)
                                                                    
                                                                    <option value="{{ $manpowerstype->id }}">{{ $manpowerstype->name }}</option>
                                                                    @endforeach

                                                                  </select>
                                                            </div>
                                                         </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>




























                                                    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Area</th>
                                                            <th>District</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>Created at</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                      @foreach($deliverymanareas as $area)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $area->area->area_name }}</td>
                                                            <td>{{ $area->district->name }}</td>
                                                            <td>{{ $area->manpowertype->name }}</td>
                                                            <td>
                                                              @if($area->status==1)
                                                               <p class="btn btn-success btn-sm">Active</p>
                                                              @else
                                                               <p class="btn btn-danger btn-sm">Deactive</p>
                                                              @endif
                                                            </td>

                                                            <td>{{ $area->created_at }}</td>
                                                            <td>
                                                                 
                                                                 <a href="{{ route('deliveryman.area.destroy',$area->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                           
                                                    </tbody>
                                                </table>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane" id="comission_setting" role="tabpanel">
                                    <form action="{{ route('deliveryman.commission.setting') }}" method="post">
                                      @csrf

                                       <div class="row">
                                                                <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <input type="hidden" name="manpower_id" value="{{ Request::Segment(2) }}">
                                                                    <label>Agent Type</label>
                                                                    <select name="manpower_type_id" id="" class="form-control">
                                                                       <option value="">Select Man Power Type</option>
                                                                       @foreach($manpowerstypes as $type)
                                                                          <option {{ $mpcsetting->manpower_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                                       @endforeach
                                                                    </select>
                                                                  </div>
                                                              </div> 

                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Branch Type</label>
                                                                    <select name="branch_type_id" id="" class="form-control">
                                                                       <option value="">Select Branch Type</option>
                                                                       @foreach($branch_typies as $branchtype)
                                                                          <option {{ $mpcsetting->branch_type_id == $branchtype->id ? 'selected' : '' }} value="{{ $branchtype->id }}">{{ $branchtype->name }}</option>
                                                                       @endforeach
                                                                    </select>
                                                                  </div>
                                                              </div>

                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Pickup Commission Type</label>
                                                                    <select name="pickup_commission_type_id" id="" class="form-control">
                                                                       <option value="">Select Pickup Commission Type</option>
                                                                        <option {{ $mpcsetting->pickup_commission_type_id ==  1 ? 'selected' : '' }} value="1">Percentage</option>
                                                                        <option {{ $mpcsetting->pickup_commission_type_id ==  2 ? 'selected' : '' }} value="2">Fixed</option>
                                                                    </select>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Pickup Commission Amount</label>
                                                                      <input type="text" name="pickup_commission_amount" value="{{ $mpcsetting->pickup_commission_amount }}" class="form-control" placeholder="Pickup Commission Amount">
                                                                  </div>
                                                              </div>

                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>delivery Commission Type</label>
                                                                    <select name="delivery_commission_type_id" id="" class="form-control">
                                                                       <option value="">Select Delivery Commission Type</option>
                                                                         <option {{ $mpcsetting->delivery_commission_type_id ==  1 ? 'selected' : '' }} value="1">Percentage</option>
                                                                        <option {{ $mpcsetting->delivery_commission_type_id ==  2 ? 'selected' : '' }} value="2">Fixed</option>
                                                                    </select>
                                                                  </div>
                                                              </div>

                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Delivery Commission Amount</label>
                                                                      <input type="text" name="delivery_commission_amount" value="{{ $mpcsetting->delivery_commission_amount }}" class="form-control" placeholder="Delivery Commission Amount">
                                                                  </div>
                                                              </div>




                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Return Commission commission Type</label>
                                                                    <select name="return_commission_type_id" id="" class="form-control">
                                                                       <option value="">Select Return Commission Type</option>
                                                                       <option {{ $mpcsetting->return_commission_type_id ==  1 ? 'selected' : '' }} value="1">Percentage</option>
                                                                        <option {{ $mpcsetting->return_commission_type_id ==  2 ? 'selected' : '' }} value="2">Fixed</option>
                                                                    </select>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                   <div class="form-group">
                                                                      <label>Return Commission Amount</label>
                                                                      <input type="text" name="return_commission_amount_amount" value="{{ $mpcsetting->return_commission_amount_amount  }}" class="form-control" placeholder="Return Commission Amount">
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                       <option value="">Select Status</option>
                                                                        <option {{ $mpcsetting->status ==  1 ? 'selected' : '' }} value="1">Active</option>
                                                                        <option {{ $mpcsetting->status ==  0 ? 'selected' : '' }} value="0">Deactive</option>
                                                                    </select>
                                                                  </div>
                                                              </div>

                                                             

                                          <div class="col-md-12">
                                               <div class="form-group">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                                              </div>
                                          </div>
                                      </div>  
                                    </form>
                                       

                                  </div>
                                   
                                  <div class="tab-pane" id="personal_information" role="tabpanel">
                                      <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
                                          <h4>{{ $deliverymaninfo->name }}</h4>
                                         
                                         <p>{{ $deliverymaninfo->phone }} <br> {{ $deliverymaninfo->email }}</p>
                                         <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#edit_profile"><i class="fa fa-edit"> </i></button>


                                            <!-- Modal -->
                                            <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <form action="{{ route('deliveryman.profile.update') }}" method="post">
                                                    @csrf
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Delivery Man Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                        <div class="col-xs-12 col-sm-12 col-lg-12">
                                                            <div class="form-group">
                                                                <input type="hidden" name="user_id" value="{{ Request::Segment(2) }}">
                                                                <input type="text" name="name" class="form-control" value="{{ $deliverymaninfo->name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                 <input type="text" name="phone" class="form-control" value="{{ $deliverymaninfo->phone }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                 <input type="text" name="email" class="form-control" value="{{ $deliverymaninfo->email }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <input type="password" name="password" class="form-control" value="" placeholder="Enter new password">
                                                            </div>



                                                         </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>

                                      </div>

                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>  
                  
                 </div>

             </div>
        </div>
    </div>
</div>


@endsection