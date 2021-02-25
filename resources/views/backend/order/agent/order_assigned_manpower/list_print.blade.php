<style>
     <style>
        p{
          padding: 0;
          margin: 0;
          font-size: 14px;
        }
        h1{
          margin: 0;
          padding: 0;
        }

        table{
          text-align: center;
           width: 100%;
           
        }
        table thead tr{
          background-color: #ddd;
          padding: 5px;


        }

        table thead tr th{
           font-size: 12px;
           border: 1px solid #000;

        }

        table tbody tr td{
           font-size: 12px;
           border: 1px solid #000;
        }
      .compnanyinfo{
          margin-top: -25px; 
        }
        .sheethead{

        }

        .sheethead h4,p{
            padding:0;
            margin: 0;
        }

   </style>
</style>




<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right sheethead">
                <center>
                   <img src="{{ asset($websetting->logo) }}" alt="" style="width: 60px">
                   <h4>{{ $websetting->company_name }}</h4>
                   <p> <span style="color: red">Hotline : {{ $websetting->hotlinenumber }}</span> <span>E-mail : {{ $websetting->email }}</span></p>
                   <br>
                   <p> <span style="float: right;">Date {{ Date('d-M-Y') }}</span></p>
                </center>
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
