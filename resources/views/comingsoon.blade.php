
<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
</head>

<style>
    body {
        font-weight: 400;
    }

    .intro-2 {
        background: url("img/home.jpg")no-repeat center center;
        background-size: cover;
    }

    .display-3 {
        letter-spacing: 5px;
    }

    @media (max-width: 700px) {
        .full-height,
        .full-height body,
        .full-height header,
        .full-height header .view {
            height: 900px;
        }
    }

    .creative-lp .mask.rgba-gradient-1 {
        background: -webkit-linear-gradient(45deg, rgba(0,175,188,0.7), rgba(27,117,231, 0.7) 100%);
    }
</style>

<body class="creative-lp">


<!-- Navigation & Intro -->
<header id="app">

    <!--Intro Section-->
    <section class="view intro-2">
        <div class="full-bg-img">
            <div class="mask rgba-gradient-1">
                <div class="container flex-center">
                    <div class="row pt-5 mt-3">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="text-center white-text">
                                <ul class="list-unstyled ">
                                    <li>
                                        <h1 class="display-3 mt-md-5 mt-lg-0 mb-5 font-weight-bold white-text wow fadeIn" data-wow-delay="0.3s">
                                            <strong>COMING SOON</strong>
                                        </h1>
                                    </li>
                                    <li>
                                        <h4 class="white-text description mb-4 wow fadeIn" data-wow-delay="0.4s">Please stay tuned!
                                        </h4>
                                        <!--Facebook-->
                                        <a class="p-2 m-2 fa-lg fb-ic">
                                            <i class="fa fa-facebook white-text"> </i>
                                        </a>
                                        <!--Twitter-->
                                        <a class="p-2 m-2 fa-lg tw-ic">
                                            <i class="fa fa-twitter white-text"> </i>
                                        </a>
                                        <!--Google +-->
                                        <a class="p-2 m-2 fa-lg gplus-ic">
                                            <i class="fa fa-google-plus white-text"> </i>
                                        </a>
                                        <!--Linkedin-->
                                        <a class="p-2 m-2 fa-lg li-ic">
                                            <i class="fa fa-linkedin white-text"> </i>
                                        </a>
                                    </li>
                                </ul>

                                <!--Grid row-->
                                <div class="row mt-5 mb-5 pt-4" id="countdown">

                                    <!--Grid column-->
                                    <div class="col-lg-4 col-md-4">
                                        <hr class="white mx-5">
                                        <h1 class="display-4 font-weight-bold white-text">
                                            <strong id="count-days"></strong>
                                        </h1>
                                        <hr class="white mx-5">
                                        <p class="font-weight-bold spacing">DAYS</p>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-lg-4 col-md-4">
                                        <h1 class="display-4 font-weight-bold white-text rgba-white-light mx-4 py-3 mt-3">
                                            <strong id="count-hours"></strong>
                                        </h1>
                                        <p class="font-weight-bold spacing pt-3">HOURS</p>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-lg-4 col-md-4">
                                        <hr class="white mx-5">
                                        <h1 class="display-4 font-weight-bold white-text">
                                            <strong id="count-minutes"></strong>
                                        </h1>
                                        <hr class="white mx-5">
                                        <p class="font-weight-bold spacing">MINS</p>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</header>
<!-- Navigation & Intro -->

<!-- SCRIPTS -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#countdown').countdown('2018/06/01 12:00:00', function(event) {
            $('#count-days').html(event.strftime('%D'));
            $('#count-hours').html(event.strftime('%H'));
            $('#count-minutes').html(event.strftime('%M'));
        });
    });
</script>
</body>

</html>