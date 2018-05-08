<!--Grid row-->
<div class="row" id="topClients" v-cloak>

    <!--Grid column-->
    <div class="col-12">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified sky-gradient mx-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active white-text font-weight-bold" data-toggle="tab" href="#hospitals" role="tab">Hospitals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link white-text font-weight-bold" data-toggle="tab" href="#pharmacies" role="tab">Pharmacies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link white-text font-weight-bold" data-toggle="tab" href="#clinics" role="tab">Clinics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link white-text font-weight-bold" data-toggle="tab" href="#cosmetics" role="tab">Cosmetics</a>
            </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content px-0">
            <!-- Hospitals -->
            <div class="tab-pane fade in show active " id="hospitals" role="tabpanel">
                <br>
                <!-- Grid row -->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4" v-for="hospital in hospitals">

                        <!--Card-->
                        <div class="card card-ecommerce">

                            <!--Card image-->
                            <div class="view overlay">
                                <img :src="hospital.img" class="img-fluid" alt="sample image">
                                <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->

                                <h5 class="card-title mb-1 text-truncate">
                                    <strong>
                                        <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug" class="dark-grey-text">@{{ hospital.en_name }}</a>
                                    </strong>
                                </h5>
                                <span class="badge badge-primary mb-2 p-2" v-if="hospital.premium">Featured</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="n in 5">
                                        <i class="fa fa-star" :class="starColor(n, hospital.rate.rating)"></i>
                                    </li>
                                </ul>

                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                        <span class="float-left">
                                            <i class="fa fa-eye cyan-text pt-1 ml-3 pr-1" title="views"></i><strong class="small grey-text">@{{ hospital.views.count }}</strong>
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
            <!-- /.Hospitals -->

            <!-- Pharmacies -->
            <div class="tab-pane fade" id="pharmacies" role="tabpanel">
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
                                <a :href="'/pharmacies/' + pharmacy.id + '/' + pharmacy.slug">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->

                                <h5 class="card-title mb-1">
                                    <strong>
                                        <a :href="'/pharmacies/' + pharmacy.id + '/' + pharmacy.slug" class="dark-grey-text">@{{ pharmacy.en_name }}</a>
                                    </strong>
                                </h5>
                                <span class="badge badge-primary mb-2 p-2" v-if="pharmacy.premium">Featured</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="n in 5">
                                        <i class="fa fa-star" :class="starColor(n, pharmacy.rate.rating)"></i>
                                    </li>
                                </ul>

                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                            <span class="float-left">
                                                <i class="fa fa-eye cyan-text pt-1 ml-3 pr-1" title="views"></i><strong class="small grey-text">@{{ pharmacy.views.count }}</strong>
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
            <!-- /.Pharmacies -->

            <!-- Clinics -->
            <div class="tab-pane fade" id="clinics" role="tabpanel">
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
                                <a :href="'/clinics/' + clinic.id + '/' + clinic.slug">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->

                                <h5 class="card-title mb-1">
                                    <strong>
                                        <a :href="'/clinics/' + clinic.id + '/' + clinic.slug" class="dark-grey-text">@{{ clinic.en_name }}</a>
                                    </strong>
                                </h5>
                                <span class="badge badge-primary mb-2 p-2" v-if="clinic.premium">Featured</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="n in 5">
                                        <i class="fa fa-star" :class="starColor(n, clinic.rate.rating)"></i>
                                    </li>
                                </ul>

                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                            <span class="float-left">
                                                <i class="fa fa-eye cyan-text pt-1 ml-3 pr-1" title="views"></i><strong class="small grey-text">@{{ clinic.views.count }}</strong>
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
            <!-- /.Clinics -->

            <!-- Cosmetics -->
            <div class="tab-pane fade" id="cosmetics" role="tabpanel">
                <br>
                <!-- Grid row -->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4" v-for="cosmetic in cosmetics">

                        <!--Card-->
                        <div class="card card-ecommerce">

                            <!--Card image-->
                            <div class="view overlay">
                                <img :src="cosmetic.img" class="img-fluid m-auto" alt="sample image">
                                <a :href="'/cosmetic-clinics/' + cosmetic.id + '/' + cosmetic.slug">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->

                                <h5 class="card-title mb-1">
                                    <strong>
                                        <a :href="'/cosmetic-clinics/' + cosmetic.id + '/' + cosmetic.slug" class="dark-grey-text">@{{ cosmetic.en_name }}</a>
                                    </strong>
                                </h5>
                                <span class="badge badge-primary mb-2 p-2" v-if="cosmetic.premium">Featured</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="n in 5">
                                        <i class="fa fa-star" :class="starColor(n, cosmetic.rate.rating)"></i>
                                    </li>
                                </ul>

                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                        <span class="float-left">
                                            <i class="fa fa-eye cyan-text pt-1 ml-3 pr-1" title="views"></i><strong class="small grey-text">@{{ cosmetic.views.count }}</strong>
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
            <!-- /.Cosmetics -->
        </div>

    </div>

</div>
<!--Grid row-->

@push('scripts')
<!-- Script -->
<script>
    const topClients = new Vue({
        el: '#topClients',
        data () {
            return {
                hospitals: {},
                pharmacies: {},
                clinics: {},
                cosmetics: {}
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
            },
            fetchData() {
                let vm = this;
                axios.get('/api/top-clients')
                    .then(function (response) {
                        let res = response.data;
                        vm.hospitals = res.hospitals;
                        vm.pharmacies = res.pharmacies;
                        vm.clinics = res.clinics;
                        vm.cosmetics = res.cosmetics;
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
            }
        },
        mounted() {
            this.fetchData();
        }
    });
</script>
<!-- Script -->
@endpush