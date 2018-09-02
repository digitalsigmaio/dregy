<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('words.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Doctor Egypt'))</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body class="homepage-v1 hidden-sn white-skin white animated">


<!--Navigation-->
@include('layouts.clientMainNav')
<!-- /.Navigation -->

<!--Intro-->
<section>

    <!--Ads Slider-->
    @yield('adsSlider')
    <!--/.Ads Slider-->

</section>
<!--/Intro-->

<!-- Main Container -->
<div class="container-fluid" id="app">
    <div class="row">
        <div id="slide-out" class="side-nav col-md-2 client-menu" style="transform: translateX(0px);">
            <ul class="custom-scrollbar list-unstyled ps ps--theme_default" style="max-height:100vh;" data-ps-id="66760783-727f-13c2-96d3-4ef521ac2096">


                <!-- Side navigation links -->
                <li class="mt-5">
                    <a class="waves-effect arrow-r active" href="{{ route('home') }}"><i class="fas fa-info-circle pr-2"></i>Account info</a>
                </li>

                <li class="mt-2">
                    <ul id="side-menu" class="collapsible collapsible-accordion">
                        <li id="menu-item-43620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43620 active">
                            <a class="collapsible-header waves-effect arrow-r"><i class="fa fa-th-large"></i>My Favorites<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="sub-menu">
                                    <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="{{ route('favoriteHospitals') }}">Hospitals</a></li>
                                    <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="{{ route('favoriteClinics') }}">Clinics</a></li>
                                    <li id="menu-item-44242" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44242"><a class="collapsible-header waves-effect" id="link-menu-item-44242" href="{{ route('favoritePharmacies') }}">Pharmacies</a></li>
                                    <li id="menu-item-44243" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44243"><a class="collapsible-header waves-effect" id="link-menu-item-44243" href="{{ route('favoriteCosmeticClinics') }}">Cosmetic Clinics</a></li>
                                    <li id="menu-item-44244" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44244"><a class="collapsible-header waves-effect" id="link-menu-item-44244" href="{{ route('favoriteProducts') }}">Products</a></li>
                                    <li id="menu-item-44245" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44245"><a class="collapsible-header waves-effect" id="link-menu-item-44245" href="{{ route('favoriteJobs') }}">Jobs</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Side navigation links -->
                <li class="mt-2">
                    <ul id="side-menu" class="collapsible collapsible-accordion">
                        <li id="menu-item-43620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43620"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-boxes"></i>My Products<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="sub-menu">
                                    <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="{{ route('productList') }}">List</a></li>
                                    <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="{{ route('createProduct') }}">New</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Side navigation links -->
                <li class="mt-2">
                    <ul id="side-menu" class="collapsible collapsible-accordion">
                        <li id="menu-item-43620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43620"><a class="collapsible-header waves-effect arrow-r"><i class="fa fas fa-bullhorn"></i>My Jobs<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="sub-menu">
                                    <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="{{ route('jobList') }}">List</a></li>
                                    <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="{{ route('createJob') }}">New</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- /. Side navigation links -->
                <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>

        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</div>
<!-- /.Main Container -->




<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@stack('scripts')
</body>

</html>