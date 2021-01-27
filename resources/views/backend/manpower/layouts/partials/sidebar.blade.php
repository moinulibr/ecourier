        <div class="vertical-menu">

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

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="icon nav-icon" data-feather="plus"></i>
                                <span class="menu-item" key="t-plus">Create Parcel</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="icon nav-icon" data-feather="home"></i>
                                <span class="badge badge-pill badge-primary float-right">2</span>
                                <span class="menu-item" key="t-dashboards">Dashboards</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#" key="t-ecommerce">Ecommerce</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="icon nav-icon" data-feather="layout"></i>
                                <span class="menu-item" key="t-layouts"><small>Parcel Pickup Management</small></span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('manpower.pendingOrderPickupRequestList')}}">Pending Pickup Request</a></li>
                                <li><a href="{{route('manpower.orderPickupRequestAcceptedList')}}">Accepted Pickup Request</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="icon nav-icon" data-feather="layout"></i>
                                <span class="menu-item" key="t-layouts"><small>Parcel Delivery Management</small></span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('manpower.pendingOrderDeliveryRequestList')}}">Pending Request</a></li>
                                <li><a href="{{route('manpower.orderDeliveryRequestAcceptedList')}}">Accepted Request</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
