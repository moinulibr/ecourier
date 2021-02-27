<body>
    <!-- preloader start -->
    <div id="pre-loader"> <img src="{{ asset('public/frontend') }}/images/preloader-120.svg" alt=""> </div>
    <!-- preloader end -->

    <!--start header-->
    <header class="wow fadeInDown clearfix" data-wow-duration="1s">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand align-self-center" href="{{ url('/') }}">
                    <img src="{{ asset($websetting->logo) }}" class="logo" alt="Logo">
                </a>

                <div class="menu-area ml-auto">
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
                        <li><a href="#" class=" menu-phone"><i class="fa fa-phone"></i> Call us +8801779-325718</a></li>
                        
                        <li><a href="{{ route(showMerchantLoginFormRoute_HH) }}"> <span class="m-log">Login</span></a></li>
                    </ul>
                </div>
                <i class="fa fa-bars menu-icon"></i>

            </div>
        </nav>
    </header>
    <!--end header-->
    <!--start mobile menu-->
    <div class="mobile-menu">
        <div class="mm-logo" style="background: #fff; padding: 11px 18px;">
            <a href="{{ url('/') }}">
                <img style="width: 55px;" src="{{ asset($websetting->logo) }}" alt="logo">
            </a>
            <div class="mm-cross-icon">
                <i class="fa fa-times mm-ci"></i>
            </div>
        </div>
        <div class="mm-menu">
            <div class="accordion" id="accordionExample">
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="index.html">Home</a>
                    </div>
                    <div class="menu-link">
                        <a href="about.html">About Us</a>
                    </div>
                     
                </div>
                <div class="menu-box">
                    <div class="menu-link" id="headingSix">
                        <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseSix"> Registration<i class="fa fa-plus"></i></a>
                    </div>
                    <div id="collapseSix" class="collapse menu-body" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> Merchant</a></li>
                                <li><a href="#"><i class="fa fa-home"></i> Agent</a></li>
                                <li><a href="#"><i class="fa fa-motorcycle"></i> Delivery Man</a></li>
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
                        <a href="contact.html"> Contact</a>
                    </div>
                </div>
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="contact.html"><i class="fa fa-phone"></i> +8801779-325718</a>
                    </div>
                </div>
                 
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="login.html"> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end mobile menu-->