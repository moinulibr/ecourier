@extends('backend.layouts.master')
@section('title','Change Password')
@section('content')
      
       <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Change Password</h4>
                      <hr>
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="mt-1">
                                   <form action="{{ route('user.password',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                   	@csrf
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                  <label for=""> Current Password</label>
                                                  <input type="password" name="current_password" class="form-control" value="{{ old('current_password') }}" id="" placeholder="current password">
                                                  <div class="text-danger">{{ $errors->first('current_password') }}</div>
                                              </div>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                  <label for=""> New Password</label>
                                                  <input type="password" name="new_password" class="form-control" value="{{ old('new_password') }}" id="" placeholder="new password">
                                                  <div class="text-danger">{{ $errors->first('new_password') }}</div>
                                              </div>
                                         </div>
                                         
                                         <div class="col-md-12">
                                              <div class="form-group">
                                                  <label for="">Confirm Password</label>
                                                  <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" id="" placeholder="password Confirmation">
                                                  <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                              </div>
                                         </div>

                                           
                                     </div>
                                       

                                      <div class="mt-4">
                                          <button type="submit" class="btn btn-primary w-md"><i class="fa fa-check"></i> Update</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                       </div>

                   </div>
              </div>
          </div>
      </div>
              
 
@endsection