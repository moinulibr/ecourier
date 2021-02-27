
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item  waves-effect"  aria-haspopup="true" aria-expanded="false">
                            <i class="icon-sm" data-feather="user"></i>
                             {{ Auth::guard('merchant')->user()->name }}
                        </button>  
                    </div>
