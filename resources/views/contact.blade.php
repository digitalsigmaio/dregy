<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('words.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homepage.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    </style>
</head>

<body class="hidden-sn white-skin animated">

<!--Navigation-->
@include('layouts.topNav')
<!-- /.Navigation -->

<section>
    <div class="mdb-map">
        <div id="map-container" class="z-depth-1-half map-container" style="height: 450px;"></div>
    </div>
</section>

<!--Main Layout-->
<main>

    <div class="container-fluid mb-5">

        <!--Grid row-->
        <div class="row" style="margin-top: -140px;">

            <!--Grid column-->
            <div class="col-md-12">
                <div class="card pb-5">
                    <div class="card-body">

                        <div class="container">

                            <!--Section: Contact v.3-->
                            <section class="section mb-5 pt-5">

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <!--Form with header-->
                                        <div class="card card-ecommerce">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="card-body form">
                                                        <!--Header-->
                                                        <div class="formHeader mb-1 pt-3">
                                                            <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                                                        </div>

                                                        <br>

                                                        <form>
                                                            <!--Grid row-->
                                                            <div class="row">

                                                                <!--Grid column-->
                                                                <div class="col-md-6">
                                                                    <div class="md-form">
                                                                        <div class="md-form">
                                                                            <input type="text" id="form-contact-name" class="form-control">
                                                                            <label for="form-contact-name" class="">Your name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Grid column-->

                                                                <!--Grid column-->
                                                                <div class="col-md-6">
                                                                    <div class="md-form">
                                                                        <div class="md-form">
                                                                            <input type="text" id="form-contact-email" class="form-control">
                                                                            <label for="form-contact-email" class="">Your email</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Grid column-->

                                                            </div>
                                                            <!--Grid row-->

                                                            <!--Grid row-->
                                                            <div class="row">

                                                                <!--Grid column-->
                                                                <div class="col-md-6">
                                                                    <div class="md-form">
                                                                        <div class="md-form">
                                                                            <input type="text" id="form-contact-phone" class="form-control">
                                                                            <label for="form-contact-phone" class="">Your phone</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Grid column-->

                                                                <!--Grid column-->
                                                                <div class="col-md-6">
                                                                    <div class="md-form">
                                                                        <div class="md-form">
                                                                            <input type="text" id="form-contact-company" class="form-control">
                                                                            <label for="form-contact-company" class="">Your company</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Grid column-->

                                                            </div>
                                                            <!--Grid row-->

                                                            <!--Grid row-->
                                                            <div class="row">

                                                                <!--Grid column-->
                                                                <div class="col-md-12">

                                                                    <div class="md-form">
                                                                        <textarea type="text" id="form-contact-message" class="md-textarea form-control" rows="3"></textarea>
                                                                        <label for="form-contact-message">Your message</label>
                                                                        <a class="btn-floating btn-lg blue"><i class="fas fa-paper-plane"></i></a>
                                                                    </div>

                                                                </div>
                                                                <!--Grid column-->

                                                            </div>
                                                            <!--Grid row-->
                                                        </form>

                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="card-body contact text-center">
                                                        <div class="container">
                                                            <div class="mb-5">
                                                                <h3>Contact information</h3>
                                                            </div>

                                                            <ul class="contact-icons">
                                                                <li><i class="fa fa-map-marker"></i>
                                                                    <p>6th of October, Giza, Egypt</p>
                                                                </li>

                                                                <li><i class="fa fa-phone"></i>
                                                                    <p>+ 01 234 567 89</p>
                                                                </li>

                                                                <li><i class="fa fa-envelope"></i>
                                                                    <p>contact@example.com</p>
                                                                </li>
                                                            </ul>

                                                            <hr class="hr-light mb-4 mt-4">

                                                            <ul class="list-inline text-center list-unstyled">
                                                                <li class="list-inline-item"><a class="tw-ic"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="list-inline-item"><a class="li-ic"><i class="fab fa-linkedin"> </i></a></li>
                                                                <li class="list-inline-item"><a class="ins-ic"><i class="fab fa-instagram"> </i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Form with header-->

                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                            </section>
                            <!--Section: Contact v.3-->
                        </div>
                    </div>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>

    </div>

</main>
<!--Main Layout-->


<!--Footer-->
@include('layouts.footer')
<!--/.Footer-->



<!-- SCRIPTS -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js"></script>
<script>
    // Material Select Initialization
    $(document).ready(function () {
        new WOW().init();

        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });

        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('.mdb-select').material_select();

        // SideNav Initialization
        $(".button-collapse").sideNav();

        $('.nav-item').hover(function () {
            $(this).toggleClass('active');
        })
    });


</script>

<script>
    function init_map() {

        var var_location = new google.maps.LatLng(29.9602574,30.9143274);

        var var_mapoptions = {
            center: var_location,

            zoom: 14
        };

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });

        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

        var_marker.setMap(var_map);

    }

    google.maps.event.addDomListener(window, 'load', init_map);
</script>
</body>
</html>