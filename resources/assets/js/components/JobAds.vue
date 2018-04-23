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
                            <input name="group100" type="radio" id="category0">
                            <label for="category0" class="dark-grey-text" @click="flush('category')">All</label>
                        </div>

                        <div class="form-group " v-for="category in filters.categories">
                            <input name="group100" type="radio" :id="'category' + category.id" :value="category.id"
                            @click="fetchFilter('category', category.id)">
                            <label :for="'category' + category.id" class="dark-grey-text">{{ category.en_name }}</label>
                        </div>
                        <!--Radio group-->
                    </div>
                    <!-- /Filter by category-->

                    <!-- Filter by experience level-->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Experience Level</strong></h5>
                        <div class="divider"></div>

                        <!--Radio group-->
                        <div class="form-group ">
                            <input name="group100" type="radio" id="experienceLevel0">
                            <label for="experienceLevel0" class="dark-grey-text" @click="flush('experienceLevel')">All</label>
                        </div>

                        <div class="form-group " v-for="experienceLevel in filters.expLevels">
                            <input name="group100" type="radio" :id="'experienceLevel' + experienceLevel.id" :value="experienceLevel.id"
                                   @click="fetchFilter('experienceLevel', experienceLevel.id)">
                            <label :for="'experienceLevel' + experienceLevel.id" class="dark-grey-text">{{ experienceLevel.en_name }}</label>
                        </div>
                        <!--Radio group-->
                    </div>
                    <!-- /Filter by experience level-->
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

            <!-- Job Ads Grid -->
            <section class="section pt-4" v-if="jobs != null">

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
            <!-- /.Job Ads Grid -->

            <!-- Nothing Found -->
            <section class="section pt-4" v-if="jobs == null">
                <div class="row">
                    <div class="col-12 text-center text-muted" style="font-size: 72px; font-family: Raleway">
                        No job found
                    </div>
                </div>
            </section>

        </div>
        <!-- /.Content -->

    </div>
</template>


<script>
    export default {
        data () {
            return {
                endpoint: '/api/job-ads/search',
                jobs: {},
                links: {},
                pagination: {},
                filters: {},
                search: {
                    region: '',
                    city: '',
                    keyword: '',
                    category: '',
                    experienceLevel: '',
                    employmentType: '',
                    type: '',
                    educationLevel: '',
                    orderBy: '',
                }
            }
        },
        methods: {
            fetchJobs(){
                let vm = this;
                axios.post(vm.endpoint, vm.search)
                    .then(function (response) {
                        if (typeof response.data.data !== 'undefined') {
                            let data = response.data;
                            vm.jobs = data.data;
                            vm.links = data.links;
                            vm.pagination = data.meta;
                            vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                        } else if(typeof response.status !== 'undefined') {
                            vm.jobs = null
                            console.log(response.data.message)
                        }

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
            },
            jobFilters(){
                let vm = this;
                axios.get('api/job-filters')
                    .then(function (response) {
                        let data = response.data;
                        vm.filters = data.data;
                    })
                    .catch(function (res) {
                        console.log(res)
                    });
            },
            fetchFilter($key, $value){
                let vm = this;
                vm.search[$key] = $value;
                vm.endpoint = '/api/job-ads/search';
                this.fetchJobs();
            },
            flush($filter){
                this.fetchFilter($filter, '')
            }
        },
        mounted() {
            this.fetchJobs();
            this.jobFilters()
        }
    }
</script>