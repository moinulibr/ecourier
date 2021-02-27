@extends('backend.layouts.master')
@section('title','Order List')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Order List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Agent</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                        <strong>Total Percel</strong>
                        <span class="badge badge-primary" data-toggle="modal" data-target="#printModal" style="cursor:pointer;">Print</span>
                    <hr>
                <div class="table-responsive">
                    <table id="" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" value="all" name="check_all" class="check_all_class" />
                                </th>
                                <th>Parcel ID</th>
                                <th>Sender info</th>
                                <th>Customer info</th>
                                
                                <th>Address <br> Destination Area </th>
                                <th>Collection <br> Amount</th>
                                <th>Charge</th>
                                <th>COD Charge</th>
                                <th>
                                    <a data-toggle="modal" data-target="#myModal">Status</a>
                                </th>
                                <th>Order <br/>Tracking</th>
                                <th>Customer <br/>
                                    Service <br/>Charge<br/>Payment Status
                                </th>
                                <th>
                                    Parcel <br/>Amount<br/>Payment Status
                                </th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <input type="checkbox" name="checked_id[]" value="" class="check_single_class" id="{{$order->id}}" />
                                </td>
                                <td>
                                    <a href="#" class="viewSingleDataByAjax"   data-id="{{ $order->id }}" >
                                    {{ $order->invoice_no }}
                                    </a>
                                </td>
                                
                                <td>
                                    {{ $order->generalCustomer?$order->generalCustomer->name:'' }}
                                    {{ $order->generalCustomer?$order->generalCustomer->phone:'' }}
                                    
                                </td>
                                <td>
                                   
                                    {{ $order->customer->customer_name }} <br>
                                    {{ $order->customer->customer_phone }} <br>
                                  
                                </td>
                                <td>
                                    {{ $order->customer->address }} <br>
                                    {{ $order->area->area_name }} <br>
                                    {{ $order->district->name }}
                                </td>
                                <td> {{ $order->collect_amount }}  </td>
                                <td> {{ $order->service_charge }}  </td>
                                <td> {{ $order->cod_charge }}  </td>
                                <td>
                                    <span style="">
                                        {{ getOrderStatusByOrderStatus_HH($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span style="{{ orderStatusStyle_HH($order->order_status_id) }}">
                                        {{ $order->orderStatus?$order->orderStatus->order_status:'' }}
                                    </span>
                                </td>

                                <td>
                                    <strong {{ orderServiceChargeStatusByOrderId_HH($order->id)['style'] }}> 
                                        {{ orderServiceChargeStatusByOrderId_HH($order->id)['status'] }}
                                    </strong>
                                </td>
                                <td>
                                    <strong {{ orderParcelAmountPaymentStatusByOrderId_HH($order->id)['style'] }}> 
                                        {{ orderParcelAmountPaymentStatusByOrderId_HH($order->id)['status'] }}
                                    </strong>
                                </td>
 
                                <td>
                                    {{ $order->orderBranch?$order->orderBranch->company_name:'' }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-cogs"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="viewSingleDataByAjax"   data-id="{{ $order->id }}" >
                                                <li>
                                                    <i class="fa fa-eye"></i> View
                                                </li> {{-- data-target="#viewSingleDataByAjax" data-toggle="modal"--}}
                                            </a>
                                            <li>
                                                <a href="" class="edit"><i class="fa fa-edit"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('agent.print.order.invoice',$order->id) }}"><i class="fa fa-print"></i> Print</a>
                                            </li> 

                                            <li>
                                                <a id="delete" href="" class="delete"><i class="fa fa-trash"></i> Delete</a>
                                         </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                 </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



<!-- Modal -->
<div id="printModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
            <div class="form-group">
                <label>Select Status</label>
                <select id="status_id" name="status_id"  class="form-control" >
                    <option value="">Select Status</option>
                    @foreach(getOrderStatus_HH() as $key => $data)
                        <option value="{{$data['id']}}"> {{$data['name']}}</option>
                    @endforeach
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="print_now_id" href="#">Print Now</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       @foreach(getOrderStatus_HH() as $key => $data)
            <button id="status_id" name="status_id" value="{{$data['id']}}"class="status_id_class btn btn-md" >
                {{$data['name']}}
            </button> <br/>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


{{-- ----------------Fmor Modal randering---------------- --}}
{{-- --- class="viewSingleDataByAjax"   data-id="{{ $order->id }}" --}}
<!-- Modal -->
<div id="viewSingleDataByAjax" class="modal fade" role="dialog" aria-hidden="true" ></div>

    <div id="showSingleViewByAjax" data-url="{{ route('agent.showSingleViewByAjax')}}"></div>
    @section('ajaxdropdown')

    <script>
        
        //check_all_class
        //check_single_class
        $(document).on('click','.check_all_class',function(){
            if (this.checked == false)
            {
                $('.check_single_class').prop('checked', false).change(); 
                $(".check_single_class").each(function () 
                { 
                    var id = $(this).attr('id');
                    $(this).val('').change(); 
                }); 
            }else{
                $('.check_single_class').prop("checked", true).change();

                $(".check_single_class").each(function () 
                { 
                    var id = $(this).attr('id');
                    $(this).val(id).change(); 
                }); 
            }
        });
            //=======================
        $(document).on('click','.check_single_class',function(){
            var id = $(this).attr('id');
            if (this.checked == false)
            {
                $(this).prop('checked', false).change(); 
                $(this).val('').change(); 
            }else{
                $(this).prop("checked", true).change();
                $(this).val(id).change(); 
            }
            //=======================
        });


        /*----for print-----*/
        $(document).on('click','#print_now_id',function(){
            var ids = [];
            $('.check_single_class').each(function(index,value){
                ids[index] = $(this).val();
            });
            var url = "{{ route('agent.order.multipleSlipOfInvoicePrint') }}";
            console.log(url);
            $.ajax({
                url: url,
                data: {ids: ids},
                type: "GET",
                success: function(response){
                   // console.log(response);
                    $.print(response);
                },
            });
        });
        /*----for print-----*/
    </script>

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
    @endsection
    {{-- ----------------Fmor Modal randering End---------------- --}}


@endsection
