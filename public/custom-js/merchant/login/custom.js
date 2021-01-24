$(document).ready(function() {

            $('#sendOtp').attr('disabled', 'disabled');
            $('#login').attr('disabled', 'disabled');
            $('#login').css({
                'cursor': 'no-drop'
            });
            $('#sendOtp').css({
                'cursor': 'no-drop'
            });
            errorMessageRemove();
            var regexname = /^(?:\+88|88)?(01[3-9]\d{8})$/;




            $('#phoneNumber').on('keyup keydown', function(ee) { //01712794033 keypress keydown
                if (!$(this).val().match(regexname)) {
                    $('#sendOtp').attr('disabled', 'disabled');
                    $('#otp').hide();
                    errorMessageShow();
                } else {
                    if ($('#phoneNumber').val().length == 11) {
                        $('#sendOtp').removeAttr('disabled', 'disabled');
                        $('#sendOtp').css({
                            'cursor': 'pointer'
                        });

                        $('#sendOtp').unbind("click").click(function(e) {
                            e.preventDefault();
                            var keyCode = e.which; //if(keyCode == 17)console.log(keyCode);
                            $('#otp').show();
                            //===ajax request send to controller for sending otp code
                            var phone = $('#phoneNumber').val();
                            var url = $('#sendOtpUrl').data('url');
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: { phone },
                                datatype: "JSON",
                                beforeSend: function() {
                                    //$('.loading').fadeIn();
                                },
                                success: function(data) {
                                    console.log(data);
                                    if (data == 'success') {
                                        $('#errorMessage').text('OTP is send  Your Phone');
                                        $('#errorMessage').css({
                                            'color': 'green'
                                        });
                                    } else {
                                        $('#errorMessage').text('Sorry! this phone number is not registered. So please register first.');
                                        $('#errorMessage').css({
                                            'color': 'red'
                                        });
                                    }
                                },
                                complete: function() {
                                    //$('.loading').fadeOut();
                                },
                            });
                            //end ajax

                            //===ajax request send to controller for sending otp code

                            $('#otp').on('keyup keydown', function() {
                                if ($(this).val().length > 3) {
                                    $('#login').removeAttr('disabled', 'disabled');
                                    $('#login').css({
                                        'cursor': 'pointer'
                                    });

                                } else {
                                    $('#login').attr('disabled', 'disabled');
                                    $('#login').css({
                                        'cursor': 'no-drop'
                                    });
                                }
                            });
                        });
                        errorMessageRemove();

                    } else {
                        $('#otp').hide();
                        $('#sendOtp').attr('disabled', 'disabled');
                    }
                    errorMessageRemove();
                }
            });




            {
                {
                    --$('#phoneNumber').on('keyup', function(ee) { //01712794033 keypress keydown
                        if (!$(this).val().match(regexname)) {
                            $('#sendOtp').attr('disabled', 'disabled');
                            $('#otp').hide();
                            errorMessageShow();
                        } else {
                            var keyCodeCheck = ee.which; //if(keyCode == 17)console.log(keyCode);

                            console.log(keyCodeCheck)

                            if (keyCodeCheck == 17 || keyCodeCheck == 86) {
                                return false;
                            } else {
                                phoneNumberLengthCount();
                            }
                            errorMessageRemove();
                        }
                        // pressing otp code function
                        pressingOTPCode();
                    });
                    --
                }
            }
            //phone number pressing end here

            //phoneNumberLengthCount();

            // pressing otp code function
            {
            {
                -- function pressingOTPCode() {
                    $('#otp').on('keyup', function() {
                        if ($(this).val().length > 3) {
                            $('#login').removeAttr('disabled', 'disabled');
                            $('#login').css({
                                'cursor': 'pointer'
                            });

                        } else {
                            $('#login').attr('disabled', 'disabled');
                            $('#login').css({
                                'cursor': 'no-drop'
                            });
                        }
                    });
                } //end pressingOTPCode funciton  --}}

                {
                    {
                        --

                        function phoneNumberLengthCount() {
                            if ($('#phoneNumber').val().length == 11) {
                                $('#sendOtp').removeAttr('disabled', 'disabled');
                                $('#sendOtp').css({
                                    'cursor': 'pointer'
                                });

                                $('#sendOtp').click(function(e) {
                                    e.preventDefault();
                                    var keyCode = e.which; //if(keyCode == 17)console.log(keyCode);
                                    if (keyCode == 1) {
                                        console.log("Click = " + keyCode)

                                        $('#otp').show();
                                        //===ajax request send to controller for sending otp code
                                        var phone = $('#phoneNumber').val();
                                        var url = $('#sendOtpUrl').data('url');
                                        $.ajax({
                                            url: url,
                                            type: 'POST',
                                            data: { phone },
                                            datatype: "JSON",

                                            beforeSend: function() {
                                                //$('.loading').fadeIn();
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                if (data == 'success') {
                                                    $('#errorMessage').text('OTP is send  Your Phone');
                                                    $('#errorMessage').css({
                                                        'color': 'green'
                                                    });
                                                } else {
                                                    $('#errorMessage').text('Sorry! this phone number is not registered. So please register first.');
                                                    $('#errorMessage').css({
                                                        'color': 'red'
                                                    });
                                                }
                                            },
                                            complete: function() {
                                                //$('.loading').fadeOut();
                                            },
                                        });
                                        //end ajax
                                    }
                                    //===ajax request send to controller for sending otp code
                                });

                                // pressing otp code function
                                pressingOTPCode();
                                errorMessageRemove();

                            } else {
                                $('#otp').hide();
                                $('#sendOtp').attr('disabled', 'disabled');
                            }
                        }
                        --
                    }
                }


                function errorMessageShow() {
                    $('#errorMessage').text('Invalid phone number format');
                    $('#errorMessage').css({
                        'color': 'red'
                    });
                }

                function errorMessageRemove() {
                    $('#errorMessage').text('');
                    $('#errorMessage').css({
                        'color': 'white'
                    });
                }


                $(document).click(function(ee) {
                    ee.stopPropagation(); // This is the preferred method.
                    //return false;        // This should not be used unless you do not want
                    // any click events registering inside the div
                });
            });


























