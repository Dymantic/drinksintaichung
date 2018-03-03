<!doctype html>
<html class="h-full" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Drinks in Taichung</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{--<link rel="manifest" href="site.webmanifest">--}}

    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://use.typekit.net/zsv7xfr.css">
</head>
<body class="font-sans">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

@yield('content')

<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap"></script>
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>