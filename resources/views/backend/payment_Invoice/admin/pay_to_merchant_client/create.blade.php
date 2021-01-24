@extends('backend.layouts.master')
@section('title','Pay To Merchant/Client')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pay To Merchant/Client <small>(Admin)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Pay To Merchant/Client</li>
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
                    <form action="{{route('admin.payToMerchantClientCreateListStore')}}" method="POST">
                        @csrf
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Invoice No</label>
                               <input type="text" readonly class="form-control" name="payment_invoice_no" value="{{$invoice}}" />
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
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Client Type</label>
                               <select name="parcel_owner_type_id" id="parcel_owner_type_id" class="form-control parcel_owner_type_id_class select2">
                                    <option value=""> Select One Branch</option>
                                    <option value="1">Merchant</option>
                                    <option value="2"> General Client</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Merchant/Client</label>
                               <select name="merchant_client_id" id="merchant_client_id" class="form-control merchant_client_id_class select2">
                                    <option value=""> Select One Branch</option>
                                    
                               </select>
                            </div>
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
                                                <th>Order No</th>
                                                <th>Service <br/> Charge</th>
                                                <th>COD <br/> Charge</th>
                                                <th>Other <br/> Charge</th>
                                                <th>Collect Amount</th>
                                                <th>Payable Amount</th>
                                                <th style="width:5%;"></th>
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

            var maked_amount_id = 'amount_'+get_checked_id;
            var maked_del_id    = 'del_'+get_checked_id;

            var set_amount      = parseInt(nanCheck($('#'+maked_del_id).text()));

            var newAmount = parseInt(nanCheck($('#totalAmount').text()));
            if(checkedResult)
            {
                $('#'+maked_amount_id).val(set_amount);
                $('#'+maked_del_id).html(set_amount).css({'color':'black'});
                newAmount += get_amount;
            }else{
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
            var merchant_client_id = $('#merchant_client_id').val();
            if(amount > 0 && merchant_client_id)
            {
                $('#submit').removeAttr('disabled','disabled');
            }else{
                $('#submit').attr('disabled','disabled');
            }
        }
        function tt()
        {
            $(".order_id_class").each(function() {
                var amount = nanCheck($(this).data('amount'));
                var id = $(this).attr('id');
                var checkedResult = 0;
                if($(this).is(":checked"))
                {
                    checkedResult = 1;
                }else{
                    checkedResult = 0;
                }
                if(checkedResult)
                {
                    $('#amount_'+id).val(amount);
                }
                else{
                    $('#amount_'+id).val('');
                }
            });
        }
    </script>


    <div id="payToMerchantClientCreateList" data-url="{{ route('admin.payToMerchantClientCreateList')}}"></div>
    {{--Making Cart--}}
    <script>
        $(document).ready(function(){
            var ctrlDown = false,
            ctrlKey = 17,
            cmdKey = 91,
            vKey = 86,
            cKey = 67;
            $(document).on('keyup change','.merchant_client_id_class,.from_date_id_class,.to_date_id_class,.parcel_owner_type_id_class',function(e)
            {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                    var url = $('#payToMerchantClientCreateList').data("url");
                    var from_date                    =  getValueFromSelectOption('from_date_id_class');
                    var to_date                      =  getValueFromSelectOption('to_date_id_class');
                    var merchant_client_id           =  getValueFromSelectOption('merchant_client_id_class');
                    var parcel_owner_type_id         =  getValueFromSelectOption('parcel_owner_type_id_class');

                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {merchant_client_id:merchant_client_id,from_date:from_date,to_date:to_date,parcel_owner_type_id:parcel_owner_type_id},
                        success: function(response)
                        {
                            $('#showResult').html(response);
                            totalAmountBeforeAction();
                        },
                    });
            });
        });
    </script>


    <div id="getClientListparcelOwnerType" data-url="{{ route('admin.getClientListparcelOwnerType')}}"></div>
    <script>
        //parcel_owner_type_id
        //parcel_owner_type_id_class
        //merchant_client_id
        //merchant_client_id_class
        $(document).on('change','.parcel_owner_type_id_class',function(){
            var url = $('#getClientListparcelOwnerType').data("url");
            var parcel_owner_type_id    =  getValueFromSelectOption('parcel_owner_type_id_class');
            $.ajax({
                    url: url,
                    type: "GET",
                    data: {parcel_owner_type_id:parcel_owner_type_id},
                    success: function(response)
                    {
                        $('#merchant_client_id').html(response);
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
                    var url = $('#payToMerchantClientCreateList').data("url");
                    var from_date                    =  getValueFromSelectOption('from_date_id_class');
                    var to_date                      =  getValueFromSelectOption('to_date_id_class');
                    var merchant_client_id           =  getValueFromSelectOption('merchant_client_id_class');
                    var parcel_owner_type_id         =  getValueFromSelectOption('parcel_owner_type_id_class');
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {merchant_client_id:merchant_client_id,from_date:from_date,to_date:to_date,parcel_owner_type_id:parcel_owner_type_id},
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
    <input type="hidden" id="getDataByPagination" data-url="{{route('admin.payToMerchantClientCreateList')}}" >
    <script>
            $(document).on("click",".pagination li a",function(e){
                e.preventDefault();
                var page = $(this).attr('href');
                var pageNumber = page.split('?page=')[1];
                return getPagination(pageNumber);
            });//split == delete some things...

            function getPagination(pageNumber){
                var createUrl = $('#payToMerchantClientCreateList').data("url");
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
