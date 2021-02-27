@extends('backend.layouts.master')
@section('title','Web Setting')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Web Setting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Web Setting </li>
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
                      <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                               <div class="form-group">
                                  <label for="" class="col-md-12">Company Name</label>
                                  <div class="col-md-12">
                                  <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}" placeholder="Company Name"> 
                                </div>
                               </div>
 

                               <div class="form-group">
                                  <label for="" class="col-md-12">Sologan</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="sologan" value="{{ $setting->sologan }}" placeholder="Company Sologan" required="">
                                  </div>
                               </div>

                               <div class="form-group">
                                  <label for="" class="col-md-12">Mobile</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}" placeholder="Phone Number" required="">
                                  </div>
                               </div> 
                              <div class="form-group">
                                  <label for="" class="col-md-12">Email</label>
                                  <div class="col-md-12">
                                  <input type="email" class="form-control" name="email" value="{{ $setting->email }}" placeholder="Company email Address"> 
                                  </div>
                               </div>
 

                               <div class="form-group">
                                  <label for="" class="col-md-12">address</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="address" value="{{ $setting->address }}" placeholder="Company address" required="">
                                  </div>
                               </div>

                               <div class="form-group">
                                  <label for="" class="col-md-12">Hot line number</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="hotlinenumber" value="{{ $setting->hotlinenumber }}" placeholder="hot line  Number" required="">
                                  </div>
                               </div>  

                               <div class="form-group">
                                  <label for="" class="col-md-12">Call Center number</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="callcenter" value="{{ $setting->callcenter }}" placeholder="call center" required="">
                                  </div>
                               </div> 

                               <div class="form-group">
                                  <label for="" class="col-md-12">Website</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="website" value="{{ $setting->website }}" placeholder="website" required="">
                                  </div>
                               </div>

                                <div class="form-group">
                                  <label for="" class="col-md-12">Facebook Link</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}" placeholder="facebook" required="">
                                  </div>
                               </div> 

                               <div class="form-group">
                                  <label for="" class="col-md-12">Instagram Link</label>
                                  <div class="col-md-12">
                                    <input type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}" placeholder="instagram" required="">
                                  </div>
                               </div> 


                               <div class="form-group">
                                  <label for="" class="col-md-12">Logo</label>
                                  <div class="col-md-12">
                                    <br>
                                    <img src="{{ asset($setting->logo) }}" alt="" class="img-responsive" width="100px">
                                    <br>
                                    <input type="file" class="form-control" name="logo" value="{{ $setting->logo }}" placeholder="call center">
                                  </div>
                               </div> 
                                <div class="form-group">
                                   <button class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                               </div> 

 
                    
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



 
@endsection