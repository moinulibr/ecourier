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
                            
                            <div class="parcel-create-button-wrapper">
                                <a  href="{{ route('agent.order.create') }}" class="btn  btn-info"><i class="fa fa-plus"></i> Create Order</a>
                                <br><br><br>

                            </div>
                                <div class="print-label-button-wrapper">
                                      
                                        <a  class="customerCopy btn btn-secondary btn-round btn-background-ghost" data-invoice_no="{{$order->invoice_no}}" data-url="{{ route('agent.order.successInvoicePrintCustomerCopyByAjaxPrintJs') }}">
                                            <span>
                                                <i class="fa fa-print"></i> 
                                                Customer Copy
                                            </span>
                                       </a>
                                       
                                       <a  class="labelPrint btn btn-secondary btn-round btn-background-ghost" data-invoice_no="{{$order->invoice_no}}" data-url="{{ route('agent.order.successInvoicePrintSlipByAjaxPrintJs') }}">
                                        <span>
                                            <i class="fa fa-print"></i> 
                                            Print Label
                                        </span>
                                   </a>

                                   <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
                                </div>
                            </div> 

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->


    @section('ajaxdropdown')
    <script>

        // Customer Copy Print
        $(document).on('click','.customerCopy',function(e){
        e.preventDefault();
            var invoice_no = $(this).data('invoice_no');
            var url = $(this).data('url');
            //console.log("invoice - No : " + invoice_no +" , URL : "+ url);
            $.ajax({
                url: url,
                type: "GET",
                data: {invoice_no:invoice_no},
                success: function(response)
                {
                    $.print(response);
                },
            });
        });

         // Label Print
         $(document).on('click','.labelPrint',function(e){
        e.preventDefault();
            var invoice_no = $(this).data('invoice_no');
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: "GET",
                data: {invoice_no:invoice_no},
                success: function(response)
                {
                    $.print(response);
                },
            });
        });
    </script>
    @endsection

@endsection