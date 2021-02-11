@extends('backend.layouts.master')
@section('title','Send To Head Office')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Send To Head Office  <small>(Agent)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Send To Head Office</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
        <ul>
            @foreach (session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('success') }}
    @endif
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    @if(is_array(session('error')))
        <ul>
            @foreach (session('error') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @else
        {{ session('error') }}
    @endif
</div>
@endif


    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <form action="{{route('agent.payToHeadOfficeStore')}}" method="POST">
                        @csrf
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" readonly id="invoice_no_id" name="invoice_no" value="{{$invoice}}" class="invoice_no_class form-control"/>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('invoice_no'))?($errors->first('invoice_no')):''}}</div>
                            </div>
                        </div>
                         <div class="col-12 col-md-3">
                            <label>From Date</label>
                            <input type="text" name="from_date" id="from_date_id"  @if(isset($from_date))   value="{{ $from_date }}" @endif placeholder=" From Date" class="from_date_id_class form-control datepicker">
                        </div>

                        <div class="col-12 col-md-3">
                            <label>To Date</label>
                            <input type="text" name="to_date" id="to_date_id" @if(isset($to_date))   value="{{ $to_date }}" @endif  placeholder="To Date " class="to_date_id_class form-control datepicker">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="table-responsive dt-responsive" id="showResult">
                                    <table  class="table table-striped table-bordered nowrap">
                                        <thead>
                                           <tr>
                                                <th>Sl.</th>
                                                <th></th>
                                                <th>Customer <br/> Name</th>
                                                <th>Customer<br/>Phone</th>
                                                <th>Customer<br/>Address</th>
                                                <th>Condition<br/>Amount</th>
                                                <th>Order No</th>
                                                <th>Service <br/>Charge</th>
                                                <th>COD <br/>Charge</th>
                                                <th>Total <br/>Charge</th>
                                                <th>Receiver <br/>Amount</th>
                                                <th>Delivery <br/>Charge<br/>Bearer</th>
                                                <th>Cash <br/> Collection</th>
                                                <th style="width:5%;">Status</th>
                                                <th>Condition<br/>Payment<br/>Status</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody >
                                        </tbody>
                                        <tfooter>
                                           {{--   <tr>id="showResult"
                                                <td colspan="5"></td>
                                                <td >
                                                    <a href="#" id="clearAll" class="btn btn-sm btn-danger clearAll">Clear All</a>
                                                </td>
                                            </tr>  --}}
                                       </tfooter>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



@section('ajaxdropdown')

    <script>
        $(document).on('change','.order_id_class',function(){
            var checkedResult = 0;
            if($(this).is(":checked"))
            {
                checkedResult = 1;
            }else{
                checkedResult = 0;
            }
           
            var get_checked_id  = $(this).attr('id');
            var get_amount  = parseInt($(this).data('amount'));

                var ide = $(this).data('id');
            var maked_amount_id = 'amount_'+get_checked_id;
            var maked_del_id    = 'del_'+get_checked_id;

            var set_amount      = parseInt(nanCheck($('#'+maked_del_id).text()));

            var newAmount = parseInt(nanCheck($('#totalAmount').text()));
            if(checkedResult)
            {
                $('#order_id_'+ide).val(ide);
                $('#'+maked_amount_id).val(set_amount);
                $('#'+maked_del_id).html(set_amount).css({'color':'black'});
                newAmount += get_amount;
            }else{
                $('#order_id_'+ide).val('');
                $('#'+maked_amount_id).val('');
                $('#'+maked_del_id).html('<del>'+set_amount +'</del>').css({'color':'red'});

                newAmount  -=  get_amount;
            }
            $('#totalAmount').text(newAmount);
            $('#sendTotalAmount').val(newAmount);
            submit(newAmount);
        });

        function nanCheck(val)
        {
            var nanResult = 0;
            if(isNaN(val)) {
                nanResult = 0;
            }
            else{
                nanResult = val;
            }
            return nanResult;  
        }

        function totalAmountBeforeAction()
        {
            tt();
            var sum = 0;
            $(".total_before_action").each(function() {
                sum += nanCheck(parseInt($(this).text()));
            });
            $('#totalAmount').text(sum);
            $('#sendTotalAmount').val(sum);
            submit(sum)
        }
        function submit(amount)
        {
            //if(amount > 0 )
            //{
                $('#submit').removeAttr('disabled','disabled');
            //}else{
                //$('#submit').attr('disabled','disabled');
            //}
        }
        function tt()
        {
            $(".order_id_class").each(function() {
                var amount = nanCheck($(this).data('amount'));
                var id = $(this).attr('id');
                var ide = $(this).data('id');
                var checkedResult = 0;
                if($(this).is(":checked"))
                {
                    checkedResult = 1;
                }else{
                    checkedResult = 0;
                }
                if(checkedResult)
                {
                     $('#order_id_'+ide).val(ide);
                    $('#amount_'+id).val(amount);
                }
                else{
                    $('#order_id_'+ide).val('');
                    $('#amount_'+id).val('');
                }
            });
        }
    </script>

   
    <div id="payToHeadOfficeList" data-url="{{ route('agent.payToHeadOfficeList')}}"></div>
    {{--Making Cart--}}
    <script>
        $(document).ready(function(){
            var ctrlDown = false,
            ctrlKey = 17,
            cmdKey = 91,
            vKey = 86,
            cKey = 67;
            $(document).on('keyup change','.from_date_id_class,.to_date_id_class',function(e)
            {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                    var url = $('#payToHeadOfficeList').data("url");
                    var from_date                    =  getValueFromSelectOption('from_date_id_class');
                    var to_date                      =  getValueFromSelectOption('to_date_id_class');

                 

                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {from_date:from_date,to_date:to_date},
                        success: function(response)
                        {
                            $('#showResult').html(response);
                            totalAmountBeforeAction();
                        },
                    });
            });
        });
    </script>


    {{---Print----}}
    <div id="printManpowerOrderAssingedList" data-url="{{ route('agent.printManpowerOrderAssingedList')}}"></div>
    <script>
            $(document).on('click','#print',function(e)
            {
                e.preventDefault();
                var url = $('#printManpowerOrderAssingedList').data("url");
                var manpower_id                 =  getValueFromSelectOption('manpower_id_class');
                var order_processing_type_id    =  getValueFromSelectOption('order_processing_type_id_class');
                var order_assigning_status_id   =  getValueFromSelectOption('order_assigning_status_id_class');
                var from_date                   =  getValueFromSelectOption('from_date_id_class');
                var to_date                     =  getValueFromSelectOption('to_date_id_class');

                $.ajax({
                    url: url,
                    type: "GET",
                    data: {manpower_id:manpower_id,order_assigning_status_id:order_assigning_status_id,order_processing_type_id:order_processing_type_id,from_date:from_date,to_date:to_date},
                    success: function(response)
                    {
                        $('#viewSingleDataByAjax').html(response).modal('show');
                    },
                });
            });
    </script>



    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js "></script>
    <script type="text/javascript">
		$(document).ready(function(){
			//$('.btnPrint').printPage();
		});
	</script>



    {{--if cart is exist--}}
    <script>
        $(document).ready(function(){
                var url = $('#payToHeadOfficeList').data("url");
                var manpower_id                 =  getValueFromSelectOption('manpower_id_class');
                var order_assigning_status_id   =  getValueFromSelectOption('order_assigning_status_id_class');
                var from_date                   =  getValueFromSelectOption('from_date_id_class');
                var to_date                     =  getValueFromSelectOption('to_date_id_class');

                $.ajax({
                    url: url,
                    type: "GET",
                    data: {manpower_id:manpower_id,order_assigning_status_id:order_assigning_status_id,from_date:from_date,to_date:to_date},
                    success: function(response)
                    {
                        $('#showResult').html(response);
                        totalAmountBeforeAction();
                    },
                });
            });
    </script>




    <script>
        function getValueFromSelectOption(className)
        {
            return $('.'+className).val();
        }

        function getValueFromRadioButtonOption(className)
        {
            return $('.'+className).val();
            return $('.'+className+':checked').val();
        //return  $('.gold_color:checked').val();
            //console.log($('.parcel_type_id_class:checked').val());
        }
    </script>


    {{----Pagination by ajax-----}}
    <input type="hidden" id="getDataByPagination" data-url="{{route('agent.manPowerOrderDeliveredAmount')}}" >
    <script>
            $(document).on("click",".pagination li a",function(e){
                e.preventDefault();
                var page = $(this).attr('href');
                var pageNumber = page.split('?page=')[1];
                return getPagination(pageNumber);
            });//split == delete some things...

            function getPagination(pageNumber){
                var createUrl = $('#payToHeadOfficeList').data("url");
                var url =  createUrl+"?page="+pageNumber;
                
                $.ajax({
                    url: url,
                    type: "GET",
                    datatype:"HTML",
                    success: function(response){
                        $("#showResult").html(response);
                    },
                });
            }
    </script>


{{-- ----------------Fmor Modal randering---------------- --}}
{{-- --- class="viewSingleDataByAjax"   data-id="{{ $order->id }}" --}}
<!-- Modal -->
<div id="viewSingleDataByAjax" class="modal fade" role="dialog" aria-hidden="true" ></div>
<div id="showSingleViewByAjax" data-url="{{ route('agent.showSingleViewByAjax')}}"></div>
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
{{-- ----------------Fmor Modal randering End---------------- --}}



@endsection
@endsection
