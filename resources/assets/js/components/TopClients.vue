<template>
    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified grey lighten-3 mx-0" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel5" role="tab">Hospitals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel6" role="tab">Pharmacies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dark-grey-text font-weight-bold" data-toggle="tab" href="#panel7" role="tab">Clinics</a>
                </li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content px-0">
                <!--Panel 1-->
                <div class="tab-pane fade in show active " id="panel5" role="tabpanel">
                    <br>
                    <!-- Grid row -->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4" v-for="hospital in hospitals">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img :src="hospital.img" class="img-fluid m-auto" alt="sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ hospital.en_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="starColor(n, hospital.rate)"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ hospital.user.name }}</strong>
                                            </span>
                                            <span class="float-right">
                                                <a class="" data-toggle="tooltip" data-placement="top" title="Owner">
                                                    <i class="fa fa-user ml-3"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->


                    </div>
                    <!--Grid row-->
                </div>
                <!--/.Panel 1-->

                <!--Panel 2-->
                <div class="tab-pane fade" id="panel6" role="tabpanel">
                    <br>

                    <!-- Grid row -->
                    <div class="row mb-3">

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4" v-for="pharmacy in pharmacies">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img :src="pharmacy.img" class="img-fluid m-auto" alt="sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ pharmacy.en_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="starColor(n, pharmacy.rate)"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ pharmacy.user.name }}</strong>
                                            </span>
                                            <span class="float-right">
                                                <a class="" data-toggle="tooltip" data-placement="top" title="Owner">
                                                    <i class="fa fa-user ml-3"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->
                </div>
                <!--/.Panel 2-->

                <!--Panel 3-->
                <div class="tab-pane fade" id="panel7" role="tabpanel">
                    <br>
                    <!-- Grid row -->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4" v-for="clinic in clinics">

                            <!--Card-->
                            <div class="card card-ecommerce">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img :src="clinic.img" class="img-fluid m-auto" alt="sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Category & Title-->

                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="" class="dark-grey-text">{{ clinic.en_name }}</a>
                                        </strong>
                                    </h5>
                                    <span class="badge badge-danger mb-2">bestseller</span>
                                    <!-- Rating -->
                                    <ul class="rating">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="starColor(n, clinic.rate)"></i>
                                        </li>
                                    </ul>

                                    <!--Card footer-->
                                    <div class="card-footer pb-0">
                                        <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ clinic.user.name }}</strong>
                                            </span>
                                            <span class="float-right">
                                                <a class="" data-toggle="tooltip" data-placement="top" title="Owner">
                                                    <i class="fa fa-user ml-3"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </div>
                <!--/.Panel 3-->
            </div>

        </div>

    </div>
    <!--Grid row-->
</template>

<script>
    export default {
        props: ['hospitals', 'pharmacies', 'clinics'],
        data () {
            return {

            }
        },
        methods: {
            round(rate) {
                return parseInt(Math.round(rate));
            },
            starColor(n, rate) {
                if (n <= this.round(rate))  {
                    return 'blue-text'
                } else {
                    return 'grey-text'
                }
            }
        }
    }
</script>