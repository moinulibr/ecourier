@extends('backend.layouts.master')
@section('title','Send To Other Branch')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Send To Other Branch  <small>(Admin)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Send To Other Branch</li>
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
                    <form action="{{route('admin.sendToOthersBranchFromAdminListStore')}}" method="POST">
                        @csrf
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Invoice No</label>
                               <input type="text" readonly class="form-control" name="payment_invoice_no" value="{{$invoice}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                               <label>Branch</label>
                               <select name="send_branch_id" class="form-control send_branch_id_class select2">
                                    <option value=""> Select One Branch</option>
                                    @foreach($branches as $item)
                                    <option value="{{$item->id}}">{{$item->company_name}}</option>
                                    @endforeach
                               </select>
                            </div>
                            </div>
                        <div class="col-md-3" style="display: none;">
                            <div class="form-group">
                               <label>Amount Type</label>
                               <select name="send_payment_type" class="form-control send_payment_type_class">
                                    <option value="1"> Parcel Price</option>
                                    <option value="2"> Charge Commission</option>
                                    <option value="3"> Parcel Price & Charge Commission</option>
                               </select>
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
                                                {{--  <th>Order No</th>
                                                <th>Service <br/> Charge</th>
                                                <th>COD <br/> Charge</th>
                                                <th>Other <br/> Charge</th>  --}}
                                                <th>Parcel  Amount</th>
                                               {{--   <th>Sub Total</th>  --}}
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
            if(amount > 0 )
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


    <div id="sendToOthersBranchFromAdminAjaxList" data-url="{{ route('admin.sendToOthersBranchFromAdminAjaxList')}}"></div>
    {{--Making Cart--}}
    <script>
        $(document).ready(function(){
            var ctrlDown = false,
            ctrlKey = 17,
            cmdKey = 91,
            vKey = 86,
            cKey = 67;
            $(document).on('keyup change','.send_branch_id_class,.send_payment_type_class,.from_date_id_class,.to_date_id_class',function(e)
            {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                    var url = $('#sendToOthersBranchFromAdminAjaxList').data("url");
                    var from_date                    =  getValueFromSelectOption('from_date_id_class');
                    var to_date                      =  getValueFromSelectOption('to_date_id_class');
                    var send_payment_type            =  getValueFromSelectOption('send_payment_type_class');
                    var send_branch_id               =  getValueFromSelectOption('send_branch_id_class');

                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {send_branch_id:send_branch_id,from_date:from_date,to_date:to_date,send_payment_type:send_payment_type},
                        success: function(response)
                        {
                            $('#showResult').html(response);
                            totalAmountBeforeAction();
                        },
                    });
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
                var url = $('#sendToOthersBranchFromAdminAjaxList').data("url");
                var from_date                   =  getValueFromSelectOption('from_date_id_class');
                var to_date                     =  getValueFromSelectOption('to_date_id_class');
                var send_payment_type           =  getValueFromSelectOption('send_payment_type_class');
                var send_branch_id               =  getValueFromSelectOption('send_branch_id_class');
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {send_branch_id:send_branch_id,send_payment_type:send_payment_type,from_date:from_date,to_date:to_date},
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
    <input type="hidden" id="getDataByPagination" data-url="{{route('admin.sendToOthersBranchFromAdminAjaxList')}}" >
    <script>
            $(document).on("click",".pagination li a",function(e){
                e.preventDefault();
                var page = $(this).attr('href');
                var pageNumber = page.split('?page=')[1];
                return getPagination(pageNumber);
            });//split == delete some things...

            function getPagination(pageNumber){
                var createUrl = $('#sendToOthersBranchFromAdminAjaxList').data("url");
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
