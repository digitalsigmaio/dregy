<template>
    <div class="row pt-4">

        <!-- Sidebar -->
        <div class="col-md-2">

            <div class="">
                <!-- Grid row -->
                <div class="row">
                    <div class="col-md-6 col-lg-12 mb-4">
                        <!-- Panel -->
                        <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h5>
                        <div class="divider"></div>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'desc')"><a>Newest</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'asc')"><a>Oldest</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('salary', 'asc')"><a>Salary: low to high</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('salary', 'desc')"><a>Salary: high to low</a></p>
                    </div>

                    <!-- Filter by category-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Category</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="category">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="category" type="radio" id="category0">
                                <label for="category0" class="dark-grey-text" @click="flush('category')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="category in filters.categories">
                                <input name="category" type="radio" :id="'category' + category.id" :value="category.id"
                                       @click="fetchFilter('category', category.id)">
                                <label :for="'category' + category.id" class="dark-grey-text">{{ category.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by category-->

                    <!-- Filter by experience level-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Experience Level</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="experienceLevel">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="experienceLevel" type="radio" id="experienceLevel0">
                                <label for="experienceLevel0" class="dark-grey-text" @click="flush('experienceLevel')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="experienceLevel in filters.expLevels">
                                <input name="experienceLevel" type="radio" :id="'experienceLevel' + experienceLevel.id" :value="experienceLevel.id"
                                       @click="fetchFilter('experienceLevel', experienceLevel.id)">
                                <label :for="'experienceLevel' + experienceLevel.id" class="dark-grey-text">{{ experienceLevel.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by experience level-->

                    <!-- Filter by employment type-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Employment Type</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="employmentType">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="employmentType" type="radio" id="employmentType0">
                                <label for="employmentType0" class="dark-grey-text" @click="flush('employmentType')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="employmentType in filters.empTypes">
                                <input name="employmentType" type="radio" :id="'employmentType' + employmentType.id" :value="employmentType.id"
                                       @click="fetchFilter('employmentType', employmentType.id)">
                                <label :for="'employmentType' + employmentType.id" class="dark-grey-text">{{ employmentType.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by employment type-->

                    <!-- Filter by job ad type-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Ad Type</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="type">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="type" type="radio" id="type0">
                                <label for="type0" class="dark-grey-text" @click="flush('type')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="type in filters.types">
                                <input name="type" type="radio" :id="'type' + type.id" :value="type.id"
                                       @click="fetchFilter('type', type.id)">
                                <label :for="'type' + type.id" class="dark-grey-text">{{ type.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by job ad type-->

                    <!-- Filter by education level-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Education Level</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="educationLevel">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="educationLevel" type="radio" id="educationLevel0">
                                <label for="educationLevel0" class="dark-grey-text" @click="flush('educationLevel')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="educationLevel in filters.eduLevels">
                                <input name="educationLevel" type="radio" :id="'educationLevel' + educationLevel.id" :value="educationLevel.id"
                                       @click="fetchFilter('educationLevel', educationLevel.id)">
                                <label :for="'educationLevel' + educationLevel.id" class="dark-grey-text">{{ educationLevel.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by education level-->
                </div>
                <!-- /Grid row -->

            </div>

        </div>
        <!-- /.Sidebar -->

        <!-- Content -->
        <div class="col-lg-9" id="jobs">

            <div class="row mb-0">
                <div class="col-md-6">
                    <!-- Search -->
                    <div class="md-form form-lg ml-1">
                        <input type="text" id="keyword" class="form-control form-control-lg" v-model="search.keyword" @keyup="searchByKeyword">
                        <label for="keyword">Search</label>
                    </div>
                </div>
            </div>
            <!-- Address Area -->
            <div class="row mb-0">
                <!--Dropdown primary-->
                <div class="dropdown ml-2">
                    <!--Trigger-->
                    <button class="btn btn-info dropdown-toggle" type="button" id="RegionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ regionName }}</button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-info">
                        <a class="dropdown-item" @click.prevent="flush('region')">All</a>
                        <a class="dropdown-item" v-for="region in filters.regions" @click.prevent="regionId = region.id">{{ region.en_name }}</a>
                    </div>
                </div>

                <!--Dropdown Secondary-->
                <div class="dropdown ml-1" v-if="region">
                    <!--Trigger-->
                    <button class="btn blue-gradient dropdown-toggle" type="button" id="CityMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ cityName }}</button>

                    <!--Menu-->
                    <div class="dropdown-menu dropdown-info">
                        <a class="dropdown-item" @click.prevent="flush('city')">All</a>
                        <a class="dropdown-item" v-for="city in region.cities" @click.prevent="cityId = city.id">{{ city.en_name }}</a>
                    </div>
                </div>

            </div>
            <!-- /.Address Area -->

            <!-- Job Ads Grid -->
            <section class="section pt-4 jobAds" v-if="jobs != null">

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

                                <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">{{ job.title }}</a></strong></h5><span class="badge mb-2 p-2" :class="{ 'blue-gradient': job.type.en_name == 'Employer', 'aqua-gradient' : job.type.en_name == 'Job Seeker' }">{{ job.type.en_name }}</span>
                                <!-- Rating -->
                                <ul class="rating">
                                    <li v-for="phone in job.phone" class="text-grey">
                                        <i class="fa fa-phone blue-text"></i> <strong class="teal-text">{{ phone }}</strong>
                                    </li>

                                </ul>



                                <!--Card footer-->
                                <div class="card-footer pb-0">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p><i class="fa fa-bullseye pink-text"></i><strong class="p-2">{{ job.salary }} L.E</strong></p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="footer-address">
                                                {{ job.created_at }}
                                            </div>
                                        </div>
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
                            <li class="page-item" :class="{ active: n == pagination.current_page }" v-for="n in pagination.last_page" v-show="( pagination.current_page <=3 && n <= 5 ) || (n <= (pagination.current_page + 2) && n >= (pagination.current_page - 2))" >
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

            <!-- PreLoader -->
            <section class="section pt-4 fetching" >
                <div class="row">
                    <div class="preloader-wrapper big active crazy m-auto">
                        <div class="spinner-layer spinner-blue-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- /PreLoader -->

        </div>
        <!-- /.Content -->

    </div>
</template>


<script>
    export default {
        props: ['filters'],
        data () {
            return {
                endpoint: '/api/job-ads/search',
                jobs: {},
                links: {},
                pagination: {},
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
                    sort: ''
                },
                regionId:null,
                region: null,
                regionName: 'Choose City',
                cityId: null,
                cityName: 'Choose Area',
            }
        },
        methods: {
            fetchJobs(){
                let vm = this;
                $('.jobAds').hide();
                $('.fetching').show();
                axios.post(vm.endpoint, vm.search)
                    .then(function (response) {
                        $('.fetching').hide();
                        $('.jobAds').show();
                        if (typeof response.data.data !== 'undefined') {
                            let data = response.data;
                            vm.jobs = data.data;
                            vm.links = data.links;
                            vm.pagination = data.meta;
                            vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                        } else if(typeof response.status !== 'undefined') {
                            vm.jobs = null;
                            console.log(response.data.message)
                        }

                });
            },
            changeEndpoint(page) {
                let url = this.pagination.path + '?page=' + page;
                let jobDiv = document.getElementById('jobs');
                jobDiv.scrollIntoView();
                this.endpoint = url;

                return this.fetchJobs();
            },
            navigate(url){
                this.endpoint = url;
                return this.fetchJobs();
            },
            fetchFilter($key, $value){
                let vm = this;
                vm.search[$key] = $value;
                vm.endpoint = '/api/job-ads/search';
                this.fetchJobs();
            },
            flush($filter){
                if ($filter === 'region') {
                    this.regionName = 'Choose City';
                    this.regionId = '';
                } else if($filter === 'city') {
                    this.cityName = 'Choose Area';
                    this.cityId = '';
                }
                this.fetchFilter($filter, '')
            },
            FilterOrderBy($order, $sort) {
                let vm = this;
                this.search.orderBy = $order;
                this.search.sort = $sort;
                vm.endpoint = '/api/job-ads/search';
                this.fetchJobs();
            },
            searchByKeyword: _.debounce(function () {
                this.endpoint = '/api/job-ads/search';
                this.fetchJobs()

            }, 500)
        },
        mounted() {
            this.fetchJobs();
        },
        watch: {
            regionId: function (val) {
                this.search.city = '';
                this.search.region = val;
                let region = this.filters.regions.filter(function (region) { return region.id === val });
                this.region = region.shift();
                this.regionName = this.region.en_name;
                this.cityName = 'Choose Area';
                this.endpoint = '/api/job-ads/search';
                this.fetchJobs();
            },
            cityId: function (val) {
                this.search.city = val;
                let city = this.region.cities.filter(function (city) { return city.id === val }).shift();
                this.cityName = city.en_name;
                this.endpoint = '/api/job-ads/search';
                this.fetchJobs();
            },
        }
    }
</script>