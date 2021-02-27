    @extends('backend.layouts.master')
    @section('title','Assign Parcel')
    @section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Parcel Assign</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Assign Parcel</li>
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

                    <form action="{{ route('agent.quickAssignParcelStoreFromCart') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                                <label>Invoice No</label>
                                <div class="form-group ">
                                    <input type="text"  id="order_id" value="" placeholder="Invoice No" class="form-control" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Current Status</label>
                                    <select name="current_status_id" id="current_status_id" class="current_status_id_class form-control">
                                        @foreach ($current_statuses as $item)
                                              <option {{old('current_status_id')== $item->id?'selected':'' }} value="{{$item->id}}">{{$item->order_status}}</option>
                                        @endforeach
                                        {{--  <option value="">All Status</option>  --}}
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('current_status_id'))?($errors->first('current_status_id')):''}}</div>
                                    <input type="hidden" name="current_statusId" id="CurrentStatusId" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                 <label>Area</label>
                                    <select name="from_or_to_area_id" id="from_or_to_area_id" class="from_or_to_area_id_class form-control select2">
                                        <option value="">Select Area</option>
                                        @foreach($districts as $district)
                                            <optgroup label="{{ $district->name }}">
                                            @foreach($district->area as $value)
                                                <option {{ old('from_or_to_area_id') == $value->id?'selected':'' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                            @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('from_or_to_area_id'))?($errors->first('from_or_to_area_id')):''}}</div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="table-responsive dt-responsive">
                                        <table  class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                <th>Sl.</th>
                                                <th>Order ID</th>
                                                <th>Status</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showResult">
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td >
                                                        <a href="#" id="clearAll" class="btn btn-sm btn-danger clearAll">Clear All</a>
                                                    </td>
                                                </tr>
                                            </tfooter>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <h4>Set Status With Manpower</h4>
                                <hr>
                                <div class="form-group">
                                    <label> Changing Status </label>
                                    <select name="changing_status_id" id="changing_status_id" required class="changing_status_id_class form-control select2">
                                        <option value="">Select Changing Status</option>
                                        @foreach ($assinging_statuses as $item)
                                              <option {{old('changing_status_id')== $item->id?'selected':'' }} value="{{$item->id}}">{{$item->order_status}}</option>
                                        @endforeach
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('changing_status_id'))?($errors->first('changing_status_id')):''}}</div>
                                </div>
                                <div class="form-group" id="manpower_div_id" style="display:none">
                                    <label> Manpower List </label>
                                      <select name="manpower_id" id="manpower_id"  class="manpower_id_class form-control select2">
                                      <option value="">Select Manpower</option>
                                     @foreach ($manpowers as $item)
                                        <option {{old('manpower_id') == $item->id?'selected':'' }} value="{{$item->id}}">{{$item->name}}</option>
                                     @endforeach
                                     </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('manpower_id'))?($errors->first('manpower_id')):''}}</div>
                                </div>

                                <div class="form-group">
                                     <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                        Submit
                                    </button>
                                </div>



                            </div>

                        </div>


                    </form>

                    </div>
                </div>
            </div>
        </div>






 <div id="quickAssignParcelAddCart" data-url="{{ route('agent.quickAssignParcelAddCart')}}"></div>
 <div id="quickAssignParcelExistCart" data-url="{{ route('agent.quickAssignParcelExistCart')}}"></div>
 <div id="quickAssignParcelRemoveSingleCart" data-url="{{ route('agent.quickAssignParcelRemoveSingleCart')}}"></div>
 <div id="quickAssignParcelRemoveCart" data-url="{{ route('agent.quickAssignParcelRemoveCart')}}"></div>

    @section('ajaxdropdown')

        {{--some functionality--}}
        <script>
            $(document).ready(function(){
                $('#submit').attr('disabled','disabled');
                submitDisableEnabled();

                $(document).on('change','.manpower_id_class,.changing_status_id_class',function(){
                    submitDisableEnabled();
                });
                $(document).on('click','.clickForGetId',function(){
                    submitDisableEnabled(1);
                });
                $(document).on('click','.clearAll',function(){
                     $('#submit').attr('disabled','disabled');
                });

            });

            function submitDisableEnabled(row = 0)
            {
                var changing_status =  getValueFromSelectOption('changing_status_id_class');
                var manpower        =  getValueFromSelectOption('manpower_id_class');
                var totalRow        = $('#total_row').val();
                var total = totalRow - row;
                //console.log(total +" , row = "+ row);
                if(changing_status && total  > 0)
                {
                    $('#submit').removeAttr('disabled','disabled');
                }else{
                    $('#submit').attr('disabled','disabled');
                }
            }


            //======================================
            $(document).on('click','.clickForGetId',function(e){
                e.preventDefault();
               currentStatusFixed(1);
            });
            $('.clearAll').click(function(){
                $('.current_status_id_class').css({'color':'black'});
                $('.current_status_id_class').removeAttr('disabled','disabled');
            });
            $(document).on('click','.current_status_id_class',function(){
               currentStatusFixed();
            });
            function currentStatusFixed(row = 0)
            {
                var totalRow    = $('#total_row').val();
                var statusValue =  $('.current_status_id_class').val();
                var total = totalRow - row;
                if(total > 0)
                {
                    $('#CurrentStatusId').val(statusValue);
                    $('.current_status_id_class').css({'color':'red'});
                    $('.current_status_id_class').attr('disabled','disabled');
                }else{
                    $('.current_status_id_class').css({'color':'black'});
                    $('.current_status_id_class').removeAttr('disabled','disabled');
                    $('#CurrentStatusId').val(statusValue);
                }
            }
            //======================================
        </script>

        {{--Remove Single cart--}}
        <script>
            $(document).on('click','.clickForGetId',function(e)
            {
                    $('#order_id').attr('autofocus','autofocus');
                        var url = $('#quickAssignParcelRemoveSingleCart').data("url");
                        var invoice_no = $('.clickForGetId').data('id');
                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {invoice_no:invoice_no},
                        success: function(response)
                        {
                            $('#showResult').html(response);
                            $('#order_id').attr('autofocus','autofocus');
                        },
                    });
            });
        </script>


        {{--clear all cart--}}
        <script>
            $(document).on('click','#clearAll',function(e)
            {
                e.preventDefault();
                var url = $('#quickAssignParcelRemoveCart').data("url");
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response)
                    {
                        $('#showResult').html(response);
                        $('#order_id').attr('autofocus','autofocus');
                    },
                });
            });
        </script>



        {{--Making Cart--}}
        <script>
            $(document).ready(function(){

                var ctrlDown = false,
                ctrlKey = 17,
                cmdKey = 91,
                vKey = 86,
                cKey = 67;
                    //current_status_id_class , from_or_to_area_id_class

                $(document).on('keyup change','#order_id ,.current_status_id_class,.from_or_to_area_id_class',function(e)
                {
                    if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                    if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                        var url = $('#quickAssignParcelAddCart').data("url");
                        //var invoice_no = $(this).val();
                        var invoice_no      = $('#order_id').val();
                        var currentStatusId =  getValueFromSelectOption('current_status_id_class');
                        var fromToAreaId    =  getValueFromSelectOption('from_or_to_area_id_class');

                    if(invoice_no.length > 4)
                    {
                        $.ajax({
                            url: url,
                            type: "GET",
                            data: {invoice_no:invoice_no,currentStatusId:currentStatusId,fromToAreaId:fromToAreaId},
                            success: function(response)
                            {
                                $('#showResult').html(response);
                                $('#order_id').val('');
                                $('#order_id').attr('autofocus','autofocus');
                            },
                        });
                    }
                });
            });
        </script>



        {{--if cart is exist--}}
        <script>
            $(document).ready(function(){
                    var url = $('#quickAssignParcelExistCart').data("url");
                    $('#order_id').attr('autofocus','autofocus');
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(response)
                        {
                            $('#order_id').val('');
                            $('#order_id').attr('autofocus','autofocus');
                            $('#showResult').html(response);
                        },
                    });
                });
        </script>


        <script>
            $(document).ready(function(){
                manpowerShowHide();
            });
            $(document).on('change','.changing_status_id_class',function(){
                manpowerShowHide();
            });
            function manpowerShowHide()
            {
                var status   = getValueFromSelectOption('changing_status_id_class');
                if(status == 3 || status == 13)
                {
                    $('#manpower_div_id').show(200);
                    $('.manpower_id_class').attr('requried','requried');
                }else{
                    $('#manpower_div_id').hide(200);
                    $('.manpower_id_class').removeAttr('requried','requried');
                }
            }
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
