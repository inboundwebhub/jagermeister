
<style>
    .dropdown-menu {
         display: none;
     }
 
    .show >.dropdown-menu {
         display: block;
     }
     .dropdown-menu {
    display: none;
    position: absolute;
    margin-top: 10px; /* adjust this value as needed */
}
 </style>


<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 min-h-screen"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}"
            target="_blank">
            <img src="{{ asset('assets/admin/images/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"> {{ config('app.name', 'Laravel') }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class=" " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
             <li class="nav-item mt-3 d-flex align-items-center">
                {{-- <div class="ps-4">
                    <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                </div> --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
                </li>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Tables</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'users' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'prizes' ? 'active' : '' }}" href="{{ route('admin.prizes.index') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                </div>
                    <span class="nav-link-text ms-1">Prize</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'live-prizes' ? 'active' : '' }}" href="{{ route('admin.live-prizes.index') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                </div>
                    <span class="nav-link-text ms-1">Live Prize Table</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link{{ Route::currentRouteName() == 'prize-user' ? 'active' : '' }}" href="{{ route('admin.prize-user.index') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                </div>
                    <span class="nav-link-text ms-1">Prize to User Table</span>
                </a>
            </li> 
             <li class="nav-item">
                <a class="nav-link{{ Route::currentRouteName() == 'game' ? 'active' : '' }}" href="{{ route('admin.game.index') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-trophy text-warning text-sm opacity-10"></i>
                </div>
                    <span class="nav-link-text ms-1">Game Setting</span>
                </a>
            </li> 
         
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
           
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.sign-in-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.sign-up-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>

<!-- jQuery CDN -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>     --}}

<!-- Your jQuery code -->
{{-- <script>
    $(document).ready(function(){
        $('#navbarDropdown').click(function() {
            var dropdownMenu = $('#dropdownMenu');
            if (dropdownMenu.css('display') === 'none' || dropdownMenu.css('display') === '') {
                dropdownMenu.css('display', 'block');
            } else {
                dropdownMenu.css('display', 'none');
            }
        });
    });
</script> --}}

