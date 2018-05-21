<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="loginForm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="loginForm"><strong>Sign in</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} validate" name="email" value="{{ old('email') }}"
                           v-model="email" required autofocus>
                    <label data-error="" data-success="" for="email">{{ __('E-Mail Address') }}</label>
                </div>

                <div class="md-form pb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} validate" name="password"
                           v-model="password" @keyup.enter="login" required>
                    <label data-error="" data-success="" for="password">{{ __('Password') }}</label>
                    <div class="form-group row">
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}id="defaultCheckbox1">
                            <label class="form-check-label" for="defaultCheckbox1">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="col-md-6 text-right pt-3">
                            <p class="font-small blue-text d-flex justify-content-end"><a href="{{ route('password.request') }}" class="blue-text ml-1">{{ __('Forgot Your Password?') }}</a></p>
                        </div>
                    </div>

                </div>

                <div class="text-center mb-3">
                    <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a" @click.prevent="login">{{ __('Login') }}</button>
                </div>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"><strong>OR</strong></p>

                <div class="row my-3 d-flex justify-content-center">
                    <!--Facebook-->

                    <a class="btn btn-blue btn-rounded mr-md-3 z-depth-1a facebook-login" href="/auth/facebook" target="_blank">
                        <i class="fa fa-facebook white-text pr-2" style="font-size: 20px;"></i> Continue with <strong>Facebook</strong>
                    </a>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="{{ route('register') }}" class="blue-text ml-1">{{ __('Register') }}</a></p>
            </div>
        </div>
        <!--/.Content-->
    </div>

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
</div>
<!-- Modal -->



@push('scripts')

<script>
    const elegantModalForm = new Vue({
        el: '#elegantModalForm',
        data () {
            return {
                email: '',
                password: '',
                errors: {},
                emailError: '',
                passwordError: ''
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

@endpush