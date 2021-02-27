
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-sm" data-feather="user"></i>
                            
                            {{ Auth::guard('web')->user()->name }}
                        </button>
                      </div>
