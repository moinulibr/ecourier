@extends('backend.layouts.master')
@section('title','Edit Profile')
@section('content')
      
                   <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Profile</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mt-1">
                                                     <form action="{{ route('profile.update',$profile->id) }}" method="post" enctype="multipart/form-data">
                                                     	@csrf
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                    <label for=""> Name</label>
                                                                    <input type="text" name="name" class="form-control" value="{{ $profile->name }}" id="" placeholder="Name">
                                                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                                                </div>
                                                           </div>
                                                           <div class="col-md-12">
                                                               <div class="form-group">
                                                                    <label for=""> Email</label>
                                                                    <input type="text" name="email" class="form-control" value="{{ $profile->email }}" id="" placeholder="Email">
                                                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                                                </div>
                                                           </div>
                                                           
                                                           <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Mobile</label>
                                                                    <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}" id="" placeholder="Mobile">
                                                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                                                </div>
                                                           </div>

                                                          

                                                           <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <br>
                                                                    <img src="{{ asset($profile->photo) }}" width="200px"> <br>
                                                                    <label for="">Photo</label>
                                                                    <input type="file" name="photo" class="form-control" value="{{ $profile->photo }}" id="" placeholder="photo">
                                                                    <div class="text-danger">{{ $errors->first('photo') }}</div>
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