@extends('layouts.main')

@section('content')

    <!-- Grid row -->
    <div class="row pt-4">

        <!-- Content -->
        <div class="col-lg-12">

            <!-- Categories & Adv -->
            <section class="section pt-2">

                <!-- Grid row -->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!-- Section: Categories -->
                        <section class="section">

                            <ul class="list-group z-depth-1">

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-laptop dark-grey-text mr-2" aria-hidden="true"></i> Laptops</a>
                                    <a href=""></a>
                                    <span class="badge badge-danger badge-pill">43</span>
                                    </a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-mobile-phone dark-grey-text mr-3" aria-hidden="true"></i> Smartphone</a>
                                    <span class="badge badge-danger badge-pill">32</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-tablet dark-grey-text mr-3" aria-hidden="true"></i> Tablet</a>
                                    <span class="badge badge-danger badge-pill">18</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-headphones dark-grey-text mr-3" aria-hidden="true"></i>Heahphones</a>
                                    <span class="badge badge-danger badge-pill">37</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-camera-retro dark-grey-text mr-3" aria-hidden="true"></i>Camera</a>
                                    <span class="badge badge-danger badge-pill">15</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-suitcase dark-grey-text mr-3" aria-hidden="true"></i>Accesories</a>
                                    <span class="badge badge-danger badge-pill">64</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="dark-grey-text font-small">
                                        <i class="fa fa-television dark-grey-text mr-3" aria-hidden="true"></i>TV</a>
                                    <span class="badge badge-danger badge-pill">2</span>
                                </li>
                            </ul>

                        </section>
                        <!-- Section: Categories -->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-8 col-md-12 pb-lg-5 mb-4">
                        <!--Image -->
                        <div class="view zoom z-depth-1">

                            <img src="https://mdbootstrap.com/img/Photos/Others/product1.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-white-light">
                                <div class="dark-grey-text  pt-4 ml-3 pl-3">
                                    <div>
                                        <a>
                                            <span class="badge badge-danger">bestseller</span>
                                        </a>
                                        <h2 class="card-title font-weight-bold pt-2">
                                            <strong>This is news title</strong>
                                        </h2>
                                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        <a class="btn btn-danger btn-sm btn-rounded clearfix d-none d-md-inline-block">Read more</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--Image -->
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!-- Categories & Adv -->

            <!--Section: Featured medical index-->
            <section>

                <top-clients></top-clients>

            </section>
            <!--Section: Featured medical index-->

            <!--Section: Advertising-->
            <section>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-12">
                        <!--Image -->
                        <div class="view  z-depth-1">

                            <img src="https://mdbootstrap.com/img/Photos/Others/ecommerce5.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-stylish-slight">
                                <div class="dark-grey-text text-right pt-lg-5 pt-md-1 mr-5 pr-md-4 pr-0">
                                    <div>
                                        <a>
                                            <span class="badge badge-primary">SALE</span>
                                        </a>
                                        <h2 class="card-title font-weight-bold pt-md-3 pt-1">
                                            <strong>Sale from 20% to 50% on every tablet!
                                            </strong>
                                        </h2>
                                        <p class="pb-lg-3 pb-md-1 clearfix d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        <a class="btn mr-0 btn-primary btn-rounded clearfix d-none d-md-inline-block">Read more</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--Image -->
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--/Section: Advertising-->

            <!--Section: job list-->
            <section class="mb-5">

                <main-jobs></main-jobs>

            </section>
            <!--/Section: product list-->

            <!--Section: Last items-->
            <section>

                <h4 class="font-weight-bold mt-4 dark-grey-text">
                    <strong>LAST PRODUCTS</strong>
                </h4>
                <hr class="mb-5">

                <last-products></last-products>
            </section>
            <!-- /.Section: Last items -->

        </div>
        <!-- /.Content -->

    </div>
    <!-- /Grid row -->

@endsection