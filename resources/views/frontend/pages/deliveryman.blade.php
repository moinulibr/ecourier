@extends('frontend.main')
@section('title','Home')
@section('content')

      <!--start agent section-->
    <section class="agent-section py-5"> 
        <div class="container">
           <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Delivery Man Registration</h2>
                        <hr>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">  <!--for personal information -->
                  <form method="post" action="{{ route('deliveryman.agent.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                 <div class="col-md-6 col-6 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Delivery Man Name">
                       </div>
                 </div>
                      
                <div class="col-md-6 col-6 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Father Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="father_name" value="{{ old('father_name') }}" placeholder="Enter father Name">
                       </div>
                 </div>
                <div class="col-md-6 col-6 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Mother Name <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name') }}" placeholder="Enter Mother Name">
                       </div>
                 </div>
                 
                <div class="col-md-6 col-6 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Father Mobile Number <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="father_mobile" value="{{ old('father_mobile') }}" placeholder="Enter Father Mobile Number">
                       </div>
                 </div>
                
               <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Email </label>
                           <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Delivery Man Email">
                       </div>
                 </div>
                <div class="col-md-6 col-12 col-lg-6 col-xl-6">
                       <div class="form-group">
                           <label for="">Mobile <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Delivery Man Mobile">
                       </div>
                 </div>
                   
                
                <div class="col-12 col-md-6">
                        
                        <label for="">NID Number</label>
                        <input type="text" name="nidnumber" class="form-control" value="{{ old('nidnumber') }}" placeholder="NID Number">
                </div>

                <div class="col-12 col-md-6">
                       <label for="">Address</label>
                      <textarea class="form-control"  name="address" placeholder="Address">{{ old('address') }}</textarea>
                </div>
                 
                <div class="col-12 col-md-6">
                        <br>
                        <label for="">NID Card Picture front & Back (PDF)  </label>
                        <input type="file" name="nidcardpage" class="form-control" value="{{ old('nidcardpage') }}" placeholder="NID Card picture ">
                </div>             
                                       
                       
                 <div class="col-12 col-md-6">
                       <br>
                        <label for=""> Father NID Card Picture (PDF) </label>
                        <input type="file" name="fathernid" class="form-control" placeholder="Father Card picture ">
                </div> 
                
                      
                <div class="col-12 col-md-6">
                       <br>
                        <label for=""> CV (PDF)<span class="text-danger">*</span></label>
                        <input type="file" name="cvfile" class="form-control" value="{{ old('cvfile') }}" placeholder="Father Card picture ">
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



@endsection