		<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">


                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset($websetting->logo)}}" alt="" height="50">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($websetting->logo)}}" alt="" height="45">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset($websetting->logo)}}" alt="" height="50">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($websetting->logo)}}" alt="" height="45">
                            </span>
                        </a>
                    </div>
                    <!-- LOGO -->



                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>


                <div class="d-flex">

                  		<!-----------------------Header section---------------------------------->
							@include('backend.merchant.layouts.partials.header_language')
						<!-----------------------Header section---------------------------------->


                		<!-----------------------Header section---------------------------------->
							@include('backend.merchant.layouts.partials.header_notification')
						<!-----------------------Header section---------------------------------->


                 
						<!-----------------------Header section---------------------------------->
							@include('backend.merchant.layouts.partials.header_profile')
						<!-----------------------Header section---------------------------------->

                    
                </div>
            </div>
        </header>
