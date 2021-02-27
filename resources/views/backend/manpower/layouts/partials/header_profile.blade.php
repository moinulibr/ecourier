<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{asset('links/backend/01')}}/assets/images/users/avatar-4.jpg" alt="Header Avatar">
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <!-- item-->
        <a class="dropdown-item" href="#"> <i class="fa fa-user"></i>  View Profile</a>
  
        <a class="dropdown-item d-block" href="#"><i class="fa fa-cogs"></i> Settings</a>
        
        {{--  <a class="dropdown-item" href="#"><i class="uil uil-sign-out-alt font-size-16 align-middle mr-1 text-muted"></i> <span class="align-middle" key="t-sign-out"> Sign out</span></a>  --}}
    
        <a class="dropdown-item" href="{{ route('manpower.logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i> Sign out
        </a>

        <form id="logout-form" action="{{ route('manpower.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    
    
    </div>
</div>