@extends('backend.merchant.layouts.master')
@section('title','Dashboard')
@section('merchant_content')

<div class="row">
    <div class="col-md-12">
        <h3>Order Overview</h3>
        <hr>
    </div>
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
        <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> {{$placedOrder}}</h1>
                        <p class="text-white mb-0"> Order Placed</p>

                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-warning">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="box"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white">{{$delivered}}</h1>
                        <p class="text-white mb-0">Orders Delivered</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-dark">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="briefcase"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> 00</h1>
                        <p class="text-white mb-0">Orders In Transit</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card  bg-purple">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="database"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> {{$canceledReturned}}</h1>
                        <p class="text-white mb-0">Orders Returned</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-secondary">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="settings"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> {{$deliveredParcel}}%</h1>
                        <p class="text-white mb-0">Successful Deliveries</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-primary">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="truck"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> {{$returnedToBe}}</h1>
                        <p class="text-white mb-0">Orders To be Returned</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

</div>
<!-- end row-->


{{-- payments histroy  --}}



<div class="row">
    <div class="col-md-12">
        <h3>Payment Summery</h3>
        <hr>
    </div>
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white"> {{$totalSalesPaidAmount}}</h1>
                        <p class="text-white mb-0"> Total Sales</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>





    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-primary">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="truck"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white">{{$totalPaidCharge}}</h1>
                        <p class="text-white mb-0">Total Charge Paid</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-warning">
            <div class="card-body ">
                <div class="media align-items-center ">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary text-white">
                            <i class="icon-sm" data-feather="clock"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="mt-0 mb-1 text-white">{{$unPaidAmount}}</h1>
                        <p class=" text-white mb-0">Total Unpaid Amount</p>
                    </div>
                </div>
                <!-- end row-->
            </div>
         </div>
        </a>
    </div>

    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
        <a href="#">
         <div class="card bg-success">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar-sm mr-3 p-1 border rounded border-soft-primary">
                        <div class="avatar-title rounded bg-soft-primary ">
                            <i class="icon-sm" data-feather="check-circle"></i>
                        </div>
                    </div>
                    <div class="media-body ">
                        <h1 class="mt-0 mb-1 text-white">{{$payProcessing}}</h1>
                        <p class="mb-0 text-white">Payment Proccessing </p>
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
