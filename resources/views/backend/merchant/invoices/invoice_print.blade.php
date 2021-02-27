<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">

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
                                                <th>Parcel ID</th>
                                                <th>Customer Invoice</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer Area</th>
                                                <th>Collect <br/> Amount</th>
                                                <th>Delivery <br/>Charge</th>
                                                <th>COD <br/>Charge</th>
                                                <th>Return <br/>Charge</th>
                                                <th>Paid Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoices as $key=> $order)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$order->orders->invoice_no}}</td>
                                                    <td>{{$order->orders->merchant_invoice}}</td>
                                                    <td>{{$order->orders->customer->customer_name}}</td>
                                                    <td>{{$order->orders->customer->customer_phone}}</td>
                                                    <td>{{$order->orders->destinationAreas?$order->orders->destinationAreas->area_name:NULL}}</td>
                                                    <td>{{number_format($order->orders->collect_amount,2)}}</td>
                                                    <td>{{number_format($order->service_charge,2)}}</td>
                                                    <td>{{number_format($order->cod_charge,2)}}</td>
                                                    <td>{{number_format($order->others_charge,2)}}</td>
                                                    <td>{{number_format($order->amount,2)}}</td>
                                                    <td>Delivered</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                  
                                            <tr>
                                                <td colspan="10" style="text-align:right">Cash</td>
                                                <td>
                                                    {{number_format($totalCollectAmount,2)}}
                                                </td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="text-align:right">Total Delivery Charge</td>
                                                <td>
                                                    {{number_format($totalServiceCharge,2)}}
                                                </td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="text-align:right">Total COD Charge</td>
                                                <td>
                                                    {{number_format($totalCODCharge,2)}}
                                                </td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="text-align:right">Total Return Charge</td>
                                                <td>
                                                    {{number_format($totalReturnCharge,2)}}
                                                </td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="text-align:right">Total</td>
                                                <td>
                                                    {{number_format($total,2)}}
                                                </td>
                                                <td ></td>
                                            </tr>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
