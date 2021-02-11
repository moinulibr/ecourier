<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{asset('links/backend/01')}}/assets/images/users/avatar-4.jpg" alt="Header Avatar">
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        
        <a class="dropdown-item" href="{{ route('merchant.logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            <span class="align-middle" key="t-sign-out"> Sign out</span>
        </a>

        <form id="logout-form" action="{{ route('merchant.logout') }}" method="POST" class="d-none">
            @csrf
        </form>


    </div>
</div>
