<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/faviconsites.png') }}"/>
    <link rel="icon" type="image/x-icon"  sizes="32x32" href="{{ asset('assets/img/faviconsites.png') }}"/>

    <link rel="icon" href="{{ asset('assets/img/logos/logo-croped-removebg-preview.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pace/pace.css') }}"/>
    <script src="{{ asset('assets/vendor/pace/pace.js') }}"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!--vendors-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepicker/datepicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.css') }}"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">

    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css"/>
    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/feather/feather-icons.css') }}"/>
    <!--Bootstrap + atmos Admin CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/atmos.min.css') }}"/>
    <!-- Additional library for page -->


    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

   <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}">

    <!-- my styles  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />
</head>
