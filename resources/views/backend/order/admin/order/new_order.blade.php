@extends('backend.layouts.master')
@section('title','Add New Parcel')
@section('content')
	<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Parcel</h4>

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
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <select name="merchant_id" id="merchant_id" class="merchant_id_class form-control">
                                      <option value=""> Select Merchant Name</option>
                                      @foreach($merchants as $merchant)
                                      <option {{ old('merchant_id') ==  $merchant->id?'selected':'' }} value="{{ $merchant->id }}">{{ $merchant->name }}</option>
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
                                      <input type="text" value="{{ old('customer_phone') }}" name="customer_phone" class="form-control" placeholder="Customer Mobile Number" >
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
                                  <div class="col-xs-12 col-sm-12 col-lg-12" >
                                      <div class="form-group">
                                          <select name="weight_id" id="weight_id_id" class="weight_id_class form-control">
                                            <option value="">Select Weight</option>
                                            @foreach($weights as $weight)
                                            <option {{ old('weight_id') == $weight->id ?'selected':''}} value="{{ $weight->id }}">{{ $weight->name }}</option>
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
                                                      <option {{ old('area_id') == $value->id ?'selected':''}} value="{{ $value->id }}">{{ $value->area_name }}</option>
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
                                            <input value="{{ old('collect_amount') }}" type="text" name="collect_amount" id="collect_amount_id" class="form-control collect_amount_class" placeholder="Collection Amount">
                                      </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                                <input type="text" name="product_amount"  value="{{ old('product_amount') }}" class="form-control" placeholder="Product Price">
                                                <div style='color:red; padding: 0 5px;'>{{($errors->has('product_amount'))?($errors->first('product_amount')):''}}</div>
                                          </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                          <div class="form-group">
                                            <textarea name="parcel_description" class="form-control" placeholder="Enter Percel instructions"></textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('parcel_description'))?($errors->first('parcel_description')):''}}</div>
                                          </div>
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


                                    


<div id="getmerchantshop" data-url="{{ url('getMerchantShopAjax')}}"></div>
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
<input type="hidden" id="ifOrderExisting" data-url="{{route('ifOrderExisting')}}" >
<input type="hidden" id="makingDeliveryCharge" data-url="{{route('makingDeliveryCharge')}}" >
<script>
  //============default Details of Delivery Charge section ==========
    $(document).ready(function(){
        ifOrderExisting();
    });

    function ifOrderExisting()
    {
        var url = $('#ifOrderExisting').data("url");
        $.ajax({
            url: url,
            type: "GET",
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
         if(collectAmount.length > 0)
          {
            var url = $('#makingDeliveryCharge').data("url");
            $.ajax({
                url: url,
                type: "GET",
                data: {merchantId:merchantId,merchantShopId:merchantShopId,weightId:weightId,
                    areaId:areaId,parcelCategoryId:parcelCategoryId,parcelTypeId:parcelTypeId,
                    serviceTypeId:serviceTypeId,collectAmount:collectAmount
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
                  serviceTypeId:serviceTypeId,collectAmount:collectAmount
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

</script>
@endsection
@endsection
