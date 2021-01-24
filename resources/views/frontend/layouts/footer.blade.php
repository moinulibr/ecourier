
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
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="#">Coverage Area</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">How to reach us</h5>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-map-marker"></i>
                                <div class="media-body">
                                    <span>Baliadangi, Thakurgaon (5041), Rangpur, Bangladesh</span>
                                </div>
                            </div>
                        </div>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-phone"></i>
                                <div class="media-body">
                                    <span>Phone : +8801755430927</span>
                                </div>
                            </div>
                        </div>
                        <div class="ft-contact">
                            <div class="media">
                                <i class="fa fa-envelope"></i>
                                <div class="media-body">
                                    <span>Email: <a href="#">info@hawladercurier.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ft-item wow animate__animated animate__fadeInUp">
                        <h5 class="ft-title">Get connected</h5>
                        <div class="ft-social my-3">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                        <small>© Hawlader Courier 2020. <br> All rights reserved</small>
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
    <!--owl.carousel.js-->
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

    <script>
        $('.parent-container').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options
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
        /* nav*/
        $(window).scroll(function() {
            $('header').toggleClass('scrolled', $(this).scrollTop() > 70);
        });

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
