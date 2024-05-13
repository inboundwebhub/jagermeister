<!DOCTYPE html>
<html>
<head>
    <title> {{ config('app.name', 'Laravel') }} |  {{ __($pageTitle ?? __('')) }} </title>
     <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <meta name="baseUrl" data-url="{{ url('/') }}"  id="baseUrl"/>
    <link rel="icon" href="{{ asset('assets/image/apple-touch-icon.png') }}">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>

    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1.0, minimum-scale=0.5, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="true">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#012B2C"/>

    <meta property="og:title" content="" />
    <meta property="og:image" content="{{ asset('assets/image/Social2.png') }}" />
    <meta property="og:url" content="https://thesecretisicecold.com/penaltyshootout" />
    <meta property="og:description" content="" />

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @stack('style-lib')
    @stack('style')
    @stack('script-lib')
</head>
<body>
<div class="preloader" id="page-preloader">
    <div class="page-tow-bg">
        <div class="header fullwidth">
            <div class="wrapper">
                <div class="head-inn fullwidth text-center">
                    <a href="https://www.jagershop.co.uk">
                        <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="loading-sec fullwidth">
            <div class="wrapper">
                <div class="lading-main">
                    <h1>Loading</h1>
                </div>
                <div class="progressBarcontainer">
                    <div class="progressBarValue ht"></div>
                </div>
            </div>
        </div>
    </div>
</div>   
<div>
    @yield('content')
</div>
<script src="{{ asset('assets/js/script.js') }}"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"  referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"  referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"  referrerpolicy="no-referrer"></script>
@yield('js')

</body>
</html>

