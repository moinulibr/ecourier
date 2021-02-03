        <div class="vertical-menu">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-dark-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('links/backend/01')}}/assets/images/logo-dark.png" alt="" height="18">
                    </span>
                </a>

                <a href="{{ route('home') }}" class="logo logo-light">
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
                    <!----------------Navbar middle space Start----------------->




                        {{---For Admin Sidebar--}}
                        @if(accessableCheckForAdmin_HP(Auth::guard('web')->user()->role_id))
                            <li>
                                <a href="{{ route('order.create') }}" class="waves-effect">
                                    <i class="icon nav-icon" data-feather="plus"></i>
                                    <span class="menu-item" key="t-plus">Create Parcel</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="icon nav-icon" data-feather="home"></i>

                                    <span class="menu-item" key="t-dashboards">Dashboards</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="users"></i>

                                    <span class="menu-item" key="t-layouts">Users Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.index') }}" >Admin</a></li>
                                    <li><a href="{{ route('merchant.index') }}">Merchant</a></li>
                                    <li><a href="{{ route('agent.index') }}">Agent</a></li>
                                    <li><a href="{{ route('deliveryman.index') }}">Delivery Man</a></li>
                                    <li><a href="{{ route('hub.index') }}">Hub User List</a></li>


                                    <li><a href="#">Office Stuff</a></li>
                                    <li><a href="{{ route('sub.office.index')}}">Sub Office</a></li>
                                    <li><a href="#">Sub Office Stuff</a></li>
                                    <li><a href="#">Agent Delivery Man</a></li>
                                    <li><a href="#">Affiliate/Merketer</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="shopping-cart"></i>
                                    <span class="menu-item" key="t-layouts">Parcel Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('order.index') }}">All Parcel</a></li>
                                    <li><a href="{{ route('order.create') }}">New Parcel</a></li>
                                    <li><a href="{{ route('admin.assign.parcel') }}">Assign Parcel</a></li>
                                    <li><a href="{{ route('admin.send.parcel') }}">Send Other Branch</a></li>
                                    <li><a href="{{ route('admin.receive.parcel') }}">Receive From Other</a></li>
                                    <li><a href="{{ route('admin.manpowerAssignedOrder') }}">Print Assigned Parcel </a></li>
                                    <li><a href="{{ route('admin.manPowerOrderDeliveredAmount') }}">Receive Delivered Amount </a></li>
                                    <li><a href="{{ route('admin.manPowerOrderCancelHoldParcel') }}">Receive<small> Cancel/Hold</small> Parcel </a></li>
                                    {{--  <li><a href="{{ route('destination.order.index') }}">Upcomming Parcel</a></li>  --}}
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="dollar-sign"></i>
                                    <span class="menu-item" key="t-layouts">Payment Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('admin.receiveFromOtherBranch')}}">Receive From<small> Other Branch</small></a></li>
                                    <li><a href="{{route('admin.sendInvoiceList')}}">Sent To <small>Other Branch List</small></a></li>
                                    <li><a href="{{route('admin.sendToOthersBranchFromAdmin')}}">Sent To <small>Other Branch</small></a></li>
                                    <li><a href="{{route('admin.payToMerchantClientIndex')}}">Merchant Paid Invoices</a></li>
                                    <li><a href="{{route('admin.payToMerchantClientCreate')}}">Pay To Merchant</a></li>
                                    <li><a href="{{route('admin.paidBranchCommissionInvoiceList')}}"><small>Branch Commission</small></a></li>
                                    <li><a href="{{route('admin.paidBranchCommissionInvoiceCreate')}}"><small>Pay To Branch (Commission)</small></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="dollar-sign"></i>
                                    <span class="menu-item" key="t-layouts">Balanch Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="{{route('admin.currentBalanchOfMyBranch')}}">Current Balanch<small></small></a>
                                         <a href="{{route('admin.branchCommissionOfMyBranch')}}">Branch Commission<small></small></a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="menu-title" key="t-apps">Settings</li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="settings"></i>
                                    <span class="menu-item" key="t-layouts">Setting Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('branch.index') }}" >Brunch Managements</a></li>
                                    <li><a href="{{ route('branch.type.index') }}" >Brunch Types</a></li>
                                    <li><a href="{{ route('service.type.index') }}">Service Type</a></li>
                                    <li><a href="{{ route('parceltype.index') }}">Parcel Typies</a></li>
                                    <li><a href="{{ route('weight.index') }}">Weight</a></li>
                                    <li><a href="{{ route('service.charge.setting.index') }}">Delivery Charge Setting </a></li>
                                    <li><a href="{{ route('parcel.category.index') }}">Parcel Categories</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="map-pin"></i>
                                    <span class="menu-item" key="t-layouts">Area Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('/division/view') }}" >Divisions</a></li>
                                    <li><a href="{{ url('/district/view') }}" >Districts</a></li>
                                    <li><a href="{{ url('/area/view') }}" >Area</a></li>
                                </ul>
                            </li>


                             <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="users"></i>
                                    <span class="menu-item" key="t-layouts">Applications list</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('merchant.registration') }}" >Merchants</a></li>
                                    <li><a href="{{ route('agent.registration') }}" >Agents</a></li>
                                    <li><a href="{{ route('deliveryman.registration') }}" >Delivery Man</a></li>
                                </ul>
                            </li>













                        @endif
                        {{---For Admin Sidebar  end --}}



                       {{---For Agent Sidebar--}}
                        @if(accessableCheckForAgent_HP(Auth::guard('web')->user()->role_id))
                            <li>
                                <a href="{{ route('agent.order.create') }}" class="waves-effect">
                                    <i class="icon nav-icon" data-feather="plus"></i>
                                    <span class="menu-item" key="t-plus">Create Parcel</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="icon nav-icon" data-feather="home"></i>
                                    <span class="menu-item" key="t-dashboards">Dashboards</span>
                                </a>

                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="shopping-cart"></i>
                                    <span class="menu-item" key="t-layouts">Parcel Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('agent.order.create') }}">New Parcel</a></li>
                                    <li><a href="{{ route('agent.order.index') }}">All Parcel</a></li>
                                    <li><a href="{{ route('agent.assign.parcel') }}">Assign Parcel</a></li>
                                    <li><a href="{{ route('agent.receive.parcel') }}">Receive From Other</a></li>
                                    <li><a href="{{ route('agent.manpowerAssignedOrder') }}">Print Assigned Parcel </a></li>
                                    <li><a href="{{ route('agent.manPowerOrderDeliveredAmount') }}">Receive Delivered Amount </a></li>
                                    <li><a href="{{ route('agent.manPowerOrderCancelHoldParcel') }}">Receive<small> Cancel/Hold</small> Parcel </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="shopping-cart"></i>
                                    <span class="menu-item" key="t-layouts"><small>Sending Parcel  Management</small></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('agent.send.parcel') }}">Send Other Branch</a></li>
                                    <li><a href="{{ route('agent.sending.parcelList') }}">Sending Parcel List</a></li>
                                </ul>
                            </li>

                             <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="dollar-sign"></i>
                                    <span class="menu-item" key="t-layouts">Payment Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('agent.payToHeadOfficeListView')}}">Sent To <small>Head Office Invoice</small></a></li>
                                    <li><a href="{{route('agent.payToHeadOffice')}}">Sent To <small>Head Office</small></a></li>
                                    <li><a href="{{route('agent.headOfficeSendInvoiceList')}}">Receive From<small> Head Office</small></a></li>
                                      <li><a href="{{route('agent.payToMerchantClientIndex')}}">Merchant Paid Invoices</a></li>
                                    <li><a href="{{route('agent.payToMerchantClientCreate')}}">Pay To Merchant</a></li>
                                     <li><a href="{{route('agent.paidBranchCommissionInvoiceList')}}"><small>Branch Commission List</small></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="dollar-sign"></i>
                                    <span class="menu-item" key="t-layouts">Balanch Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="{{route('agent.currentBalanchOfMyBranch')}}">Current Balanch<small></small></a>
                                        <a href="{{route('agent.branchCommissionOfMyBranch')}}">Branch Commission<small></small></a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"  >
                                    <i data-feather="users"></i>
                                    <span class="menu-item" key="t-layouts">Stuff Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('agent.stuff.index') }}">All Stuff</a></li>

                                </ul>
                            </li>
                        @endif
                        {{---For Agent Sidebar end--}}


                        {{----for all official users-----}}
                        <li class="menu-title" key="t-menu">For All Official Users</li>
                        <li>
                            <a href="{{ route('destination.order.index') }}" class="waves-effect">
                                <i class="icon nav-icon" data-feather="list"></i>
                                <span class="menu-item" key="t-plus">Upcomming Parcel</span>
                            </a>
                        </li>
                        {{----for all official users-----}}



                    <!----------------Navbar middle space End----------------->
                    </ul><!-- Left Menu end -->
                </div>
                <!-- Sidebar -->





            </div>

        </div>

