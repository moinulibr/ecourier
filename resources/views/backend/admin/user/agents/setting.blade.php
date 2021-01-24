@extends('backend.layouts.master')
@section('title','Agent Setting')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Agent Setting</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Agent</li>
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
                      <h4 class="card-title">Agent Setting</h4>
                          <hr>
                                         
                            <div class="row">
                                 <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <!-- Nav tabs -->
                                              <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                                                  
                                                  <li class="nav-item waves-effect waves-light">
                                                      <a class="nav-link active" data-toggle="tab" href="#shop_setting" role="tab" aria-selected="true">
                                                          <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                          <span class="d-none d-sm-block">Area Setting</span> 
                                                      </a>
                                                  </li>
                                                  <li class="nav-item waves-effect waves-light">
                                                      <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">
                                                          <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                          <span class="d-none d-sm-block">Commission</span> 
                                                      </a>
                                                  </li>
                                                  <li class="nav-item waves-effect waves-light">
                                                      <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">
                                                          <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                          <span class="d-none d-sm-block">Settings</span>   
                                                      </a>
                                                  </li>
                                                  <li class="nav-item waves-effect waves-light">
                                                      <a class="nav-link " data-toggle="tab" href="#payment" role="tab" aria-selected="false">
                                                          <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                          <span class="d-none d-sm-block">Payment Information</span>    
                                                      </a>
                                                  </li>
                                                   
                                                  
                                              </ul>

                                              <!-- Tab panes -->
                                              <div class="tab-content p-3 text-muted">
                                                  <div class="tab-pane active" id="shop_setting" role="tabpanel">
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
                                                                      <form action="{{ route('agent.area.store') }}" method="post">
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
                                                                          @foreach($agentareas as $area)
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
                                                                                     
                                                                                     <a href="{{ route('agent.area.destroy',$area->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                               
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                          </div>
                                                        </div>
                                                  </div>
                                                  <div class="tab-pane" id="profile" role="tabpanel">
                                                        <form action="{{ route('agent.commission.setting') }}" method="post">
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
                                                  <div class="tab-pane" id="settings" role="tabpanel">

                                                    <form action="{{ route('agent.setting.update',$merchant_setting->id) }}" method="post" enctype="multipart/form-data">
                                                      @csrf
                                                    
                                                      <div class="row">
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <label>Company Name</label>
                                                                <input type="text" name="company_name" value="{{ $merchant_setting->company_name }}" class="form-control" placeholder="Company Name" >
                                                              </div>
                                                          </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <label>Company Phone</label>
                                                                      <input type="text" name="company_phone" value="{{ $merchant_setting->company_phone }}" class="form-control" placeholder="Company Mobile Number" >
                                                                  </div>
                                                           </div>
                                                        
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                   <div class="form-group">
                                                                       <label for="">Delivery Charge Activate</label> <br>
                                                                       <input type="radio" value="1" name="delivery_charge_activate" @if($merchant_setting->delivery_charge_activate == 1)checked @endif>  Active
                                                                       <input type="radio" value="0" name="delivery_charge_activate" @if($merchant_setting->delivery_charge_activate == 0)checked @endif> Deactive
                                                                  </div>
                                                           </div>
                                                                 
                                                            
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <label>Delivery Charge Same City</label>
                                                                      <input type="text" name="delivery_charge_same_city" value="{{ $merchant_setting->delivery_charge_same_city }}" class="form-control" placeholder="Same City Deilvery Charge" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>Delivery Charge out Of City</label>
                                                                      <input type="text" name="delivery_charge_out_of_city" value="{{ $merchant_setting->delivery_charge_out_of_city }}" class="form-control" placeholder="Out Off city Deliery Charge" >
                                                                  </div>
                                                           </div>
                                                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <label>Delivery Charge Other City</label>
                                                                      <input type="text" name="delivery_charge_other_city" value="{{ $merchant_setting->delivery_charge_other_city }}" class="form-control" placeholder="Others City Deliery Charge" >
                                                                  </div>
                                                           </div>
                                                           
                                                           
                                                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                   <div class="form-group">
                                                                       <label for="">Return Charge Activate</label> <br>
                                                                       <input type="radio" value="1" name="return_charge_activate" @if($merchant_setting->return_charge_activate == 1)checked @endif> Active
                                                                       <input type="radio" value="0" name="return_charge_activate" @if($merchant_setting->return_charge_activate == 0)checked @endif> Deactive
                                                                  </div>
                                                           </div>
                                                                 
                                                            
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>Return charge Same City</label>
                                                                      <input type="text" name="return_charge_same_city" value="{{ $merchant_setting->return_charge_same_city }}" class="form-control" placeholder="Return Charge Same City" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>Return Charge Out Of City</label>
                                                                      <input type="text" name="return_charge_out_of_city" value="{{ $merchant_setting->return_charge_out_of_city }}" class="form-control" placeholder="Return Charge OutOff City" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>Return Charge other City</label>
                                                                      <input type="text" name="return_charge_other_city" value="{{ $merchant_setting->return_charge_other_city }}" class="form-control" placeholder="Return Charge Other City" >
                                                                  </div>
                                                           </div>
                                                           
                                                           
                                                           
                                                           
                                                           
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                                  <div class="form-group">
                                                                       <label for="">COD Charge Activate</label> <br>
                                                                       <input type="radio" value="1" name="cod_charge_activate" @if($merchant_setting->cod_charge_activate == 1) checked @endif> Active
                                                                       <input type="radio" value="0" name="cod_charge_activate" @if($merchant_setting->cod_charge_activate == 0) checked @endif> Deactive
                                                                  </div>
                                                           </div>
                                                           
                                                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                                  <div class="form-group">
                                                                        <select name="cod_charge_type" id="" class="form-control">
                                                                            <option value="">Select COD Type</option>
                                                                            <option {{ $merchant_setting->cod_charge_type == 'fixed' ? 'selected' : '' }} value="fixed">Fixed</option>
                                                                            <option {{ $merchant_setting->cod_charge_type == 'percent' ? 'selected' : '' }} value="percent">Percentage</option>
                                                                        </select>
                                                                  </div>
                                                           </div>
                                                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>COD charge Same City</label>
                                                                     <input type="text" name="cod_charge_same_city" value="{{ $merchant_setting->cod_charge_same_city }}" class="form-control" placeholder="COD Charge Same City">
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>COD Charge Out of CIty</label>
                                                                     <input type="text" name="cod_charge_out_of_city" value="{{ $merchant_setting->cod_charge_out_of_city }}" class="form-control" placeholder="COD Charge Out off City">
                                                                  </div>
                                                           </div> 
                                                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>COD charge Other City</label>
                                                                     <input type="text" name="cod_charge_other_city" value="{{ $merchant_setting->cod_charge_other_city }}" class="form-control" placeholder="COD Charge Other City">
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                    <label>Other Charge</label>
                                                                     <input type="text" name="others_charge" value="{{ $merchant_setting->others_charge }}" class="form-control" placeholder="Others Charge">
                                                                  </div>
                                                           </div> 
                                                                
                                                                
                                                                 
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <input type="text" name="rca_order_return_parcent" value="{{ $merchant_setting->rca_order_return_parcent }}" class="form-control" placeholder="rca_order_return_parcent">
                                                                  </div>
                                                           </div> 
                                                           
                                                           
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <input type="text" name="rca_order_return_parcent" value="{{ $merchant_setting->rca_order_return_parcent }}" class="form-control" placeholder="Return Parcent">
                                                                  </div>
                                                           </div>
                                                           
                                                           
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                   <div class="form-group">
                                                                       <label for="">Payment Receive Confirmation</label> <br>
                                                                       <input type="radio" value="1" name="payment_receive_confirmation" @if($merchant_setting->payment_receive_confirmation == 1) checked @endif> Active
                                                                       <input type="radio" value="0" name="payment_receive_confirmation" @if($merchant_setting->payment_receive_confirmation == 0) checked @endif> Deactive
                                                                  </div>
                                                           </div>
                                                         
                                                         
                                                            
                                                           
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                   <select name="area_id" class="form-control select2">
                                                                      <option value="">Select Area</option>
                                                                      @foreach($districts as $district)
                                                                        <optgroup label="{{ $district->name }}">
                                                                          @foreach($district->area as $value)
                                                                            <option {{ $merchant_setting->area_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                                          @endforeach
                                                                        </optgroup>
                                                                      @endforeach

                                                                    </select>
                                                              </div>
                                                           </div>
                                                             
                                                             
                                                             
                                                            
                                                            
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <input type="text" class="form-control" value="{{ $merchant_setting->fb_fan_page }}" name="fb_fan_page" placeholder="Facebook Page link">
                                                                  </div>
                                                              </div>
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <label for="">Website Link</label>
                                                                      <input type="text" class="form-control" value="{{ $merchant_setting->website }}" name="website" placeholder="Website">
                                                                  </div>
                                                            </div> 
                                                           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <label for="">Address</label>
                                                                      <input type="text" class="form-control" value="{{ $merchant_setting->address }}" name="address" placeholder="Address">
                                                                  </div>
                                                            </div>


                                                                  
                                                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <label for="">Company logo</label>
                                                                      
                                                                      <img src="{{ asset($merchant_setting->company_logo) }}" alt="company logo" width="200">
                                                                      
                                                                      <input type="file" class="form-control" value="" name="company_logo" placeholder="Company Logo">
                                                                  </div>
                                                               </div>

                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                  <div class="form-group">
                                                                       <button type="submit" class="btn btn-primary">Update</button>
                                                                  </div>
                                                            </div>
                                                        </div>

                                                   </form>
                                          
                                                  </div>
                                                  <div class="tab-pane " id="payment" role="tabpanel">
                                                         
                                                  </div>
                                              </div>

                                          </div>
                                      </div>
                                  </div>     
                            </div>
                      </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection