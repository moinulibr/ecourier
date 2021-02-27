@extends('backend.layouts.master')
@section('title','Add New Parcel')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Parcel (Agent)</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">New Parcel</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

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
                    <h4 class="card-title">Create New Parcel</h4>
                    <hr>
                    <form action="{{ route('agent.order.store') }}" method="post">
                        @csrf

                          <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                   <label style="margin-right:5px;">
                                     <input type="radio" name="parcel_owner_type_id"  id="customer" value="2" class="bookInFrom">
                                      <span>From General Customer</span>
                                   </label>
                                   <label>
                                    <input type="radio" checked name="parcel_owner_type_id" id="merchant" value="1" class="bookInFrom">
                                      <span>From Merchant</span>
                                      </label>
                                </div>
                          </div>
                        <div class="row" id="bookedInFromMerchant" style="display:none">
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <select name="merchant_id" id="merchant_id" class="merchant_id_class form-control">
                                      <option value=""> Select Merchant Name</option>
                                      @foreach($merchants as $merchant)
                                      <option {{ old('merchant_id') == $merchant->id ?'selected':'' }} value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                      @endforeach
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('merchant_id'))?($errors->first('merchant_id')):''}}</div>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <select name="merchant_shop_id" id="merchant_shop_id" class="merchant_shop_id_class form-control">
                                      <option value=""> Select Shop</option>
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('merchant_shop_id'))?($errors->first('merchant_shop_id')):''}}</div>
                                  </div>
                            </div>
                        </div>

                        <div class="row" id="bookedInFromGeneralCustomer" style="display:none">
                            <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Sender Name" >
                                      <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Sender Phone" >
                                      <div style='color:red; padding: 0 5px;'>{{($errors->has('phone'))?($errors->first('phone')):''}}</div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                   <textarea name="g_c_address" class="form-control" placeholder="Enter Sender Address"></textarea>
                                   <div style='color:red; padding: 0 5px;'>{{($errors->has('g_c_address'))?($errors->first('g_c_address')):''}}</div>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                      <select name="g_c_area_id" id="" class="form-control select2">
                                            <option value="">Select Area</option>
                                            @foreach($districts as $district)
                                              <optgroup label="{{ $district->name }}">
                                                @foreach($district->area as $value)
                                                  <option {{ old('g_c_area_id') == $value->id?'selected':'' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                @endforeach
                                              </optgroup>
                                            @endforeach
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('g_c_area_id'))?($errors->first('g_c_area_id')):''}}</div>
                                  </div>
                            </div>
                        </div>



                        <hr>
                        <div class="row">

                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                              <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control" placeholder="Customer Name" >
                                              <div style='color:red; padding: 0 5px;'>{{($errors->has('customer_name'))?($errors->first('customer_name')):''}}</div>
                                          </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                      <div class="form-group">
                                          <input type="text" name="customer_phone" class="form-control" placeholder="Customer Mobile Number" >
                                          <div style='color:red; padding: 0 5px;'>{{($errors->has('customer_phone'))?($errors->first('customer_phone')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                      <div class="form-group">
                                          <textarea name="address"  class="form-control" placeholder="Customer Address"></textarea>
                                          <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                                      </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                              <input type="text" class="form-control" value="{{ old('merchant_invoice') }}" name="merchant_invoice" placeholder="Customer Invoice ID">
                                              <div style='color:red; padding: 0 5px;'>{{($errors->has('merchant_invoice'))?($errors->first('merchant_invoice')):''}}</div>
                                            </div>
                                      </div>
                                      <div class="col-xs-12 col-sm-12 col-lg-12" id="weight_div_id" style="display:none">
                                          <div class="form-group">
                                              <select name="weight_id" id="weight_id_id" class="weight_id_class form-control">
                                                <option value="">Select Weight</option>
                                                @foreach($weights as $weight)
                                                <option {{ old('weight_id') == $weight->id?'selected':'' }} value="{{ $weight->id }}">{{ $weight->name }}</option>
                                                @endforeach
                                              </select>
                                              <div style='color:red; padding: 0 5px;'>{{($errors->has('weight_id'))?($errors->first('weight_id')):''}}</div>
                                          </div>
                                      </div>

                                    {{--  <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <label for="">Product Category</label>
                                          <div class="form-check mb-4">
                                            @foreach($parcelcategories as $key => $category)
                                            <input class="form-check-input parcel_category_id_class" type="radio" name="parcel_category_id"  value="{{ $category->id }}" {{ $key == 0 ? 'checked' : ''  }}>
                                            <label class="form-check-label" for="" style="width:45%">
                                                  {{ $category->name }}
                                            </label>
                                            @endforeach
                                        </div>
                                      </div>  --}}
                                </div>
                            </div>


                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <select name="area_id" id="area_id_id" class="area_id_class form-control select2">
                                                  <option value="">Select Area</option>
                                                  @foreach($districts as $district)
                                                    <optgroup label="{{ $district->name }}">
                                                      @foreach($district->area as $value)
                                                        <option  {{ old('area_id') == $weight->id?'selected':'' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                      @endforeach
                                                    </optgroup>
                                                  @endforeach
                                              </select>
                                              <div style='color:red; padding: 0 5px;'>{{($errors->has('area_id'))?($errors->first('area_id')):''}}</div>
                                        </div>
                                      </div>

                                   {{--   <div class="col-xs-12 col-sm-12 col-lg-12">
                                        <label for="">Select The Cateria</label>
                                        <div class="form-check mb-3">
                                          @foreach($service_typies as $key => $service)
                                            <input class="form-check-input service_type_id_class" type="radio" name="service_type_id" id="" value="{{ $service->id }}" {{ $key ==0 ? 'checked': '' }}>
                                            <label class="form-check-label" for="" style="width:40%">
                                                {{ $service->name }}
                                            </label>
                                          @endforeach
                                        </div>
                                    </div>  --}}



                                      <div class="col-xs-12 col-sm-12 col-lg-12">
                                      <div class="form-group">
                                            <input type="text" value="{{ old('collect_amount') }}" name="collect_amount" id="collect_amount_id" class="form-control collect_amount_class" placeholder="Collection Amount">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('collect_amount'))?($errors->first('collect_amount')):''}}</div>
                                          </div>
                                      </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                                <input type="text" name="net_product_amount" value="{{ old('net_product_amount') }}" class="form-control" placeholder="Product Price">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('net_product_amount'))?($errors->first('net_product_amount')):''}}</div>
                                              </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                            <textarea name="parcel_description" class="form-control" placeholder="Enter Percel instructions"></textarea>
                                          </div>
                                          <div style='color:red; padding: 0 5px;'>{{($errors->has('parcel_description'))?($errors->first('parcel_description')):''}}</div>
                                        </div>

                                    {{--  <div class="col-xs-12 col-sm-12 col-lg-12">
                                        <label for="">Parcel Type</label>
                                        <div class="form-check mb-3">
                                          @foreach($parcel_typies  as $key => $type)
                                            <input class="form-check-input parcel_type_id_class" type="radio" name="parcel_type_id " value="{{ $type->id }}" {{ $key==0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="" style="width:30%">
                                                  {{ $type->name }}
                                            </label>
                                          @endforeach
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>


                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <h4>Details of Delivery Charge</h4>
                                <hr>
                                <table id="showResult" class="table table-bordered">
                                </table>
                            </div>


                            <div class="col-xs-12 col-md-12 col-lg-12">
                              <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                                    Submit
                                </button>
                            </div>
                        </div>

                            <!------ hidden field------------>
                                <input class="form-check-input parcel_category_id_class" type="hidden" name="parcel_category_id"  value="1">
                                <input class="form-check-input service_type_id_class" type="hidden" name="service_type_id" id="" value="1">
                                <input class="form-check-input parcel_type_id_class" type="hidden" name="parcel_type_id" value="1">
                            <!------ hidden field------------>
                    </form>

                  </div>
              </div>
          </div>
      </div>


                                    


<div id="getmerchantshop" data-url="{{ route('agent.getMerchantShopAjax')}}"></div>
@section('ajaxdropdown')
  <script>
        $('#merchant_id').on('change', function(){
           var merchant_id =  $(this).val();
           var url         =  $('#getmerchantshop').data("url");
           $.ajax({
              url: url,
              data: {merchant_id:merchant_id},
              type: "GET",
              success: function(response){
                  $('#merchant_shop_id').html(response);
              },
           });
        });
</script>

{{--if cart is exist and some calculational function, totalItem()--}}
<input type="hidden" id="ifOrderExisting" data-url="{{route('agent.ifOrderExisting')}}" >
<input type="hidden" id="makingDeliveryCharge" data-url="{{route('agent.makingDeliveryCharge')}}" >
<script>
  //============default Details of Delivery Charge section ==========
    $(document).ready(function(){
        ifOrderExisting();
        $('.bookInFrom').click(function(){
          ifOrderExisting();
        });
    });

    function ifOrderExisting()
    {
        var url = $('#ifOrderExisting').data("url");
        var parcel_owner_type_id =  $('.bookInFrom:checked').val();
        $.ajax({
            url: url,
            type: "GET",
            data:{parcel_owner_type_id:parcel_owner_type_id},
            success: function(response)
            {
              $('#showResult').html(response);
            },
        });
    }
    //============default Details of Delivery Charge section End ==========


    // .merchant_id_class  , .merchant_shop_id_class , .weight_id_class  , parcel_category_id_class
    // .area_id_class  , .service_type_id_class  , .collect_amount_class , .parcel_type_id_class
    $(document).on('click, change','.parcel_category_id_class,.service_type_id_class,.parcel_type_id_class,.merchant_id_class,.merchant_shop_id_class,.weight_id_class,.area_id_class',function(e){
        e.preventDefault();
         var merchantId = getValueFromSelectOption('merchant_id_class');
         var merchantShopId = getValueFromSelectOption('merchant_shop_id_class');
         var weightId = getValueFromSelectOption('weight_id_class');
         var areaId = getValueFromSelectOption('area_id_class');
         var parcelCategoryId = getValueFromRadioButtonOption('parcel_category_id_class');
         var parcelTypeId = getValueFromRadioButtonOption('parcel_type_id_class');
         var serviceTypeId = getValueFromRadioButtonOption('service_type_id_class');
        
         var collectAmount = $('.collect_amount_class').val();
         var parcel_owner_type_id =  $('.bookInFrom:checked').val();
         if(collectAmount.length > 0)
          {
            var url = $('#makingDeliveryCharge').data("url");
            $.ajax({
                url: url,
                type: "GET",
                data: {merchantId:merchantId,merchantShopId:merchantShopId,weightId:weightId,
                    areaId:areaId,parcelCategoryId:parcelCategoryId,parcelTypeId:parcelTypeId,
                    serviceTypeId:serviceTypeId,collectAmount:collectAmount,parcel_owner_type_id:parcel_owner_type_id
                  },
                success: function(response)
                {
                    $('#showResult').html(response);
                },
            });
          }else{
            ifOrderExisting();
          }
      });

    $(document).on('keyup','.collect_amount_class',function(e){
        e.preventDefault();
         var merchantId = getValueFromSelectOption('merchant_id_class');
         var merchantShopId = getValueFromSelectOption('merchant_shop_id_class');
         var weightId = getValueFromSelectOption('weight_id_class');
         var areaId = getValueFromSelectOption('area_id_class');
         var parcelCategoryId = getValueFromRadioButtonOption('parcel_category_id_class');
         var parcelTypeId = getValueFromRadioButtonOption('parcel_type_id_class');
         var serviceTypeId = getValueFromRadioButtonOption('service_type_id_class');
         var collectAmount = $('.collect_amount_class').val();
         var parcel_owner_type_id =  $('.bookInFrom:checked').val();
         var ctrlDown = true,
         ctrlKey = 17,
         cmdKey = 91,
         vKey = 86,
         cKey = 67;

         if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
         if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
         if(collectAmount.length > 0)
          {
            var url = $('#makingDeliveryCharge').data("url");
            $.ajax({
                url: url,
                type: "GET",
                data: {merchantId:merchantId,merchantShopId:merchantShopId,weightId:weightId,
                  areaId:areaId,parcelCategoryId:parcelCategoryId,parcelTypeId:parcelTypeId,
                  serviceTypeId:serviceTypeId,collectAmount:collectAmount,parcel_owner_type_id:parcel_owner_type_id
                  },
                success: function(response)
                {
                    $('#showResult').html(response);
                },
            });
          }else{
            ifOrderExisting();
          }
          //console.log("Select "+ getValueFromSelectOption('merchant_id_class'));
          //console.log("Radio "+ getValueFromRadioButtonOption('parcel_type_id_class'));
      });



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




  //=============================================================================
    $('.bookInFrom').click(function(){
       var checked =  $('.bookInFrom:checked').val();
       parcelOwnerType(checked);
    });
    //default checked
     var checked =  $('.bookInFrom:checked').val();
     parcelOwnerType(checked);
    function parcelOwnerType(checked)
    {
      if(checked == 1)
       {
          $('#bookedInFromGeneralCustomer').hide(200);
          $('#bookedInFromMerchant').show(200);
          $('#weight_div_id').show(200);
       }
      else if(checked == 2)
       {
         $('#bookedInFromMerchant').hide(200);
         $('#weight_div_id').hide(200);
         $('#bookedInFromGeneralCustomer').show(200);
       }
       else{
            $('#bookedInFromMerchant').hide(200);
            $('#bookedInFromGeneralCustomer').hide(200);
            $('#weight_div_id').hide(200);
       }
    }

    $(document).on('keyup keydown change','.charge',function(){
      var delivery = parseInt($('#deliveryCharge').val());
      var cod = parseInt($('#codCharge').val());
      var collectAmount = parseInt($('#collect_amount').val());
      var codValue = 0;
      var deliveryValue = 0;
      var collectValue = 0;
      if(isNaN(cod) || cod == "")
      {
        codValue = 0;
      }else{
          codValue = cod;
      }
      if(isNaN(delivery) || delivery == "")
      {
        deliveryValue = 0;
      }else{
          deliveryValue = delivery;
      }
      if(isNaN(collectAmount) || collectAmount == "")
      {
        collectValue = 0;
      }else{
          collectValue = collectAmount;
      }
      var total = collectValue -(deliveryValue + codValue) ;
      $('#total_payable_amount_id').text(total);
      $('#total_payable_amount').val(total);
    });


</script>
@endsection
@endsection
