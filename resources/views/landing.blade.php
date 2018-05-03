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



                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-12 col-md-12 pb-lg-5 mb-4">
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

                @include('topClients')

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

                @include('mainJobs')

            </section>
            <!--/Section: job list-->

            <!--Section: Last products-->
            <section>

                <h4 class="font-weight-bold mt-4 dark-grey-text">
                    <strong>LAST PRODUCTS</strong>
                </h4>
                <hr class="mb-5">

                @include('lastProducts')
            </section>
            <!-- /.Section: Last products -->

        </div>
        <!-- /.Content -->

    </div>
    <!-- /Grid row -->

@endsection