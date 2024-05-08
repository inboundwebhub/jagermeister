<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> {{ config('app.name', 'Laravel') }} |  {{ __($pageTitle ?? __('')) }} </title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <meta name="baseUrl" data-url="{{ url('/') }}"  id="baseUrl"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     @stack('style-lib')
</head>
<body>   

<div >
        @yield('content')
     <!-- end container-fluid -->
</div>
<script src="{{ asset('assets/js/script.js') }}"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"  referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"  referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"  referrerpolicy="no-referrer"></script>
 @stack('script-lib')
@yield('js')
</body>
</html>

