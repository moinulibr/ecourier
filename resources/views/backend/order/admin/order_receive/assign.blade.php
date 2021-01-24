    @extends('backend.layouts.master')
    @section('title','Receive Parcel')
    @section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Receive Parcel</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Receive Parcel</li>
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

                    <form action="{{ route('admin.receive_quickAssignParcelStoreFromCart') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                                <label>Invoice No</label>
                                <div class="form-group ">
                                    <input type="text"  id="order_id" value="" placeholder="Invoice No" class="form-control" autofocus>
                                </div>
                            </div>
                        </div>
                     

                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-md-9 col-lg-9">
                                <div class="row">
                                    <div class="table-responsive dt-responsive">
                                        <table  class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                <th>Sl.</th>
                                                <th>Order ID</th>
                                                <th>Status</th>
                                                <th>Creating Branch</th>
                                                <th><small>Receiving From (Branch)</small></th>
                                                <th>Destination Branch</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showResult">
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td >
                                                        <a href="#" id="clearAll" class="btn btn-sm btn-danger clearAll">Clear All</a>
                                                    </td>
                                                </tr>
                                            </tfooter>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-3 col-lg-3">
                                <h4>Receive Parcel</h4>
                                <hr>
                                

                                <div class="form-group">
                                     <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                        Received
                                    </button>
                                </div>



                            </div>

                        </div>


                    </form>

                    </div>
                </div>
            </div>
        </div>






 <div id="quickAssignParcelAddCart" data-url="{{ route('admin.receive_quickAssignParcelAddCart')}}"></div>
 <div id="quickAssignParcelExistCart" data-url="{{ route('admin.receive_quickAssignParcelExistCart')}}"></div>
 <div id="quickAssignParcelRemoveSingleCart" data-url="{{ route('admin.receive_quickAssignParcelRemoveSingleCart')}}"></div>
 <div id="quickAssignParcelRemoveCart" data-url="{{ route('admin.receive_quickAssignParcelRemoveCart')}}"></div>

    @section('ajaxdropdown')

        {{--some functionality--}}
        <script>
            $(document).ready(function(){
                $('#submit').attr('disabled','disabled');
                submitDisableEnabled(0);

                $(document).on('click','.clickForGetId',function(){
                    submitDisableEnabled(1);
                });

                $(document).on('click','.clearAll',function(){
                     $('#submit').attr('disabled','disabled');
                });
            });

            function submitDisableEnabled(row = 0)
            {
                var totalRow        = $('#total_row').val();
                var total = totalRow - row;
                //console.log(total +" , row = "+ row);
                if(total  > 0)
                {
                    $('#submit').removeAttr('disabled','disabled');
                }else{
                    $('#submit').attr('disabled','disabled');
                }
            }
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
                $(document).on('keyup change','#order_id',function(e)
                {
                    if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
                    if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
                        var url = $('#quickAssignParcelAddCart').data("url");
                        //var invoice_no = $(this).val();
                        var invoice_no      = $('#order_id').val();
                        
                    if(invoice_no.length > 4)
                    {
                        $.ajax({
                            url: url,
                            type: "GET",
                            data: {invoice_no:invoice_no},
                            success: function(response)
                            {
                                $('#showResult').html(response);
                                $('#order_id').val('');
                                $('#order_id').attr('autofocus','autofocus');
                                submitDisableEnabled();
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
                             submitDisableEnabled();
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
