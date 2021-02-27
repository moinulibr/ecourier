@extends('backend.layouts.master')
@section('title','All Logistic Partner List')
@section('content')
  <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
 
                       <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-right">
                                            <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                                              <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                          
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3 mb-4">
                                            <div class="avatar-xl rounded-circle p-2 border border-soft-primary mx-auto">
                                              
                                                @if(Auth::guard('web')->user()->photo !=null)

                                                <img class="img-fluid rounded-circle" src="{{ asset(Auth::guard('web')->user()->photo) }}" alt="User Profile Photo"  >
                                                @else

                                                <img src="{{ asset('public/images/user.png') }}" class="img-fluid rounded-circle" alt="" >

                                                @endif
                                            </div>
                                            <h5 class="mt-4 mb-2">{{ Auth::user()->name }}</h5>
                                            <p class="text-muted">{{ Auth::user()->mobile }}</p>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                            <p class="text-muted">{{ Auth::user()->address }}</p>
                                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>
               
                

@endsection