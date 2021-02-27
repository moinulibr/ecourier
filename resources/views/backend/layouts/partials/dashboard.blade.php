@extends('backend.layouts.master')
@section('title','Deshboard')
@section('content')
 
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Drezon</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>

   <div class="row">
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0"> Total Parcel</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-warning">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="box"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Pickup Request</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div> 

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-dark">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="briefcase"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Picked Parcel</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card  bg-purple">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="database"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Received Parcel</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-secondary">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="settings"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Procceing Parcel</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-primary">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="truck"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">On The Way</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-info">
            <div class="card-body ">
                <div class="media align-items-center ">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="clock"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class=" text-white mb-0">Reschedule</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-danger">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary ">
                            <i class="icon-sm" data-feather="rotate-ccw"></i>
                        </div>
                    </div>
                    <div class="media-body ">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="mb-0 text-white">Return</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-warning">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary ">
                            <i class="icon-sm" data-feather="rotate-ccw"></i>
                        </div>
                    </div>
                    <div class="media-body ">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="mb-0 text-white">Return To Merchant</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary ">
                            <i class="icon-sm" data-feather="check-circle"></i>
                        </div>
                    </div>
                    <div class="media-body ">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="mb-0 text-white">Return</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>
 

   
</div>
<!-- end row-->










@endsection