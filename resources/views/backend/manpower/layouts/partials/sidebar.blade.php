        <div class="vertical-menu">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                 

                <a href="{{ route('manpowerDashboardRoute') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset($websetting->logo)}}" alt="" height="45">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset($websetting->logo)}}" alt="" height="40">
                    </span>
                </a>

                <a href="{{ route('manpowerDashboardRoute') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset($websetting->logo)}}" alt="" height="45">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset($websetting->logo)}}" alt="" height="40">
                    </span>
                </a>






            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('manpowerDashboardRoute') }}" class="waves-effect">
                                <i class="icon nav-icon" data-feather="home"></i>
                                <span class="menu-item" key="t-dashboards">Dashboard</span>
                            </a>
                            
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="icon nav-icon" data-feather="shopping-cart"></i>
                                <span class="menu-item" key="t-layouts">Pickup Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('manpower.pendingOrderPickupRequestList')}}">Pending Pickup Request</a></li>
                                <li><a href="{{route('manpower.orderPickupRequestAcceptedList')}}">Accepted Pickup Request</a></li>
                                <li><a href="asdfass">All Parcel</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="icon nav-icon" data-feather="shopping-cart"></i>
                                <span class="menu-item" key="t-layouts">Delivery Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('manpower.pendingOrderDeliveryRequestList')}}">Pending Request & Pick</a></li>
                                <li><a href="{{route('manpower.orderDeliveryRequestAcceptedList')}}">On The Way To Delivery</a></li>
                                <li><a href="sdafas">All Parcel</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="icon nav-icon" data-feather="box"></i>
                                <span class="menu-item" key="t-layouts">Invoice Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('manpower.pendingOrderDeliveryRequestList')}}">Pickup Invoice</a></li>
                                <li><a href="{{route('manpower.orderDeliveryRequestAcceptedList')}}">Delivery Invoice</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
