@extends('backend.merchant.layouts.master')
@section('title','Parcel List')
@section('merchant_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Parcel List</h4>

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
                            <div class="col-md-12">
                                <h3>Search By</h3>
                            </div> 
                            <div class="col-12 col-md-2">
                                <input type="text" name="invoice_no"  @if(isset($invoice_no))   value="{{ $invoice_no }}" @endif  placeholder="Tracking ID" class="form-control">
                            </div> 
                            <div class="col-12 col-md-1">
                                <input type="text" name="merchant_invoice"  @if(isset($merchant_invoice))   value="{{ $merchant_invoice }}" @endif  placeholder="Shop Invoice ID" class="form-control">
                            </div>
                            <div class="col-12 col-md-2">
                                <input type="text" name="customer_phone"  @if(isset($customer_phone))   value="{{ $customer_phone }}" @endif placeholder="Customer Phone" class="form-control">
                            </div>

                            <div class="col-12 col-md-2">
                                <input type="text" name="date_from"   @if(isset($date_from))   value="{{ $date_from }}" @endif placeholder="Date From" class="form-control datepicker">
                            </div>

                            <div class="col-12 col-md-2">
                                <input type="text" name="to_date"  @if(isset($to_date))   value="{{ $to_date }}" @endif  placeholder="Date To" class="form-control datepicker">
                            </div>

                            <div class="col-12 col-md-2">
                                  <select name="order_date_search" id="" class="form-control">
                                      <option @if(isset($order_date_search))  {{ $order_date_search == 1 ? 'selected' : '' }}  @endif value="1">Created Date</option>
                                      <option @if(isset($order_date_search))  {{ $order_date_search == 2 ? 'selected' : '' }}  @endif value="2">Last Updated</option>
                                  </select>
                            </div>

                            <div class="col-12 col-md-1">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Find</button>
                            </div>


                        </div>
                    </form>

                    <hr>
















                    <table class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Created Date</th>
                                <th>Parcel ID</th>
                                <th>Shop Name</th>
                                <th>Customer info</th>
                                <th>Status</th>
                                <th>Payment Info</th>
                                <th>Payment Status</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a class="viewSingleDataByAjax"   data-id="{{ $order->id }}" href="">
                                        {{ $order->invoice_no }} 
                                    </a>
                                <br>
                                    Invoice ID: {{ $order->merchant_invoice }}

                                </td>
                               
                                <td>
                                    
                                     {{ $order->merchantshop?$order->merchantshop->shop_name:'' }}
                                </td>
                                <td>
                                    {{ $order->customer->customer_name }} <br>
                                    {{ $order->customer->customer_phone }} <br>
                                    {{ $order->customer->address }} <br>
                                    {{ $order->area->area_name }} <br>
                                </td>
                                
                                <td>
                                    <span style="{{ orderStatusStyle_HH($order->order_status_id) }}">
                                        {{ $order->orderStatus?$order->orderStatus->order_status:'' }}
                                    </span>
                                </td>
                                <td>
                                    Tk {{ $order->collect_amount }} Cash Collection <br>
                                    Tk {{ $order->service_charge }} Charge
                                </td>
                                <td>
                                    <p class="btn  btn-sm btn-success">Paid</p>
                                    <p class="btn  btn-sm btn-danger">Unpaid</p>
                                </td>
                                <td>
                                    {{ $order->updated_at->format('M d, Y') }}
                                </td>
                              
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                            <a class="viewSingleDataByAjax"   data-id="{{ $order->id }}" href="">
                                                <li><i class="fa fa-eye"></i> View </li>
                                            </a>
                                            <li><a href="" class="edit"><i class="fa fa-edit"></i> Edit</a> </li>
                                            <li><a href="{{ route('merchant.order.show.invoice',$order->invoice_no) }}" class="edit"><i class="fa fa-print"></i> Print</a> </li>
                                            <li><a id="delete" href="" class="delete"><i class="fa fa-trash"></i> Delete</a> </li>
                                            <li><a href=""> <i class="fa fa-info"></i>  Query</a></li>
                                        </ul> 
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->





{{-- ----------------Fmor Modal randering---------------- --}}
{{-- --- class="viewSingleDataByAjax"   data-id="{{ $order->id }}" --}}
<!-- Modal -->
<div id="viewSingleDataByAjax" class="modal fade" role="dialog" aria-hidden="true" ></div>

    <div id="showSingleViewByAjax" data-url="{{ route('merchant.showSingleViewByAjax')}}"></div>
    @push('js')
    <script>
        $(document).on('click','.viewSingleDataByAjax', function(e){
            e.preventDefault();
            var id          =  $(this).data('id');
            var url         =  $('#showSingleViewByAjax').data("url");
                $.ajax({
                    url: url,
                    data: {id:id},
                    type: "GET",
                    success: function(response){
                        $('#viewSingleDataByAjax').html(response).modal('show');
                    },
                });
        });
        $(document).on('click','.modalDismissClass',function(h){
            h.preventDefault();
            $('#viewSingleDataByAjax').html('').modal('hide');
        });
        //========invoice details==============

    </script>
    @endpush()
    {{-- ----------------Fmor Modal randering End---------------- --}}

@endsection