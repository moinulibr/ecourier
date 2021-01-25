@extends('backend.merchant.layouts.master')
@section('title','Payment Summery')
@section('merchant_content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Payment Summery</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
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
                     
                    <form action="" method="get">
                        <div class="row">
                            
                              
                            <div class="col-12 col-md-3">
                                <input type="text" name="date_from"   @if(isset($date_from))   value="{{ $date_from }}" @endif placeholder="Date From" class="form-control datepicker">
                            </div>

                            <div class="col-12 col-md-3">
                                <input type="text" name="to_date"  @if(isset($to_date))   value="{{ $to_date }}" @endif  placeholder="Date To" class="form-control datepicker">
                            </div>

                            

                            <div class="col-12 col-md-2">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
                            </div>


                        </div>
                    </form>

                    <hr>

 


                    <table class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Invoice Date</th>
                                <th>Cash Collection (TK) </th>
                                <th>Delivery Charge (TK)</th>
                                <th>COD Charge (TK)</th>
                                <th>Return Charge (TK)</th>
                                <th>Amount Paid Out (TK)</th>
                                <th>Download</th>
                             </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices as $item)
                            <tr>
                                <td>{{$item->payment_invoice_no}}</td>
                                <td>{{date('Y-m-d h:i:s',strtotime($item->created_at))}}</td>
                                <td>{{--  {{$item->collectAmount()}}  --}}</td>
                                <td>{{$item->totalInvoiceDeliveryAmount()}}</td>
                                <td>{{$item->totalInvoiceCodAmount()}}</td>
                                <td>{{0.0}}</td>
                                <td>{{$item->payment_amount}}</td>
                                <td>
                                    <a href="" style="font-size: 18px"> <i class="fa fa-file"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                            <td colspan="8"> </td>
                            </tr>

                            {{--   
                                @foreach ($invoices as $item)
                                    <tr>
                                        <td>12154</td>
                                        <td>Jan 07,2021</td>
                                        <td>5000</td>
                                        <td>650</td>
                                        <td>100</td>
                                        <td>0</td>
                                        <td>5000</td>
                                        <td>
                                            <a href="" style="font-size: 18px"> <i class="fa fa-file"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach  
                            --}}
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection