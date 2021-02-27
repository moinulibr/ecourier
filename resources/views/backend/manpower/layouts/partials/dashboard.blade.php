@extends('backend.manpower.layouts.master')
@section('title','Delivery Man Dashboard')
@section('content')
	<!-- start page title -->


 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pickup Parcel</h4>
         </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-warning">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Pending Pickup</p>
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
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="box"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Picked</p>
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
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="briefcase"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Office Accepted</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>


   
</div>
<!-- end row-->



<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Delivery Parcel</h4>
         </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="allparcel">
         <div class="card bg-warning">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Pending Pickup</p>
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
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="box"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Picked</p>
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
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="briefcase"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 1000</h1>
                        <p class="text-white mb-0">Office Accepted</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

</div>




@endsection