<template>
    <div class="row pt-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <div class="">
                <!-- Grid row -->
                <div class="row">
                    <div class="col-md-6 col-lg-12 mb-5">
                        <!-- Panel -->
                        <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h5>
                        <div class="divider"></div>

                        <p class="blue-text"><a>Default</a></p>
                        <p class="dark-grey-text"><a>Popularity</a></p>
                        <p class="dark-grey-text"><a>Average rating</a></p>
                        <p class="dark-grey-text"><a>Price: low to high</a></p>
                        <p class="dark-grey-text"><a>Price: high to low</a></p>
                    </div>

                    <!-- Filter by category-->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Category</strong></h5>
                        <div class="divider"></div>

                        <!--Radio group-->
                        <div class="form-group ">
                            <input name="group100" type="radio" id="radio100">
                            <label for="radio100" class="dark-grey-text">All</label>
                        </div>

                        <div class="form-group">
                            <input name="group100" type="radio" id="radio101" checked>
                            <label for="radio101" class="dark-grey-text">Laptop</label>
                        </div>

                        <div class="form-group">
                            <input name="group100" type="radio" id="radio102">
                            <label for="radio102" class="dark-grey-text">Smartphone</label>
                        </div>

                        <div class="form-group">
                            <input name="group100" type="radio" id="radio103">
                            <label for="radio103" class="dark-grey-text">Tablet</label>
                        </div>

                        <div class="form-group">
                            <input name="group100" type="radio" id="radio104">
                            <label for="radio104" class="dark-grey-text">Headphones</label>
                        </div>
                        <!--Radio group-->
                    </div>
                    <!-- /Filter by category-->
                </div>
                <!-- /Grid row -->

                <!-- Grid row -->
                <div class="row">

                    <!-- Filter by price  -->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Price</strong></h5>
                        <div class="divider"></div>

                        <form class="range-field mt-3">
                            <input id="calculatorSlider" class="no-border" type="range" value="0" min="0" max="30" />
                        </form>

                        <!-- Grid row -->
                        <div class="row justify-content-center">

                            <!-- Grid column -->
                            <div class="col-md-6 text-left">
                                <p class="dark-grey-text"><strong id="resellerEarnings">0$</strong></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6 text-right">
                                <p class="dark-grey-text"><strong id="clientPrice">319$</strong></p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- /Filter by price -->

                    <!-- Filter by rating -->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h5>
                        <div class="divider"></div>
                        <div class="row ml-1">
                            <!-- Rating -->
                            <ul class="rating mb-0">
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li>
                                    <p class="ml-3 dark-grey-text"><a>4 and more</a></p>
                                </li>
                            </ul>

                        </div>

                        <div class="row ml-1">
                            <!-- Rating -->
                            <ul class="rating mb-0">
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star grey-text"></i></li>
                                <li>
                                    <p class="ml-3 dark-grey-text"><a>3 - 3,99</a></p>
                                </li>
                            </ul>

                        </div>

                        <div class="row ml-1">
                            <!-- Rating -->
                            <ul class="rating">
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star blue-text"></i></li>
                                <li><i class="fa fa-star grey-text"></i></li>
                                <li><i class="fa fa-star grey-text"></i></li>
                                <li>
                                    <p class="ml-3 dark-grey-text"><a>3.00 and less</a></p>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- Filter by rating -->
                </div>
                <!-- /Grid row -->
            </div>

        </div>
        <!-- /.Sidebar -->

        <!-- Content -->
        <div class="col-lg-9">

            <!-- Filter Area -->

            <div class="row">

                <div class="col-md-4 mt-3">

                    <!-- Sort by -->
                    <select class="mdb-select grey-text" id="options" multiple>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label for="options">Example label</label>
                    <button class="btn-save btn btn-primary btn-sm">Save</button>
                    <!-- /.Sort by -->

                </div>
                <div class="col-md-8 text-right">

                    <!-- View Switcher -->
                    <a class="btn btn-blue-grey btn-sm"><i class="fa fa-th mr-2" aria-hidden="true"></i><strong> Grid</strong></a>
                    <a class="btn btn-blue-grey btn-sm"><i class="fa fa-th-list mr-2" aria-hidden="true"></i><strong> List</strong></a>
                    <!-- /.View Switcher -->

                </div>

            </div>
            <!-- /.Filter Area -->

            <!-- Products Grid -->
            <section class="section pt-4">

                <!-- Grid row -->
                <div class="row" style="min-height: 100vh">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4" v-for="job in jobs">

                        <!--Card-->
                        <div class="card card-ecommerce">

                            <!--Card image-->
                            <div class="view overlay">
                                <img :src="job.img " class="img-fluid" alt="">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->

                                <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">{{ job.title }}</a></strong></h5><span class="badge mb-2 p-2" :class="{ 'badge-primary': job.type.en_name == 'Employer', 'badge-success' : job.type.en_name == 'Job Seeker' }">{{ job.type.en_name }}</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="phone in job.phone" class="text-grey">
                                        <i class="fa fa-phone blue-text"></i> <strong>{{ phone }}</strong>
                                    </li>
                                </ul>

                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row mb-0">
                                        <span class="float-left"><strong>{{ job.salary }} L.E</strong></span>
                                        <span class="float-right">

                                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-shopping-cart ml-3"></i></a>
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

                <!--Grid row-->
                <div class="row justify-content-center m-4">

                    <!--Pagination -->
                    <nav class="mb-4">
                        <ul class="pagination pagination-circle pg-blue mb-0">

                            <!--First-->
                            <li class="page-item clearfix d-none d-md-block">
                                <a class="page-link waves-effect waves-effect"
                                   :class="{ disabled: endpoint == links.first || endpoint == pagination.path }"
                                   @click.prevent="changeEndpoint(1)">First</a>
                            </li>

                            <!--Arrow left-->
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect" aria-label="Previous"
                                   :class="{ disabled: links.prev == null }"
                                   @click.prevent="navigate(links.prev)">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <!--Numbers-->
                            <li class="page-item" :class="{ active: n == pagination.current_page }" v-for="n in pagination.last_page">
                                <a class="page-link waves-effect waves-effect" @click.prevent="changeEndpoint(n)">{{ n }}</a>
                            </li>


                            <!--Arrow right-->
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect" aria-label="Next"
                                   :class="{ disabled: links.next == null }"
                                   @click.prevent="navigate(links.next)">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>

                            <!--First-->
                            <li class="page-item clearfix d-none d-md-block">
                                <a class="page-link waves-effect waves-effect"
                                   :class="{ disabled: endpoint == links.last }"
                                   @click.prevent="changeEndpoint(pagination.last_page)">Last</a>
                            </li>

                        </ul>
                    </nav>
                    <!--/Pagination -->

                </div>
                <!--Grid row-->
            </section>
            <!-- /.Products Grid -->

        </div>
        <!-- /.Content -->

    </div>
</template>


<script>
    export default {
        data () {
            return {
                endpoint: '/api/job-ads',
                jobs: {},
                links: {},
                pagination: {}
            }
        },
        methods: {
            fetchJobs(){
                let vm = this;
                axios.get(vm.endpoint)
                    .then(function (response) {
                    let data = response.data;
                        vm.jobs = data.data;
                        vm.links = data.links;
                        vm.pagination = data.meta;
                        vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                });
            },
            changeEndpoint(page) {
                let url = this.pagination.path + '?page=' + page;
                this.endpoint = url;
                return this.fetchJobs();
            },
            navigate(url){
                this.endpoint = url;
                return this.fetchJobs();
            }
        },
        mounted() {
            this.fetchJobs();
        }
    }
</script>