<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/images/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/favicon.png') }}">
    <title>
       {{ config('app.name', 'Laravel') }} |  {{ __($pageTitle ?? __('')) }} 
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/nucleo-icons.css') }}"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/nucleo-svg.css') }}" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- Font Awesome Icons -->
    <script src="{{ asset('assets/admin/js/fontawesome.js') }}" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/argon-dashboard.min.css') }}" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.dataTables.min.css') }}">
   
    <style>
        .bg-primary { background-color: #FB6340 !important; }
    </style>
</head>
<body class="{{ $class ?? '' }}">


    @guest
        @yield('content')
    @endguest
    @auth
        @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
                <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            @endif
            @include('admin.layouts.navbars.auth.sidenav')
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
            @include('admin.components.fixed-plugin')
        @endif
    @endauth
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="{{ asset('assets/admin/js/dataTables.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
     @stack('js');
</body>
</html>