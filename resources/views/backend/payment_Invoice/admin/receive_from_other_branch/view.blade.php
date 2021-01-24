@extends('backend.layouts.master')
@section('title','Receive Invoices From Other Branch')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Receive Invoices From Other Branch  <small>(Admin)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">
                        Receive Invoices From Other Branch
                    </li>
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
                    <div class="row" >
                       {{--  <div class="col-md-6">
                            <div class="form-group">
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
                        </div> --}}
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="table-responsive dt-responsive" id="tshowResult">
                                    <table  class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Invoice No</th>
                                                <th>Amount</th>
                                                <th>Created Date</th>
                                                <th>From Branch</th>
                                                <th>Status</th>
                                                <th style="width:10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($invoices as $key=> $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>
                                                        <a href="{{route('admin.receiveFromOtherBranchSingleView',$item->id)}}">
                                                            {{$item->payment_invoice_no}}
                                                        </a>    
                                                    </td>
                                                    <td>{{$item->payment_amount}}</td>
                                                    <td>{{date('Y-m-d h:i:s',strtotime($item->payment_at))}}</td>
                                                    <td>
                                                        {{$item->fromBranchs?$item->fromBranchs->company_name:''}}
                                                    </td>
                                                    <td>
                                                        @if (!$item->payment_received_by)
                                                            <a href="{{route('admin.receivingFromOtherBranchNow',$item->id)}}" class="badge badge-info">
                                                                Receive Now
                                                            </a>
                                                        @else
                                                        <span class="badge badge-primary">Received</span>
                                                        @endif
                                                    </td>
                                                    <td style="width:10%;">
                                                        <a href="{{route('admin.receiveFromOtherBranchSingleView',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
        
                    </div>

                </div>
            </div>
        </div>
    </div>



@section('ajaxdropdown')

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
