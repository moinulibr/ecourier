@extends('frontend.main')
@section('title','Home')
@section('content')
 

        <!--start agent section-->
    <section class="agent-section py-5">
        <div class="container">
           <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Agent Registration</h2>
                        <hr>    
                    </div> 
                </div>
            </div>
                <form action="{{ route('registration.agent.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf
            <div class="row">

                

                <div class="col-md-8">  <!--for personal information -->
                <div class="row">
                 <div class="col-md-6 col-6 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Agent Name">
                           <div class="text-danger">{{ $errors->first('name') }}</div>
                       </div>
                 </div>
               <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Company Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Company Name">
                            <div class="text-danger">{{ $errors->first('company_name') }}</div>
                       </div>
                 </div>
               <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Agent Email">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                       </div>
                 </div>
                <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Mobile <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Agent Mobile">
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                       </div>
                 </div>
                <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Password <span class="text-danger">*</span></label>
                           <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter new Password">   
                            <div class="text-danger">{{ $errors->first('password') }}</div>            
                     </div>
                 </div>
                     
                 <div class="col-6 col-md-6">
                        <label for="">Pickup Area <span class="text-danger">*</span></label>
                          <select name="area_id" class="form-control select2">
                              <option value="">Select Area</option>
                              @foreach($districts as $district)
                                <optgroup label="{{ $district->name }}">
                                  @foreach($district->area as $value)
                                    <option {{ old('area_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->area_name }}</option>
                                  @endforeach
                                </optgroup>
                              @endforeach
                          </select>
                           <div class="text-danger">{{ $errors->first('area_id') }}</div>
                            <br>
                    </div>
                      
                <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Confirm Password  <span class="text-danger">*</span></label>
                           <input type="password" class="form-control" name="com_password" value="{{ old('com_password') }}" placeholder="Enter Confirm password">
                            <div class="text-danger">{{ $errors->first('com_password') }}</div>
                       </div>
                 </div>
                 
                 
                 <div class="col-12 col-md-6">
                        <label for="">Office Address</label>
                        <textarea name="office_address" id="" class="form-control" placeholder="Enter office Address">{{ old('office_address') }}</textarea>
                         <div class="text-danger">{{ $errors->first('office_address') }}</div>
                </div>      
                       
                <div class="col-12 col-md-6">
                        <br>
                        <label for="">Company Onwer NID Number</label>
                        <input type="text" name="nidnumber" class="form-control" value="{{ old('nidnumber') }}" placeholder="NID Number">
                         <div class="text-danger">{{ $errors->first('nidnumber') }}</div>
                </div>
                 
                <div class="col-12 col-md-6">
                        <br>
                        <label for="">NID Card Picture front & Back (PDF) <span class="text-danger">*</span></label>
                        <input type="file" name="nidcardpdf" class="form-control" value="{{ old('nidcardpdf') }}" placeholder="NID Card picture " accept=".pdf">
                         <div class="text-danger">{{ $errors->first('nidcardpdf') }}</div>
                </div>             
                       
                <div class="col-12 col-md-6">
                        <br>
                        <label for="">Company Trade License  </label>
                        <input type="file" name="companytradelicense"  value="{{ old('companytradelicense') }}" class="form-control" placeholder="Company Trade License  ">
                        <div class="text-danger">{{ $errors->first('companytradelicense') }}</div>
                </div>                
                       
                 <div class="col-12 col-md-6">
                       <br>
                        <label for=""> Father NID Card Picture (PDF)<span class="text-danger">*</span></label>
                        <input type="file" name="fathernid" class="form-control" placeholder="Father Card picture " accept=".pdf">
                        <div class="text-danger">{{ $errors->first('fathernid') }}</div>
                </div> 
                
                                            
                
            </div>
                
            </div>
                
                <div class="col-md-4"> <!--office information -->
                   <div class="row">
                   <div class="col-md-12">
                       <h5>Payment Information</h5>
                       <hr>
                   </div>
                    
                
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label"> Payment Method :</label>
                        <div class="col-sm-12">
                             <select name="payment_type" id="payment_type" class="form-control" required>
                                 <option  value=" ">Select  Payment Method</option>
                                 <option  value="1">Mobile Banking </option>
                                 <option  value="2">Bank</option>
                                 <option  value="3">Cash</option>
                            </select>
                             <div class="text-danger"></div>
                        </div>
                    </div>
                </div>





                        <div class="col-sm-12" id="one">
                           <div class="form-group">
                                <label class="col-sm-12 col-form-label"> Mobile Banking Name :   </label>
                                <div class="col-sm-12">
                                    <input type="text" name="mbankingname" value="" class="form-control" placeholder="Enter Name"> 
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12" id="two">

                            <div class="form-group">
                                <label class="col-sm-12 col-form-label"> Account Mobile Mumber :</label>
                                <div class="col-sm-12">
                                    <input type="text" name="mbankingnumber" value="" class="form-control" placeholder="Enter mobile number">
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12" id="three">

                                <div class="form-group">
                                <label class="col-sm-12 col-form-label"> Bank Name :</label>
                                <div class="col-sm-12">
                                    <input type="text" name="bankname" value="" class="form-control" placeholder="Enter bank name" >
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                         </div>

                          <div class="col-sm-12" id="four">
                           <div class="form-group">
                                <label class="col-sm-12 col-form-label"> Bank Brunch :   </label>
                                <div class="col-sm-12">
                                    <input type="text" name="bankbrunch" value="" class="form-control" placeholder="Enter bank brunch Name"> 
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12" id="five">
                             <div class="form-group">
                                <label class="col-sm-12 col-form-label">  Bank Account Name :</label>
                                <div class="col-sm-12">
                                    <input type="text" name="accountname" value="" class="form-control" placeholder="Enter Account name">
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                        </div> 

                        <div class="col-sm-12" id="six">
                             <div class="form-group">
                                <label class="col-sm-12 col-form-label">  Bank Account Number :</label>
                                <div class="col-sm-12">
                                    <input type="text" name="accountnumber" value="" class="form-control" placeholder="Enter account number">
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12" id="seven">
                             <div class="form-group">
                                <label class="col-sm-12 s-form-label">  Bank Account Type :</label>
                                <div class="col-sm-12">
                                    <select name="account_type" id="account_type" class="form-control">
                                      <option value="">Select Type</option>
                                      <option value="1">Saving Account</option>
                                      <option value="2">Current Account</option>
                                    </select>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>                             
                </div>
                
                <div class="col-md-12">
                    <br>
                    <button class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Submit</button>
                </div>
        
            </div>
             </form>
        </div>
    </section>
    <!--end agent section-->

@section('merchantformjs')

<script>
    $('#one').hide();
    $('#two').hide();
    $('#three').hide();
    $('#four').hide();
    $('#five').hide();
    $('#six').hide();
    $('#seven').hide();


    $('#payment_type').on('change',function(){
        var payment_type = $('#payment_type').val();


        if(payment_type==1){
            $('#one').show();
            $('#two').show();
            $('#three').hide();
            $('#four').hide();
            $('#five').hide();
            $('#six').hide();
            $('#seven').hide();
        }
        else if(payment_type==2)
        {
            $('#one').hide();
            $('#two').hide();
            $('#three').show();
            $('#four').show();
            $('#five').show();
            $('#six').show();
            $('#seven').show();
        }
        else if(payment_type==3)
        {
            $('#one').hide();
            $('#two').hide();
            $('#three').hide();
            $('#four').hide();
            $('#five').hide();
            $('#six').hide();
            $('#seven').hide();
        }

    });

</script>
@endsection
@endsection