{{--  <script type="text/javascript">
    $(document).ready(function(){
          --}}
        {{--  
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
                            var keyCode= e.which;//if(keyCode == 17)console.log(keyCode);
                            $('#otp').show();
                            //===ajax request send to controller for sending otp code
                                var phone = $('#phoneNumber').val();
                                console.log(phone);
                                var url = $('#sendOtpUrl').data('url');
                                    $.ajax({
                                    url: url,
                                    type:'POST',
                                    data: {phone},
                                    datatype:"JSON",
                                    beforeSend:function(){
                                        //$('.loading').fadeIn();
                                    },
                                    success: function(data){
                                        console.log(data);
                                            if(data == 'success')
                                            {
                                                $('#errorMessage').text('OTP is send  Your Phone');
                                                $('#errorMessage').css({
                                                    'color':'green'
                                                });
                                            }else{
                                                $('#errorMessage').text('Sorry! this phone number is not registered. So please register first.');
                                                $('#errorMessage').css({
                                                    'color':'red'
                                                });
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
                    }
                    errorMessageRemove(); 
                }
            });  
        --}}




        {{--  $('#phoneNumber').on('keyup',function(ee){ //01712794033 keypress keydown
                if (!$(this).val().match(regexname)) {
                    $('#sendOtp').attr('disabled','disabled');
                    $('#otp').hide();
                    errorMessageShow();
                }
            else{
                    var keyCodeCheck = ee.which;//if(keyCode == 17)console.log(keyCode);
                    
                    console.log(keyCodeCheck)

                    if(keyCodeCheck == 17 || keyCodeCheck == 86 )
                    {
                        return false;
                    }
                    else{
                        phoneNumberLengthCount();
                    }
                    errorMessageRemove();
                }
                // pressing otp code function
                pressingOTPCode();
            });  
        --}}
            //phone number pressing end here

            //phoneNumberLengthCount();

            // pressing otp code function
        {{--  function pressingOTPCode()
            {
                $('#otp').on('keyup',function(){
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
            }//end pressingOTPCode funciton  
        --}}

        {{--
            function phoneNumberLengthCount()
            {
                if($('#phoneNumber').val().length == 11)
                {
                    $('#sendOtp').removeAttr('disabled','disabled');
                    $('#sendOtp').css({
                        'cursor':'pointer'
                    });

                    $('#sendOtp').click(function(e){
                        e.preventDefault();
                        var keyCode= e.which;//if(keyCode == 17)console.log(keyCode);
                        if(keyCode == 1)
                        {
                        console.log("Click = " +keyCode)
                        
                        $('#otp').show();
                        //===ajax request send to controller for sending otp code
                            var phone = $('#phoneNumber').val();
                            var url = $('#sendOtpUrl').data('url');
                                $.ajax({
                                url: url,
                                type:'POST',
                                data: {phone},
                                datatype:"JSON",

                                beforeSend:function(){
                                    //$('.loading').fadeIn();
                                },
                                success: function(data){
                                    console.log(data);
                                        if(data == 'success')
                                        {
                                            $('#errorMessage').text('OTP is send  Your Phone');
                                            $('#errorMessage').css({
                                                'color':'green'
                                            });
                                        }else{
                                            $('#errorMessage').text('Sorry! this phone number is not registered. So please register first.');
                                            $('#errorMessage').css({
                                                'color':'red'
                                            });
                                        }
                                    },
                                complete:function(){
                                    //$('.loading').fadeOut();
                                },
                            });
                             //end ajax
                            }
                        //===ajax request send to controller for sending otp code
                    });

                    // pressing otp code function
                    pressingOTPCode();
                    errorMessageRemove();

                }else{
                    $('#otp').hide();
                    $('#sendOtp').attr('disabled','disabled');
                }
            }
        --}}


        {{--   
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
        --}}
{{--      });
</script>  --}}
    















