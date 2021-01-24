        <div class="vertical-menu">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route(merchantDashboardRoute_HH) }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-dark-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-dark.png" alt="" height="18">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-light-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-light.png" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                
                {{---For Agent Sidebar--}}
                @if(accessableCheckForMerchant_HP(Auth::guard('merchant')->user()->role_id))
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                       <li>
                            <a href="{{ route('merchant.order.create') }}" class="waves-effect">
                                <i class="icon nav-icon" data-feather="plus"></i>
                                <span class="menu-item" key="t-plus">Create Parcel</span>
                            </a>
                        </li>
                        
                       

                        <li>
                            <a href="{{ route(merchantDashboardRoute_HH) }}" class="waves-effect">
                                <i class="icon nav-icon" data-feather="home"></i>
                                <span class="menu-item" key="t-dashboards">Dashboards</span>
                            </a>
                        </li>                           
                        <li>
                            <a href="{{ route('merchant.order.index') }}"  >
                                <i data-feather="shopping-cart"></i>
                                <span class="menu-item" key="t-layouts">All Parcel</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('merchant.payments') }}"  >
                                 <i data-feather="database"></i>
                                <span class="menu-item" key="t-layouts">Payments</span>
                            </a>
                        </li>
  
                        <li>
                            <a href="{{ route('merchant.shop.index') }}"  >
                                 <i data-feather="home"></i>
                                <span class="menu-item" key="t-layouts">Shops</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <!-- Sidebar -->
                @endif
                {{---For Agent Sidebar end--}}
                <!-- Sidebar -->
            </div>
        </div>