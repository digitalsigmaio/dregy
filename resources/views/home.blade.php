@extends('layouts.main')

@section('content')
<div class="container black-skin" style="height: 100vh">
    <div id="slide-out" class="side-nav stylish-color-dark fixed" style="transform: translateX(0px);">
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
                                <li id="menu-item-44240" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-44240"><a class="collapsible-header waves-effect" id="link-menu-item-44240" href="">Hospitals</a></li>
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

</div>
@endsection
