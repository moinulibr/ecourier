@extends('backend.layouts.master')
@section('title','Order Assigned List')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Order Assigned List  <small>(Admin)</small></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Order Assigned List</li>
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
                    <form action="{{route('admin.pdfDownloadManpowerOrderAssingedList')}}" method="GET">
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Manpower List</label>
                                <select name="manpower_id" id="manpower_id" class="manpower_id_class form-control select2">
                                    <option value="">Select One Manpower</option>
                                    @foreach($manpowers as $manpower)
                                    <option value="{{$manpower->id}}">{{$manpower->name}}</option>
                                    @endforeach
                                </select>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('manpower_id'))?($errors->first('manpower_id')):''}}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             <label>Order Processing Type</label>
                                <select name="order_processing_type_id" id="order_processing_type_id" class="order_processing_type_id_class form-control ">
                                    <option value="">Order Processing  Type</option>
                                    @foreach($processing_typies as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('order_processing_type_id'))?($errors->first('order_processing_type_id')):''}}</div>
                            </div>
                        </div>
                    </div>


                    <div class="row" >
                        <div class="col-12 col-md-3">
                            <label>From Date</label>
                            <input type="text" name="from_date" id="from_date_id"  @if(isset($from_date))   value="{{ $from_date }}" @endif placeholder=" From Date" class="from_date_id_class form-control datepicker">
                        </div>

                        <div class="col-12 col-md-3">
                            <label>To Date</label>
                            <input type="text" name="to_date" id="to_date_id" @if(isset($to_date))   value="{{ $to_date }}" @endif  placeholder="To Date " class="to_date_id_class form-control datepicker">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                             <label>Order Assigning Status</label>
                                <select name="order_assigning_status_id" id="order_assigning_status_id" class="order_assigning_status_id_class form-control ">
                                    @foreach($orderAssigningStatuses as $type)
                                    <option {{$type->id == 2?'selected':''}} value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('order_assigning_status_id'))?($errors->first('order_assigning_status_id')):''}}</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-1" >
                            <a style="color:white;font-weight:bold;" href="#" id="print" class"btn btn-info btn-lg btnPrint">
                                <div style="padding:50% 16%; margin-right: -20%; font-size:15px;background-color:green;height:100%;">
                                    <a style="background-color: darkslategray;padding: 6% 9%;color:white;font-weight:bold;" href="#" id="print" class"btn btn-info btn-lg btnPrint">
                                        Print
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-1" >
                                <div style="padding:50% 25%; margin-left: -20%; font-size:15px;background-color:blue;height:100%;">
                                    <input type="submit" value="PDF" style="margin-top: -7%;;padding: 2% 3%;" />
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
                                                <th>Invoice No</th>
                                                <th>Customer Invoice</th>
                                                <th>Collect <br/> Amount</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
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

    <div id="showManpowerOrderAssingedList" data-url="{{ route('admin.showManpowerOrderAssingedList')}}"></div>
    {{--Making Cart--}}
    <script>
        $(document).ready(function(){
            var ctrlDown = false,
            ctrlKey = 17,
            cmdKey = 91,
            vKey = 86,
            cKey = 67;
            $(document).on('keyup change','.manpower_id_class,.order_processing_type_id_class,.order_assigning_status_id_class,.from_date_id_class,.to_date_id_class',function(e)
            {
                if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                    var url = $('#showManpowerOrderAssingedList').data("url");
                    var manpower_id                 =  getValueFromSelectOption('manpower_id_class');
                    var order_processing_type_id    =  getValueFromSelectOption('order_processing_type_id_class');
                    var order_assigning_status_id    =  getValueFromSelectOption('order_assigning_status_id_class');
                    var from_date                   =  getValueFromSelectOption('from_date_id_class');
                    var to_date                      =  getValueFromSelectOption('to_date_id_class');
                    
                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {manpower_id:manpower_id,order_assigning_status_id:order_assigning_status_id,order_processing_type_id:order_processing_type_id,from_date:from_date,to_date:to_date},
                        success: function(response)
                        {
                            $('#showResult').html(response);
                        },
                    });
            });
        });
    </script>


    {{---Print----}}
    <div id="printManpowerOrderAssingedList" data-url="{{ route('admin.printManpowerOrderAssingedList')}}"></div>
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
                var url = $('#showManpowerOrderAssingedList').data("url");
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
                        $('#showResult').html(response);
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
    <input type="hidden" id="getDataByPagination" data-url="{{route('admin.manpowerAssignedOrder')}}" >
    <script>
            $(document).on("click",".pagination li a",function(e){
                e.preventDefault();
                var page = $(this).attr('href');
                var pageNumber = page.split('?page=')[1]; 
                return getPagination(pageNumber);
            });//split == delete some things...

            function getPagination(pageNumber){
                var createUrl = $('#showManpowerOrderAssingedList').data("url");
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
<div id="showSingleViewByAjax" data-url="{{ route('admin.showSingleViewByAjax')}}"></div>
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
