@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <!-- Grid row -->
    <div class="row pt-4">

        <!-- Content -->
        <div class="col-lg-12">



            <!--Section: Featured medical index-->
            <section>

                @include('topClients')

            </section>
            <!--Section: Featured medical index-->

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

                            <img src="/img/primary_ad/1.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-white-light">

                            </div>

                        </div>
                        <!--Image -->
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!-- Categories & Adv -->

            <!--Section: job list-->
            <section class="mb-5">

                @include('mainJobs')

            </section>
            <!--/Section: job list-->

            <!--Section: Advertising-->
            <section>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-12">
                        <!--Image -->
                        <div class="view  z-depth-1">

                            <img src="/img/offer_ad/1.jpg" class="img-fluid" alt="sample image">
                            <div class="mask rgba-stylish-slight">

                            </div>

                        </div>
                        <!--Image -->
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--/Section: Advertising-->

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