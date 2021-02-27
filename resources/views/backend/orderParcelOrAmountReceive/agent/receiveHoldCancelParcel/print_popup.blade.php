
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
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
                                    <tfooter>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td >
                                                
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default modalDismissClass" data-dismiss="modal" id="modalDismissId">Close</button>
          </div>
        </div>
      </div>
