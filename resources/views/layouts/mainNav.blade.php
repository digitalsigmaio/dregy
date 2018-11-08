 <header>


    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark sky-gradient fixed-top scrolling-navbar">
        <div class="container">

            <!-- Navbar brand -->
            <a class="font-weight-bold white-text mr-4" href="{{ route('main') }}">{{ __('words.home') }}</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('hospitals') }}">{{ __('words.hospitals') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('clinics') }}">{{ __('words.clinics') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('pharmacies') }}">{{ __('words.pharmacies') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('cosmetics') }}">{{ __('words.cosmetics') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('products') }}">{{ __('words.products') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('jobs') }}">{{ __('words.jobs.title') }}</a>
                    </li>

                </ul>
                <!-- Links -->
                <!--
                <form class="search-form" role="search">
                    <div class="form-group md-form my-0 waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                -->
            </div>
            <!-- Collapsible content -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" title="{{ __('words.contact') }}">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('contact') }}" target="_blank">
                            <i class="fa fa-envelope white-text"></i> <span>{{ __('words.contact') }}</span>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @checklang('en')
                    <li class="nav-item" title="عربي">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('lang', 'ar') }}">
                            <i class="fa fa-language white-text pl-1"></i> <span>عربي</span>
                        </a>
                    </li>
                    @else
                        <li class="nav-item" title="English">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('lang', 'en') }}">
                                <i class="fa fa-language white-text pl-1"></i> <span>English</span>
                            </a>
                        </li>
                        @endchecklang
                    @if(Auth::user())
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user white-text"></i> <span>{{ Auth::user()->name }}</span> </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item waves-effect waves-light" href="{{ route('home') }}">My account</a>
                                <div id="logout">
                                    <a class="dropdown-item waves-effect waves-light" @click.prevent="logout">Log out</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item" title="{{ __('words.login') }}">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" data-toggle="modal" data-target="#elegantModalForm">
                                <i class="fa fa-sign-in white-text"></i> <span>{{ __('words.login') }}</span>
                                <span class="sr-only">Sign In</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
 @include('auth.loginModal')
 </header>

 @push('scripts')
 @if(Auth::user())
     <script>
         const logout = new Vue({
             el: '#logout',
             data() {
                 return {

                 }
             },
             methods: {
                 logout() {
                     axios.post('{!! route('logout') !!}')
                         .then(function (res) {
                             if (res.status === 200) {
                                 window.location.href = '{!! route('main') !!}'
                             }
                         })
                 }
             }
         })
     </script>
 @endif
 @endpush