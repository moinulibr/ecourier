		<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">


                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{route('manpowerDashboardRoute')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('links/backend/01')}}/assets/images/logo-dark-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('links/backend/01')}}/assets/images/logo-dark.png" alt="" height="18">
                            </span>
                        </a>

                        <a href="{{route('manpowerDashboardRoute')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('links/backend/01')}}/assets/images/logo-light-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('links/backend/01')}}/assets/images/logo-light.png" alt="" height="18">
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
							@include('backend.manpower.layouts.partials.header_language')
						<!-----------------------Header section---------------------------------->


                		<!-----------------------Header section---------------------------------->
							@include('backend.manpower.layouts.partials.header_notification')
						<!-----------------------Header section---------------------------------->


                 
						<!-----------------------Header section---------------------------------->
							@include('backend.manpower.layouts.partials.header_profile')
						<!-----------------------Header section---------------------------------->

                    
                </div>
            </div>
        </header>
