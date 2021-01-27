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
                                                    <td>{{$order->orders->collect_amount}}</td>
                                                    <td>{{$order->service_charge}}</td>
                                                    <td>{{$order->cod_charge}}</td>
                                                    <td>{{$order->others_charge}}</td>
                                                    <td>{{$order->amount}}</td>
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
