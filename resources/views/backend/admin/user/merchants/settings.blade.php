@extends('backend.layouts.master')
@section('title','Merchant Setting')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Merchant Setting</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
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
                      <h4 class="card-title">Merchant Setting</h4>
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
                                                          <span class="d-none d-sm-block">Shop Setting</span> 
                                                      </a>
                                                  </li>
                                                  <li class="nav-item waves-effect waves-light">
                                                      <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">
                                                          <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                          <span class="d-none d-sm-block">Profile</span> 
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
                                                      
                                                      @foreach($shopes as $shop)  
                                                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
                                                             <br>
                                                             <h4>{{ $shop->shop_name }}</h4>
                                                             <p> {{ $shop->shop_address }}<br> {{ $shop->pickup_phone }}</p>
                                                             <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#edit_shop_{{ $shop->id }}"><i class="fa fa-edit"> </i></button>
                                                        </div> 

                                            {{--                       edit shop --}}
                                                   
                                                        <div class="modal fade" id="edit_shop_{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <form action="{{ route('merchant.shop.update',$shop->id) }}" method="post">
                                                              @csrf
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Shop</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  

                                                                 <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <input type="text" name="shop_name" class="form-control" value="{{ $shop->shop_name }}" placeholder="Shop Name" >
                                                                            <input type="hidden" name="merchant_id" value="{{ Request::segment(2) }}">
                                                                        </div>
                                                                 </div>
                                                                 
                                                                   <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                      <div class="form-group">
                                                                           <select name="area_id" class="form-control select2">
                                                                              <option value="">Select Area</option>
                                                                              @foreach($districts as $district)
                                                                                <optgroup label="{{ $district->name }}">
                                                                                  @foreach($district->area as $value)
                                                                                    <option {{ $shop->area_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                                                  @endforeach
                                                                                </optgroup>
                                                                              @endforeach

                                                                            </select>
                                                                      </div>
                                                                   </div>
                                                                   
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <textarea name="shop_address" id=""  class="form-control" placeholder="Shop Address">{{ $shop->shop_address }}</textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <textarea name="pickup_address" id=""  class="form-control" placeholder="Pickup  Address">{{ $shop->pickup_address }}</textarea>
                                                                    </div>
                                                                   </div>
                                                                   
                                                                   <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="text" class="form-control" value="{{ $shop->pickup_phone }}" name="pickup_phone" placeholder="Pickup Phone Number">
                                                                        </div>
                                                                    </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="text" class="form-control" value="{{ $shop->shop_email }}" name="shop_email" placeholder="Shop Email">
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
 
                                                      @endforeach
                                                


                                    {{--  for new shop entry --}}        
                                                            
                                                        <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
                                                          <a href="" data-toggle="modal" data-target="#new_shop">
                                                            <div class="jumbotron text-center">
                                                                <i class="fa fa-plus"></i>
                                                                <h4>Create New Shop</h4>
                                                            </div>
                                                          </a>
 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="new_shop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <form action="{{ route('merchant.shop.store') }}" method="post">
                                                              @csrf
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Create New Shop</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  

                                                                 <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <input type="text" name="shop_name" class="form-control" placeholder="Shop Name" >
                                                                            <input type="hidden" name="merchant_id" value="{{ Request::segment(2) }}">
                                                                        </div>
                                                                 </div>
                                                                 
                                                                   <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                      <div class="form-group">
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
                                                                   
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <textarea name="shop_address" id=""  class="form-control" placeholder="Shop Address"></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <textarea name="pickup_address" id=""  class="form-control" placeholder="Pickup  Address"></textarea>
                                                                    </div>
                                                                   </div>
                                                                   
                                                                   <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="text" class="form-control" value="" name="pickup_phone" placeholder="Pickup Phone Number">
                                                                        </div>
                                                                    </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="text" class="form-control" value="" name="shop_email" placeholder="Shop Email">
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

                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="tab-pane" id="profile" role="tabpanel">
                                                       <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4">
                                                          <h4>{{ $merchantinfo->name }}</h4>
                                                          <p>{{ $merchantinfo->phone }} <br>{{ $merchantinfo->email }}</p>
                                                         <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#edit_profile_{{ $merchantinfo->id }}" ><i class="fa fa-edit"> </i></button>
                                                      </div>


                                                      {{-- merchant profile edit  --}}

                                                           <div class="modal fade" id="edit_profile_{{ $merchantinfo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <form action="{{ route('merchant.profile.update',$merchantinfo->id) }}" method="post">
                                                              @csrf
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Merchant Profile</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  
                                                                   
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" value="{{ $merchantinfo->name }}" placeholder="Merchant Name">
                                                                    </div>
                                                                  </div>
                                                                  
                                                                   
                                                                   <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                          <input type="text" name="phone"  class="form-control" value="{{ $merchantinfo->phone }}" placeholder="Merchant Phone Number">
                                                                        </div>
                                                                    </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="email" class="form-control" value="{{ $merchantinfo->email }}" name="email" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                  <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <input type="password" class="form-control" value="" name="password" placeholder="Enter New Password">
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



                                                      {{-- merchant profile edit  end --}}

 

                                                  </div>
                                                  <div class="tab-pane" id="settings" role="tabpanel">

                                                    <form action="{{ route('merchant.setting.update',$merchant_setting->id) }}" method="post" enctype="multipart/form-data">
                                                      @csrf
                                                    
                                                      <div class="row">
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                              <div class="form-group">
                                                                <input type="text" name="company_name" value="{{ $merchant_setting->company_name }}" class="form-control" placeholder="Company Name" >
                                                              </div>
                                                          </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
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
                                                                      <input type="text" name="delivery_charge_same_city" value="{{ $merchant_setting->delivery_charge_same_city }}" class="form-control" placeholder="Same City Deilvery Charge" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <input type="text" name="delivery_charge_out_of_city" value="{{ $merchant_setting->delivery_charge_out_of_city }}" class="form-control" placeholder="Out Off city Deliery Charge" >
                                                                  </div>
                                                           </div>
                                                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
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
                                                                      <input type="text" name="return_charge_same_city" value="{{ $merchant_setting->return_charge_same_city }}" class="form-control" placeholder="Return Charge Same City" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                      <input type="text" name="return_charge_out_of_city" value="{{ $merchant_setting->return_charge_out_of_city }}" class="form-control" placeholder="Return Charge OutOff City" >
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
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
                                                                     <input type="text" name="cod_charge_same_city" value="{{ $merchant_setting->cod_charge_same_city }}" class="form-control" placeholder="COD Charge Same City">
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <input type="text" name="cod_charge_out_of_city" value="{{ $merchant_setting->cod_charge_out_of_city }}" class="form-control" placeholder="COD Charge Out off City">
                                                                  </div>
                                                           </div> 
                                                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
                                                                     <input type="text" name="cod_charge_other_city" value="{{ $merchant_setting->cod_charge_other_city }}" class="form-control" placeholder="COD Charge Other City">
                                                                  </div>
                                                           </div>
                                                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                                  <div class="form-group">
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