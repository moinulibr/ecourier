<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        @if(Auth::guard('web')->user()->photo !=null)

        <img class="rounded-circle header-profile-user" src="{{ asset(Auth::guard('web')->user()->photo) }}" alt="User Profile Photo" width="40px">
        @else

        <img src="{{ asset('public/images/user.png') }}" class="rounded-circle header-profile-user" alt="" >

        @endif


    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <!-- item-->
        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="uil uil-user-circle font-size-16 align-middle text-muted mr-1"></i> <span class="align-middle" key="t-view"> View Profile</span></a>
  
        <a class="dropdown-item d-block" href="{{ route('user.setting') }}"><i class="uil uil-cog font-size-16 align-middle mr-1 text-muted"></i> 
            <span class="align-middle" key="t-settings"> Settings</span> 
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="uil uil-sign-out-alt font-size-16 align-middle mr-1 text-muted"></i>
                            <span class="align-middle" key="t-sign-out"> Sign out</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    
    
    </div>
</div>