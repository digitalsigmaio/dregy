 <header>
     <div id="slide-out" class="side-nav stylish-color-dark" style="transform: translateX(0px);">
         <ul class="custom-scrollbar list-unstyled ps ps--theme_default" style="max-height:100vh;" data-ps-id="66760783-727f-13c2-96d3-4ef521ac2096">
             <!-- Logo -->
             <li class="logo-sn waves-light  waves-effect waves-light">
                 <div class="text-center">
                     <a class="pl-0" href="https://mdbootstrap.com/"> <img id="MDB-logo" src="https://mdbootstrap.com/wp-content/uploads/2017/10/mdb-shadow-38px.png" alt="MDB Logo"></a>
                 </div>
             </li>
             <!--/. Logo -->

             <!-- Side navigation links -->
             <li class="mt-5">
                 <ul id="side-menu" class="collapsible collapsible-accordion">
                     <li id="menu-item-43620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43620 active">
                         <a class="collapsible-header waves-effect arrow-r active"><i class="fa fa-th-large"></i>My Favorites<i class="fa fa-angle-down rotate-icon"></i></a>
                         <div class="collapsible-body" style="display: none;">
                             <ul class="sub-menu">
                                 <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="{{ route('favoriteHospitals') }}">Hospitals</a></li>
                                 <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="">Clinics</a></li>
                                 <li id="menu-item-44242" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44242"><a class="collapsible-header waves-effect" id="link-menu-item-44242" href="">Pharmacies</a></li>
                                 <li id="menu-item-44243" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44243"><a class="collapsible-header waves-effect" id="link-menu-item-44243" href="">Cosmetic Clinics</a></li>
                                 <li id="menu-item-44244" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44244"><a class="collapsible-header waves-effect" id="link-menu-item-44244" href="">Products</a></li>
                                 <li id="menu-item-44245" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44245"><a class="collapsible-header waves-effect" id="link-menu-item-44245" href="">Jobs</a></li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </li>

             <!-- Side navigation links -->
             <li class="mt-2">
                 <ul id="side-menu" class="collapsible collapsible-accordion">
                     <li id="menu-item-43620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43620"><a class="collapsible-header waves-effect arrow-r"><i class="fa fas fa-boxes"></i>My Products<i class="fa fa-angle-down rotate-icon"></i></a>
                         <div class="collapsible-body" style="display: none;">
                             <ul class="sub-menu">
                                 <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="">List</a></li>
                                 <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="">New</a></li>
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
                                 <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="">List</a></li>
                                 <li id="menu-item-44241" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44241"><a class="collapsible-header waves-effect" id="link-menu-item-44241" href="">New</a></li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </li>
             <!-- /. Side navigation links -->
             <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>

     </div>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark sky-gradient fixed-top scrolling-navbar">
        <div class="container">
            <div class="float-left mr-2">
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="fa fa-bars white-text"></i>
                </a>
            </div>
            <!-- Navbar brand -->
            <a class="font-weight-bold white-text mr-4" href="{{ route('main') }}">Home</a>

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
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('hospitals') }}">Hospitals</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('clinics') }}">Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('pharmacies') }}">Pharmacies</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('cosmetics') }}">Cosmetic Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('products') }}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('jobs') }}">Jobs</a>
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
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('contact') }}" target="_blank">
                            <i class="fa fa-envelope white-text"></i> Contact
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @if(Auth::user())
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user white-text"></i> Profile </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item waves-effect waves-light" href="{{ route('home') }}">My account</a>
                                <div id="logout">
                                    <a class="dropdown-item waves-effect waves-light" @click.prevent="logout">Log out</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" data-toggle="modal" data-target="#elegantModalForm">
                                <i class="fas fa-sign-in-alt white-text"></i> Sign In
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
         });

         $(document).ready(function() {
             $('.button-collapse').trigger('click');
         })
     </script>
 @endif
 @endpush