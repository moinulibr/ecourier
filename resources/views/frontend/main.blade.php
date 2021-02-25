<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home | DakBD Curier</title>
    <link rel="shortcut icon" href="logo/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Open+Sans:wght@400;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!--font-awesome-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/font-awesome-4.7.0/css/font-awesome.css">
    <!--slick.css-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick.css">
    <!--slick.theme.css-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick-theme.css">
    <!--uikit.min.css-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/uikit.min.css">
    <!--animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/style.css">
    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
</head>

<body>
    <!-- preloader start -->
    <div id="pre-loader"> <img src="{{ asset('public/frontend') }}/images/preloader-120.svg" alt=""> </div>
    <!-- preloader end -->

    <!--start header-->
    <header class="wow fadeInDown clearfix" data-wow-duration="1s">
        <div class="top-bar2">
            <div class="theme-container container">
                <div class="row">
                    <div class="col-lg-2 col-sm-12 align-self-center logo-col">
                        <a class="navbar-logo" href="index.html"> <img src="{{ asset('public/frontend') }}/logo/logo.png" alt="logo" class="logo">
                        </a>
                        <i class="fa fa-bars menu-icon"></i>

                    </div>
                    <div class="col-lg-10 col-sm-12 align-self-center">
                        <ul class="list-inline">
                            <li>
                                <h6 class="font2-light"> Head office </h6>
                                <p class="theme-clr  font2-title1">  Darus Salam, Dhaka, Bangladesh</p>
                            </li>
                            <li>
                                <h6 class="font2-light"> Want to meet? </h6>
                                <p class="theme-clr  font2-title1">  24/7 </p>
                            </li>
                            <li>
                                <h6 class="font2-light"> Need a help? </h6>
                                <p class="theme-clr font2-title1">  (+880) 1705-466007 </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar" uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">
            <div class="container">
                <div class="menu-area mr-auto">
                    <ul>
                        <li><a href="{{ url('/') }}"> Home</a></li>
                        <li><a href="{{ route('about') }}"> About us</a></li>
                        <li class="dd-btn1"><a href="#"><i class="fa fa-wpforms"></i> Registration <i class="fa fa-angle-down"></i></a>

                            <div class="dropdown-menu1">
                                <ul>
                                    <li><a href="{{ route('merchant') }}"><i class="fa fa-user"></i> Merchant</a></li>
                                    <li><a href="{{ route('agent') }}"><i class="fa fa-home"></i> Agent</a></li>
                                    <li><a href="{{ route('deliveryman') }}"><i class="fa fa-motorcycle"></i> Delivery Man</a></li>
                                </ul>
                            </div>

                        </li>


                        <li><a href="{{ url('/') }}"> Coverage Area</a></li>
                        <li><a href="{{ route('contact') }}"> Contact us</a></li>
                        <li><a href="#" class=" menu-phone"><i class="fa fa-phone"></i> Call us +8801705-466007</a></li>
                        
                        <li></li>
                    </ul>
                </div>
                <div class="log-reg">
                    <a href="{{ route(showMerchantLoginFormRoute_HH) }}"><i class="fa fa-sign-in"></i> <span class="m-log">Login</span></a>
                </div>
            </div>
        </nav>
    </header>
    <!--end header-->
    <!--start mobile menu-->
    <div class="mobile-menu">
        <div class="mm-logo" style="background: #fff; padding: 11px 18px;">
            <a href="#">
                <img style="width: 55px;" src="{{ asset('public/frontend') }}/logo/logo.png" alt="logo">
            </a>
            <div class="mm-cross-icon">
                <i class="fa fa-times mm-ci"></i>
            </div>
        </div>
        <div class="mm-menu">
            <div class="accordion" id="accordionExample">
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('frontend') }}">Home</a>
                    </div>
                    <div class="menu-link">
                        <a href="{{ route('about') }}">About Us</a>
                    </div>
                     
                </div>
                <div class="menu-box">
                    <div class="menu-link" id="headingSix">
                        <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseSix"> Registration<i class="fa fa-plus"></i></a>
                    </div>
                    <div id="collapseSix" class="collapse menu-body" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="{{ route('merchant') }}"><i class="fa fa-user"></i> Merchant</a></li>
                                <li><a href="{{ route('agent') }}"><i class="fa fa-home"></i> Agent</a></li>
                                <li><a href="{{ route('deliveryman') }}"><i class="fa fa-motorcycle"></i> Delivery Man</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <style>
                    .scroll-div-dist {
                        background: #ececec !important;
                    }

                </style>
                
                
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('contact') }}"> Contact</a>
                    </div>
                </div>
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('contact') }}"><i class="fa fa-phone"></i> +8801779-325718</a>
                    </div>
                </div>
                 
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route(showMerchantLoginFormRoute_HH) }}">  Login </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end mobile menu-->



    @yield('content')


    <!--start footer section-->
    <footer class="footer-section wow animate__animated animate__fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">About Us</h5>
                        <div class="ft-logo">
                            <img src="{{ asset('public/frontend') }}/logo/logo.png" alt="">
                            <p>Your trusted delivery partner</p>
                            <a href="#"><img style="width: 140px;" class="image" src="{{ asset('public/frontend') }}/images/google-play-badge.svg" alt="google play icon"></a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">Important links</h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Coverage Area</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">How to reach us</h5>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-map-marker"></i>
                                <div class="media-body">
                                    <span>Darus Salam, Dhaka, Bangladesh</span>
                                </div>
                            </div>
                        </div>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-phone"></i>
                                <div class="media-body">
                                    <span>Phone : (+880) 1705-466007</span> 
                                </div>
                            </div>
                        </div>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-envelope"></i>
                                <div class="media-body">
                                    <span>Email: <a href="#">dakbd7@gmail.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">Get connected</h5>
                        <div class="ft-social my-3">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                        <small>© DAKBD 2021. All rights reserved</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer section-->

    <!--jquery.min.js-->
    <script src="{{ asset('public/frontend') }}/js/jquery-3.4.1.min.js"></script>
    <!--popper.min.js-->
    <script src="{{ asset('public/frontend') }}/js/popper.min.js"></script>
    <!--bootstrap.min.js-->
    <script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
    <!--main.js-->
    <script src="{{ asset('public/frontend') }}/js/main.js"></script>
    <!--slick.js-->
    <script src="{{ asset('public/frontend') }}/js/slick.js"></script>
    <!--owl.imagesloaded.js-->
    <script src="{{ asset('public/frontend') }}/js/imagesloaded.pkgd.min.js"></script>

    <script src="{{ asset('public/frontend') }}/js/jquery.scrollUp.min.js"></script>

    <script src="{{ asset('public/frontend') }}/js/wow.min.js"></script>
    <!--waypoints.min.js-->
    <script src="{{ asset('public/frontend') }}/js/jquery.waypoints.min.js"></script>
    <!--counterup.min.js-->
    <script src="{{ asset('public/frontend') }}/js/jquery.counterup.min.js"></script>
    <!--uikit-icons.js-->
    <script src="{{ asset('public/frontend') }}/js/uikit-icons.js"></script>
    <!--uikit.min.js-->
    <script src="{{ asset('public/frontend') }}/js/uikit.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/mixitup.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.parent-container').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options
        });



        $(document).ready(function() {
            $('.select2').select2();
        });

        
    </script>
    <script>
        $(document).ready(function() {
            /*counter-up*/
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });

        });

    </script>

    <script>
        $(document).ready(function() {
            $('.zoom').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            var mixer = mixitup(".mixit-js");
        });

    </script>


    <script>
        $(document).ready(function() {

            /*wow.js*/
            new WOW().init();

        });

    </script>

    <script>
        // Preloader Start
        var AUTOFIREBOX = {};
        var $window = $(window);

        AUTOFIREBOX.preloader = function() {
            $("#load").fadeOut();
            $('#pre-loader').delay(0).fadeOut('slow');
        };

        $window.on("load", function() {
            AUTOFIREBOX.preloader();
        }); // Preloader End

        // scrollToTop
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

    </script>
    <script>
        $(document).ready(function() {

            /*wow.js*/
            new WOW().init();

            /*mobile menu*/
            $('.menu-icon').on('click', function() {
                $('.mobile-menu').toggleClass('mobile-menu-active');
            });
            $('.mm-ci').on('click', function() {
                $('.mobile-menu').toggleClass('mobile-menu-active');
            });


        });

    </script>
    <script>
        $(document).ready(function() {
            // Add minus icon for collapse element which is open by default
            $(".collapse.show").each(function() {
                $(this).prev(".menu-link").find(".fa-minus").addClass("fa-minus").removeClass("fa-plus");
            });

            // Toggle plus minus icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function() {
                $(this).prev(".menu-link").find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
            }).on('hide.bs.collapse', function() {
                $(this).prev(".menu-link").find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
            });
            /*mobile-menu-click*/
            $('.mmenu-btn').click(function() {
                $(this).toggleClass("menu-link-active");

            });
        });

    </script>


    @yield('merchantformjs')


</body>

</html>
