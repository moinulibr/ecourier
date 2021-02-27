@extends('backend.layouts.master')
@section('title','Service Charge Setting')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Service Charge Setting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Service Charge Setting</li>
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
                    <h4 class="card-title">Service Charge Setting 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('service.charge.setting.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Delivery Charge Setting</h4>
                                        </div>
                                        <div class="modal-body">


                                         <div class="form-group">
                                            <label for="" class="col-md-12">Parcel Type</label>
                                            <div class="col-md-12">
                                              <select name="parcel_type_id" id="" class="form-control">
                                                <option value="">Select Parcel Type</option>
                                                @foreach($parceltypies as $parceltype)
                                                <option value="{{ $parceltype->id }}">{{ $parceltype->name }}</option>
                                                @endforeach
                                                
                                              </select>
                                            </div>
                                         </div> 

                                         <div class="form-group">
                                            <label for="" class="col-md-12">Parcel Category</label>
                                            <div class="col-md-12">
                                              <select name="parcel_category_id" id="" class="form-control">
                                                <option value="">Select Parcel Category</option>
                                                @foreach($parcelcategories as $parcelcategory)
                                                <option value="{{ $parcelcategory->id }}">{{ $parcelcategory->name }}</option>
                                                @endforeach
                                                
                                              </select>
                                            </div>
                                         </div> 

                                         <div class="form-group">
                                            <label for="" class="col-md-12">Service Type</label>
                                            <div class="col-md-12">
                                              <select name="service_type_id" id="" class="form-control">
                                                <option value="">Select Service Type</option>
                                                @foreach($servicetypies as $servicetype)
                                                <option value="{{ $servicetype->id }}">{{ $servicetype->name }}</option>
                                                @endforeach
                                                 


                                              </select>
                                            </div>
                                         </div> 

                                         <div class="form-group">
                                            <label for="" class="col-md-12">Weight </label>
                                            <div class="col-md-12">
                                              <select name="weight_id" id="" class="form-control">
                                                <option value="">Select Weight</option>
                                                @foreach($weights as $weight)
                                                <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                                                @endforeach

                                              </select>
                                            </div>
                                         </div> 


                                         <div class="form-group">
                                            <label for="" class="col-md-12">Service City Type </label>
                                            <div class="col-md-12">
                                              <select name="service_city_type_id" id="" class="form-control">
                                                <option value="">Select Service City Type</option>
                                                @foreach($servicetcitytypies as $citytype)
                                                <option value="{{ $citytype->id }}">{{ $citytype->name }}</option>
                                                @endforeach

                                              </select>
                                            </div>
                                         </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Charge</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="charge" placeholder="Enter Delivery Charge" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Third Party Charge</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="third_party_charge" placeholder="Enter Third Party Charge" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Return Charge</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="return_charge" placeholder="Enter Return Charge" required="">
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
                                <th>Parcel Type</th>
                                <th>Parcel Category</th>
                                <th>Service Type</th>
                                <th>Weight</th>
                                <th>Service City Type</th>
                                <th>Charge</th>
                                <th>Third Party Charge</th>
                                <th>Return Charge</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($servicechargesettings as $setting)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $setting->parcel_type->name }}</td>
                                   <td>{{ $setting->parcel_category->name }}</td>
                                   <td>{{ $setting->service_type->name }}</td>
                                   <td>{{ $setting->weight->name }}</td>
                                   <td>{{ $setting->service_city_type->name }}</td>
                                   <td>{{ $setting->charge }}</td>
                                   <td>{{ $setting->third_party_charge }}</td>
                                   <td>{{ $setting->return_charge }}</td>
                                   <td>
                                       @if($setting->status==1)
                                       <p class="btn btn-primary btn-sm">Active</p>
                                       @else
                                       <p class="btn btn-danger">Inactive</p>
                                        @endif
                                   </td>
                                   
                                  <td>
                                       
                                    <a href="" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>



                        <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#edit_setting_{{ $setting->id }}"> <i class="fa fa-edit"></i>
                                               Edit
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="edit_setting_{{ $setting->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                       <form action="{{ route('service.charge.setting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                       
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Edit Delivery Charge Setting</h4>
                                                                </div>
                                                                <div class="modal-body">


                                                                  <div class="form-group">
                                                                    <label for="" class="col-md-12">Parcel Type</label>
                                                                    <div class="col-md-12">
                                                                      <select name="parcel_type_id" id="" class="form-control">
                                                                        <option value="">Select Parcel Type</option>
                                                                        @foreach($parceltypies as $parceltype)
                                                                        <option {{ $setting->parcel_type_id == $parceltype->id ? 'selected' : '' }} value="{{ $parceltype->id }}">{{ $parceltype->name }}</option>
                                                                        @endforeach
                                                                        
                                                                      </select>
                                                                    </div>
                                                                 </div> 

                                                                 <div class="form-group">
                                                                    <label for="" class="col-md-12">Parcel Category</label>
                                                                    <div class="col-md-12">
                                                                      <select name="parcel_category_id" id="" class="form-control">
                                                                        <option value="">Select Parcel Category</option>
                                                                        @foreach($parcelcategories as $parcelcategory)
                                                                        <option {{ $setting->parcel_category_id == $parcelcategory->id ? 'selected' : '' }} value="{{ $parcelcategory->id }}">{{ $parcelcategory->name }}</option>
                                                                        @endforeach
                                                                        
                                                                      </select>
                                                                    </div>
                                                                 </div> 


                                                                 <div class="form-group">
                                                                    <label for="" class="col-md-12">Service Type</label>
                                                                    <div class="col-md-12">
                                                                      <select name="service_type_id" id="" class="form-control">
                                                                        <option value="">Select Service Type</option>
                                                                        @foreach($servicetypies as $servicetype)
                                                                        <option {{ $setting->service_type_id == $servicetype->id ? 'selected' : '' }} value="{{ $servicetype->id }}">{{ $servicetype->name }}</option>
                                                                        @endforeach
                                                                         


                                                                      </select>
                                                                    </div>
                                                                 </div> 

                                                                 <div class="form-group">
                                                                    <label for="" class="col-md-12">Weight </label>
                                                                    <div class="col-md-12">
                                                                      <select name="weight_id" id="" class="form-control">
                                                                        <option value="">Select Weight</option>
                                                                        @foreach($weights as $weight)
                                                                        <option {{ $setting->weight_id == $weight->id ? 'selected' : '' }} value="{{ $weight->id }}">{{ $weight->name }}</option>
                                                                        @endforeach

                                                                      </select>
                                                                    </div>
                                                                 </div> 


                                                                 <div class="form-group">
                                                                    <label for="" class="col-md-12">Service City Type </label>
                                                                    <div class="col-md-12">
                                                                      <select name="service_city_type_id" id="" class="form-control">
                                                                        <option value="">Select Service City Type</option>
                                                                        @foreach($servicetcitytypies as $citytype)
                                                                        <option {{ $setting->service_city_type_id == $citytype->id ? 'selected' : ''  }} value="{{ $citytype->id }}">{{ $citytype->name }}</option>
                                                                        @endforeach

                                                                      </select>
                                                                    </div>
                                                                 </div> 

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Charge</label>
                                                                    <div class="col-md-12">
                                                                      <input type="text" class="form-control" name="charge" value="{{ $setting->charge }}" placeholder="Enter Delivery Charge" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Third Party Charge</label>
                                                                    <div class="col-md-12">
                                                                      <input type="text" class="form-control" name="third_party_charge" value="{{ $setting->third_party_charge }}" placeholder="Enter Third Party Charge" required="">
                                                                    </div>
                                                                </div> 

                                                                <div class="form-group">
                                                                    <label for="" class="col-md-12">Return Charge</label>
                                                                    <div class="col-md-12">
                                                                      <input type="text" class="form-control" name="return_charge" value="{{ $setting->return_charge  }}" placeholder="Enter Return Charge" required="">
                                                                    </div>
                                                                 </div> 
                         

                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Update</button>
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