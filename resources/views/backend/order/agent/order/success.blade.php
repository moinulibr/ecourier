@extends('backend.layouts.master')
@section('title','Parcel Success')
@section('content')
    <!-- start page title -->
    

 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">   
                      <div class="wrapper">
                        <div class="alert-container">
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Congratulations !</strong> 
                                @if(Session::has('success'))    {{Session::get('success')}}  @endif
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="pickup-info">
                                <div class="title-wrapper">
                                    <h4 class="title">Pickup Shop Address</h4>
                                </div>
                                <div class="subtitle-wrapper">
                                    <p class="title">
                                        {{--  {{ $order->merchantshop?$order->merchantshop->shop_name: '' }}  <br>
                                        {{ $order->merchantshop?$order->merchantshop->pickup_address: '' }}   --}}

                                    </p>
                                </div>
                            </div>
                            <div class="shipment-info">
                                <div class="title-wrapper">
                                    <h4 class="title">Customer / Shipment Details</h4>
                                </div>
                                <div class="subtitle-wrapper">
                                    <p class="address">
                                        {{ $order->customer?$order->customer->customer_name: '' }} <br>
                                        {{ $order->customer?$order->customer->address: '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="track-button-wrapper">
                                <br>
                               
                                <a href="" class="btn btn-primary" ><i class="fa fa-map-pin"></i> Tracking Your Order</a>
                               
                                <br><br><br>
                            </div>
                            <div class="parcel-create-button-wrapper">
                                <a  href="{{ route('agent.order.create') }}" class="btn  btn-info"><i class="fa fa-plus"></i> Create Order</a>
                                <br><br><br>

                            </div>
                                <div class="print-label-button-wrapper">
                                       <a  class="btn btn-secondary btn-round btn-background-ghost" href="{{ route('agent.order.show.invoice',$order->invoice_no) }}">
                                            <span>
                                                <i class="fa fa-print"></i> 
                                                Print Label
                                            </span>
                                       </a>
                                        <br><br><br>
                                </div>
                            </div> 

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection