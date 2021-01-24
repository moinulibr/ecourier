
{{--  @extends('backend.layouts.master')
@section('title','Order Assigned List')
@section('content')  --}}
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Order Assigned List  <small>(Agent)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Order Assigned List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


    <div class="row" >
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="table-responsive dt-responsive">
                                    <table  class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Invoice No</th>
                                                <th>Customer Invoice</th>
                                                <th>Collect <br/> Amount</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key=> $order)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$order->orders->invoice_no}}</td>
                                                    <td>{{$order->orders->merchant_invoice}}</td>
                                                    <td>{{$order->orders->collect_amount}}</td>
                                                    <td>{{$order->orders->customer->customer_name}}</td>
                                                    <td>{{$order->orders->customer->customer_phone}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


{{--  @endsection  --}}
