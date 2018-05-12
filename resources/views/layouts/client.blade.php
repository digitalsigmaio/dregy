<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('words.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} V2</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap-stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-stars-o.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    </style>
</head>
<body class="homepage-v1 hidden-sn black-skin white animated">


<!--Navigation-->
@include('layouts.ClientMainNav')
<!-- /.Navigation -->

<!--Intro-->
<section>

    <!--Ads Slider-->
    @yield('adsSlider')
    <!--/.Ads Slider-->

</section>
<!--/Intro-->

<!-- Main Container -->
<div class="container" id="app">
    @yield('content')
</div>
<!-- /.Main Container -->




<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@stack('scripts')
</body>

</html>