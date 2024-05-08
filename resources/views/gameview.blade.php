@extends('layouts.app')

@section('content')
<head>
    <title>Jager Penalty</title>
    <link rel="icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <meta charset="UTF-8">
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
    <meta property="og:image" content="{{ asset('assets/images/Social2.jpg') }}" />
    <meta property="og:url" content="https://thesecretisicecold.com/penaltyshootout" />
    <meta property="og:description" content="" />

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="">

    <link href=" {{ asset('assets/css/css1.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            custom: {
                families: ["Meister-Bold"]
            }
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-LH9YW40F88');
    </script>

    <script type="text/javascript" src="{{ asset('assets/js/lib/phaser.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/code.js') }}"></script>
</head>


<body>
    <img src="{{ asset('assets\image\bg1.jpg') }}" id="bg" alt="">
</body>
@endsection
