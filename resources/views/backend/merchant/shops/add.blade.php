@extends('backend.merchant.layouts.master')
@section('title','Add New Shop')
@section('merchant_content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">New Shop</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">New Shop</li>
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
                     	 
 					<form action="{{ route('merchant.shop.store') }}" method="post">
                      @csrf


                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                 <input type="text" name="shop_name" value="{{ old('shop_name') }}" placeholder="Enter Shop Name" class="form-control">
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
                                <textarea name="shop_address" id=""   class="form-control" placeholder="Shop Address">{{ old('shop_address') }}</textarea>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <textarea name="pickup_address" id=""  class="form-control" placeholder="Pickup  Address">{{ old('pickup_address') }}</textarea>
                            </div>
                           </div>
                           
                           <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                
                                    <input type="text" class="form-control" value="{{ old('pickup_phone') }}" name="pickup_phone" placeholder="Pickup Phone Number">
                                </div>
                            </div>
                          <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                
                                    <input type="text" class="form-control" value="{{ old('shop_email') }}" name="shop_email" placeholder="Shop Email">
                                </div>
                            </div>

                  
                     
                        <a href="{{ route('merchant.shop.index') }}"  class="btn btn-secondary" >Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                      
                    </form>

               
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection