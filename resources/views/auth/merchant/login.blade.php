<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dakbd - Login</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('links/backend/01')}}/assets/images/favicon.ico">

    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/css/util.css">
        <link rel="stylesheet" type="text/css" href="http://deshdelivery.com/frontend/login/css/main.css">
    <!--===============================================================================================-->
    <style>
        .customCssForOTP{
            height: 55px;
            margin-top: -14%;
            z-index: 99999999999999;
            margin-right: 0px;
        }
        .customCssForPhone{
            border-radius: 0px !important;
            width: 75%;
        }
        .limiter{
            margin-top:200px;
        }
        
        .m-b-16 {
             margin-bottom: 0px; 
        }
        .p-b-23 {
                 padding-bottom: 0px; 
            }
        #errorMessage{
            text-align: right;
        }
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="{{route(merchantLoginFormSubmitRoute_HH)}}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    @csrf
                    <span class="login100-form-title">
						DakBD <br/>Sign In
					</span>
                    
                    @if (session('error'))
                    <div class="alert alert-danger" >
                        {{ session('error') }}
                    </div>
                    @endif

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Phone Number">
						<input class="input100 customCssForPhone" type="text" autocomplete="off" name="phone" id="phoneNumber" value="{{old('phone')}}" placeholder="Your Phone Number">
                        <button id="sendOtp" class="btn btn-success pull-right customCssForOTP">
							Send OTP
						</button>
                        <span class="focus-input100"></span>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <span id="errorMessage"></span>
					<div class="wrap-input100 validate-input" data-validate = "Please enter Otp Number">
						<input style="display: none;" id="otp" autocomplete="off" class="input100" type="text" name="password" value="{{old('password')}}" placeholder="OTP Code">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

                    <input type="hidden" name="expaireTime" id="optExire" value="">

					{{--  <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div>  --}}
                    <div class="text-right p-t-13 p-b-23"></div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn btn-danger" id="login" value="Sign in"> <br/>
                         <p id="demo"></p>
					</div>
                    <div class="flex-col-c p-t-170 p-b-40"></div>


					{{--  <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="#" class="txt3">
							Sign up now
						</a>
					</div>  --}}
				</form>
			</div>
		</div>
	</div>



    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/bootstrap/js/popper.js"></script>
        <script src="http://deshdelivery.com/frontend/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/daterangepicker/moment.min.js"></script>
        <script src="http://deshdelivery.com/frontend/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="http://deshdelivery.com/frontend/login/js/main.js"></script>

        

    <input type="hidden"  data-url="{{ route('makeOtpForMerchant') }}" id="sendOtpUrl"/>

    <!-----for Ajax handeling----->
    <script type="text/javascript">
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    </script>
    <!-----for Ajax handeling-----> 
    
{{-- -    <script src="{{ asset('custom-js/merchant/login/custom.js') }}"></script> --}}
    
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#sendOtp').attr('disabled','disabled');
            $('#login').attr('disabled','disabled');
            $('#login').css({
                'cursor':'no-drop'
            });
            $('#sendOtp').css({
                'cursor':'no-drop'
            });
            errorMessageRemove();
            var regexname=/^(?:\+88|88)?(01[3-9]\d{8})$/;
            otpTimeExpire('end');

            $('#phoneNumber').on('keyup keydown',function(ee){ //01712794033 keypress keydown

                if (!$(this).val().match(regexname)) {
                    $('#sendOtp').attr('disabled','disabled');
                    $('#otp').hide();
                    errorMessageShow();
                }
            else{
                    if($('#phoneNumber').val().length == 11)
                    {
                        $('#sendOtp').removeAttr('disabled','disabled');
                        $('#sendOtp').css({
                            'cursor':'pointer'
                        });

                        $('#sendOtp').unbind("click").click(function(e){
                            e.preventDefault();
                            $('#otp').val('');
                            var keyCode= e.which;//if(keyCode == 17)console.log(keyCode);
                            //$('#otp').show();
                            //===ajax request send to controller for sending otp code
                                var phone = $('#phoneNumber').val();
                                var url = $('#sendOtpUrl').data('url');
                                $('#sendOtp').attr('disabled','disabled');

                                $.ajax({
                                    url: url,
                                    type:'POST',
                                    data: {phone},
                                    datatype:"JSON",
                                    beforeSend:function(){
                                        //$('.loading').fadeIn();
                                    },
                                    success: function(data){
                                       
                                            if(data.status == 'success')
                                            {
                                                otpTimeExpire('start');
                                                $('#otp').show();

                                                $('#errorMessage').text('OTP is send  Your Phone');
                                                $('#errorMessage').css({
                                                    'color':'green',
                                                    'text-align':'center'
                                                });
                                                $('#optExire').val(data.expireTime);
                                            }else{
                                                $('#otp').hide();
                                                $('#errorMessage').text('Sorry! this phone number is not registered. So please register first.');
                                                $('#errorMessage').css({
                                                    'color':'red'
                                                });
                                                otpTimeExpire('end');
                                            }
                                        },
                                    complete:function(){
                                        //$('.loading').fadeOut();
                                    },
                                });
                                   
                                //end ajax
                              
                            //===ajax request send to controller for sending otp code

                            $('#otp').on('keyup keydown',function(){
                                if($(this).val().length > 3 )
                                {
                                    $('#login').removeAttr('disabled','disabled');
                                    $('#login').css({
                                        'cursor':'pointer'
                                    });
        
                                }else{
                                    $('#login').attr('disabled','disabled');
                                    $('#login').css({
                                        'cursor':'no-drop'
                                    });
                                }
                            });
                        });
                        errorMessageRemove();

                    }else{
                        $('#otp').hide();
                        $('#sendOtp').attr('disabled','disabled');
                        otpTimeExpire('end');
                    }
                    errorMessageRemove(); 
                }
            });


                function errorMessageShow(){
                    $('#errorMessage').text('Invalid phone number format');
                    $('#errorMessage').css({
                        'color':'red'
                    });
                }
                function errorMessageRemove(){
                    $('#errorMessage').text('');
                    $('#errorMessage').css({
                        'color':'white'
                    });
                }


                $(document).click(function(ee) {
                    ee.stopPropagation(); // This is the preferred method.
                    //return false;        // This should not be used unless you do not want
                                         // any click events registering inside the div
                });
        });
    </script>
        


    <input type="hidden" id="expireTime" value="{{merchantLoginOptExpireTime_HS()}}">
    <input type="hidden" id="expireTimeType" value="{{merchantLoginOptExpireTimeType_HS()}}">
    <!---------------------javascript time countdown ----------------------->
    

    <script>
        function otpTimeExpire(action){
           
                var date = new Date();
                  
                var getMin = date.getMinutes();
                var getSec = date.getSeconds();

                //============================
              var expairTime =   parseInt($('#expireTime').val());
              var expairTimeType =  $('#expireTimeType').val();
              var  minuteToSecond = 1;
             
              if(expairTimeType == 'minutes')
              {
                 minuteToSecond += (expairTime * 60);
                
              } 
              if(expairTimeType == 'seconds')
              {
                 minuteToSecond += expairTime ;
              }
              
                //var countDownDate=   date.setMinutes(getMin+2.20);
                var countDownDate=   date.setSeconds(getSec+minuteToSecond);

             
            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get today's date and time
              var now = new Date().getTime();
                
              // Find the distance between now and the count down date
              var distance = countDownDate - now;
                if(action != "start")
                {
                    distance = -1;
                }
              // Time calculations for days, hours, minutes and seconds
              /*var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));*/
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
              // Output the result in an element with id="demo"
              // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
              //+ minutes + "m " + seconds + "s ";
                
                if(distance > 0)
                {
                    document.getElementById("demo").innerHTML = minutes + " : " +seconds;
                }
              // If the count down is over, write some text 
              if (distance < 0) {

                stopInterval(x);
                clearInterval(x);
               
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    $('#demo').val('Time Expired');

                    $('#otp').hide();
                    $('#sendOtp').attr('disabled','disabled');
              }
            }, 1000);
                
        }//function
          
            function stopInterval(myInterval) {
                clearInterval(myInterval);
            }      
    </script>


    <script>
            function Interval(fn, time) {
                var timer = false;
                this.start = function () {
                    if (!this.isRunning())
                        timer = setInterval(fn, time);
                };
                this.stop = function () {
                    clearInterval(timer);
                    timer = false;
                };
                this.isRunning = function () {
                    return timer !== false;
                };
            }

            var i = new Interval(fncName, 1000);
            i.start();

            if (i.isRunning())
                // ...

            i.stop();
    </script>
        <!---------------------javascript time countdown ----------------------->

</body>
</html>

{{--  https://forum.jquery.com/topic/why-is-this-click-function-firing-twice  --}}


