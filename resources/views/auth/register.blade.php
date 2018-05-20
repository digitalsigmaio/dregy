<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>

        .intro-2 {
            background: url("/img/home.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5 !important;
            }
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }

        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (min-width: 560px) and (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view  {
                height: 650px;
            }
        }

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }

        .navbar.navbar-dark form .md-form input:focus:not([readonly]) {
            border-color: #8EDEF8;
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5!important;
            }
        }

    </style>

</head>

<body>


<!--Main Navigation-->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('main') }}"><strong>
                    Doctor Egypt
                </strong></a>
        </div>
    </nav>

    <!--Intro Section-->
    <section class="view intro-2">
        <div class="mask rgba-cyan-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container" id="app">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <!--Form with header-->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">

                                <!--Header-->
                                <div class="form-header sky-gradient">
                                    <h3><i class="fa fa-user mt-2 mb-2"></i> {{ __('Register') }}</h3>
                                </div>

                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input type="text" id="orangeForm-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                           v-model="name" required autofocus>
                                    <label for="orangeForm-name">{{ __('Name') }}</label>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-envelope prefix white-text"></i>
                                    <input type="text" id="orangeForm-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                           v-model="email" required autofocus>
                                    <label for="orangeForm-email">{{ __('E-Mail Address') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input type="password" id="orangeForm-pass" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} validate" name="password"
                                           v-model="password" required>
                                    <label for="orangeForm-pass">{{ __('Password') }}</label>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input type="password" id="orangeForm-pass" class="form-control" name="password_confirmation"
                                           v-model="passwordConfirmation" required>
                                    <label for="orangeForm-pass">{{ __('Confirm Password') }}</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn sky-gradient btn-lg" >{{ __('Register') }}</button>

                                    <p class="font-small white-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign up with:</p>

                                    <div class="row my-3 d-flex justify-content-center">
                                        <!--Facebook-->
                                        <a class="btn btn-white btn-rounded mr-md-3 z-depth-1a" href="/auth/facebook" target="_blank"><i class="fab fa-facebook-f text-center blue-text"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--/Form with header-->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</header>
<!--Main Navigation-->

<!-- Central Modal Medium Danger -->
<div class="modal fade" id="centerModalDanger" tabindex="-1" role="dialog" aria-labelledby="errorLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Error</p>

                <button type="button" class="close" @click.prevent="dismissModal">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-exclamation-circle fa-4x mb-3 animated flash"></i>
                    <p>@{{ emailError }}</p>
                    <p>@{{ passwordError }}</p>
                </div>
            </div>


        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Danger-->

<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<script>
    new WOW().init();

    const app = new Vue({
        el: '#app',
        data () {
            return {
                email: '',
                password: '',
                errors: {},
                emailError: '',
                passwordError: '',
                passwordConfirmation: '',
            }
        },
        methods: {
            login() {
                let vm = this;
                axios.post('{!! route('login') !!}', this.loginData)
                    .then(function (res) {
                        if (res.status === 200) {
                            window.location.href = res.data.callback;
                        }
                    })
                    .catch(function (err) {
                        vm.errors = err.response.data.errors;
                    })
            },
            dismissModal() {
                $('#centerModalDanger').modal('hide');
                this.emailError = '';
                this.passwordError = '';
            },
            socialLogin(provider) {
                axios.get('/auth/' + provider)
                    .then(function (res) {
                        if (res.status === 200) {
                            window.location.href = '{!! route('home') !!}';
                        }
                    })
                    .catch(function (err) {
                        console.log(err)
                    })
            }
        },
        computed: {
            loginData: function() {
                return {
                    email: this.email,
                    password: this.password,
                    url: window.location.href
                }
            }
        },
        watch: {
            errors: function (val) {
                if(val.email) {
                    this.emailError = val.email.shift();
                }
                if(val.password) {
                    this.passwordError = val.password.shift();
                }
                $('#centerModalDanger').modal('show');
            }
        }
    });
    $('#centerModalDanger').on('hidden.bs.modal', function () {
        elegantModalForm.emailError = '';
        elegantModalForm.passwordError = '';
    });
</script>
</body>
</html>
