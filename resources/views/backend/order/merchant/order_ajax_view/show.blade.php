
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Merchant Modal Header</h4>
          </div>
          <div class="modal-body">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Order View</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Percel Status</h4>

                                <hr>
                                 @foreach($order->orderProcessingHistories as $order_processing)
                                    <ul>
                                        <li>
                                            {{ $order_processing->orderStatuses?$order_processing->orderStatuses->order_status:""}} 
                                            <br/>
                                            {{$order_processing->created_at}}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Percel Details</h4>

                                <hr>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>:</th>
                                            <th>{{ $order->invoice_no }} </th>
                                        </tr>
                                        <tr>
                                            <th>Customer Invoice</th>
                                            <th>:</th>
                                            <th>{{ $order->merchant_invoice }} </th>
                                        </tr>
                                        <tr>
                                            <th>Parcel Owner Type</th>
                                            <th>:</th>
                                            <th>
                                                @if ($order->parcel_owner_type_id == 1)
                                                    Merchant
                                                    @else
                                                    General Customer
                                                @endif
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                @if ($order->parcel_owner_type_id == 1)
                                                    Merchant
                                                    @else
                                                    General Customer
                                                @endif
                                            </th>
                                            <th>:</th>
                                            <th>
                                                @if ($order->parcel_owner_type_id == 1)
                                                        {{ $order->merchant_id?$order->merchant?$order->merchant->name:'':'' }}
                                                    @else
                                                    {{ $order->general_customer_id?$order->generalCustomer?$order->generalCustomer->name:'':'' }}
                                                @endif
                                            </th>
                                        </tr>
                                        @if ($order->parcel_owner_type_id == 1)
                                        <tr>
                                            <th>
                                                Merchant Shop
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->merchant_shop_id?$order->merchantshop?$order->merchantshop->shop_name:'':'' }}
                                            </th>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>
                                                Creating Branch <br/> Area
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->creatingBranches?$order->creatingBranches->company_name:'' }} <br>
                                                {{ $order->creatingAreas?$order->creatingAreas->area_name:'' }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Weight
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->weights?$order->weights->name:'' }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Collect Amount
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->collect_amount }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Service Charge
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->service_charge }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                COD Charge
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->cod_charge }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Others Charge
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->others_charge }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Payable Amount
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->client_merchant_payable_amount }} <br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Customer
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->customer?$order->customer->customer_name:'' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Customer  Address
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->customer?$order->customer->address:'' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Destination City <br/> Area
                                            </th>
                                            <th>:</th>
                                            <th>
                                                {{ $order->destinationDistricts?$order->destinationDistricts->name:'' }} <br>
                                                {{ $order->destinationAreas?$order->destinationAreas->area_name:'' }} <br>
                                            </th>
                                        </tr>

                                    </table>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->









          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default modalDismissClass" data-dismiss="modal" id="modalDismissId">Close</button>
          </div>
        </div>
      </div>
