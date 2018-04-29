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
                        <p class="dark-grey-text" @click="FilterOrderBy('updated_at', 'desc')"><a>Newest</a></p>
                        <p class="dark-grey-text" @click="FilterOrderBy('updated_at', 'asc')"><a>Oldest</a></p>
                        <p class="dark-grey-text" @click="FilterOrderBy('rate', 'asc')"><a>Rate: low to high</a></p>
                        <p class="dark-grey-text" @click="FilterOrderBy('rate', 'desc')"><a>Rate: high to low</a></p>
                    </div>

                    <!-- Filter by category-->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Speciality</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="category">
                            <!--Radio group-->
                            <div class="form-group ">
                                <input name="speciality" type="radio" id="speciality0">
                                <label for="speciality0" class="dark-grey-text" @click="flush('speciality')">All</label>
                            </div>

                            <div class="form-group " v-for="speciality in filters.specialities">
                                <input name="speciality" type="radio" :id="'speciality' + speciality.id" :value="speciality.id"
                                       @click="fetchFilter('speciality', speciality.id)">
                                <label :for="'speciality' + speciality.id" class="dark-grey-text">{{ speciality.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by category-->

                    <!-- Filter by rate -->
                    <div class="col-md-6 col-lg-12 mb-5">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="rating">
                            <!--Radio group-->
                            <div class="form-group ">
                                <input name="rating" type="radio" id="rating0">
                                <label for="rating0" class="hidden">
                                    <!-- Rating -->
                                    <ul class="rating inline-ul">
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star blue-text"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star grey-text"></i>
                                        </li>
                                    </ul>
                                </label>
                            </div>


                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by rate-->

                </div>
                <!-- /Grid row -->

            </div>

        </div>
        <!-- /.Sidebar -->

        <!-- Content -->
        <div class="col-lg-9" id="hospitals">

            <div class="row mb-0">
                <div class="col-md-6">
                    <!-- Search -->
                    <div class="md-form form-lg">
                        <input type="text" id="keyword" class="form-control form-control-lg" v-model="search.keyword" @keyup="searchByKeyword">
                        <label for="keyword">Search</label>
                    </div>
                </div>
            </div>
            <!-- Filter Area -->
            <div class="row mb-0">

                <!--Dropdown primary-->
                <div class="dropdown">
                    <!--Trigger-->
                    <button class="btn btn-teal dropdown-toggle" type="button" id="RegionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ regionName }}</button>


                    <!--Menu-->
                    <div class="dropdown-menu dropdown-default">
                        <a class="dropdown-item" v-for="region in filters.regions" @click.prevent="regionId = region.id">{{ region.en_name }}</a>
                    </div>
                </div>

                <!--Dropdown primary-->
                <div class="dropdown" v-if="region">

                    <!--Trigger-->
                    <button class="btn btn-teal dropdown-toggle" type="button" id="CityMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ cityName }}</button>


                    <!--Menu-->
                    <div class="dropdown-menu dropdown-default">
                        <a class="dropdown-item" v-for="city in region.cities" @click.prevent="cityId = city.id">{{ city.en_name }}</a>
                    </div>
                </div>

            </div>
            <!-- /.Filter Area -->

            <!-- Hospitals Grid -->
            <section class="section pt-4 hospitals" v-if="hospitals != null">

                <!-- Grid row -->
                <div class="row" style="min-height: 100vh">

                    <!--Grid column-->
                    <div class="col-lg-12 col-md-12 mb-4" v-for="hospital in hospitals" >

                        <!--Card-->
                        <div class="card" :class="{ 'z-depth-2' : mouseOver == hospital.id }" v-on:mouseover="mouseOver = hospital.id" v-on:mouseleave="mouseOver = null">

                            <div class="row">
                                <!--Card image-->
                                <div class="view overlay col-md-6">
                                    <img :src="hospital.img" class="img-fluid" alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body col-md-6">
                                    <!--Category & Title-->

                                   <div class="row">
                                       <div class="col-md-12">
                                           <h5 class="card-title mb-1"><i class="fas fa-hospital red-text fa-2x pr-1 pb-1"></i> <strong><a href="" class="dark-grey-text">{{ hospital.en_name }}</a></strong></h5>
                                       </div>
                                   </div>
                                    <div class="divider"></div>
                                    <div class="row mt-1">
                                        <div class="col-md-12">

                                            <ul class="rating mt-1">
                                                <li v-for="n in 5">
                                                    <i class="fa fa-star cyan-text" :class="starColor(n, hospital.rate.value)"></i>
                                                </li>
                                            </ul>
                                            <!-- Rating -->
                                            <p class="about"><i class="fa fa-map-marker-alt cyan-text pr-1"></i>{{ hospital.en_address }}</p>

                                            <div><i class="fas fa-at pr-1 cyan-text">
                                            </i><span class="light-grey-text text-sm-right">{{ hospital.email }}</span>
                                            </div>
                                            <div class="mt-1"><i class="fas fa-home pr-1 cyan-text">
                                            </i><span class="light-grey-text text-sm-right">{{ hospital.website }}</span>
                                            </div>
                                            <div class="mt-1"><i class="fas fa-heartbeat pr-1"  :class="{ 'pink-text': isFav, 'grey-text' : !isFav }">
                                            </i><span class="light-green-text text-sm-right">{{ hospital.favorites.count }}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--Card content-->
                            </div>

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
            <!-- /.Hospitals Grid -->

            <!-- Nothing Found -->
            <section class="section pt-4" v-if="hospitals == null">
                <div class="row">
                    <div class="col-12 text-center text-muted" style="font-size: 72px; font-family: Raleway">
                        No hospitals found
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
                endpoint: '/api/hospitals/search',
                isFav: false,
                hospitals: {},
                links: {},
                pagination: {},
                search: {
                    region: '',
                    city: '',
                    keyword: '',
                    speciality: '',
                    orderBy: '',
                    sort: ''
                },
                regionId:null,
                region: null,
                regionName: 'Choose City',
                cityId: null,
                cityName: 'Choose Area',
                mouseOver: false
            }
        },
        methods: {
            fetchHospitals(){
                let vm = this;
                $('.hospitals').hide();
                $('.fetching').show();
                axios.post(vm.endpoint, vm.search)
                    .then(function (response) {
                        $('.fetching').hide();
                        $('.hospitals').show();
                        if (typeof response.data.data !== 'undefined') {
                            let data = response.data;
                            vm.hospitals = data.data;
                            vm.links = data.links;
                            vm.pagination = data.meta;
                            vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                        } else if(typeof response.status !== 'undefined') {
                            vm.hospitals = null;
                            console.log(response.data.message)
                        }

                    });
            },
            changeEndpoint(page) {
                let url = this.pagination.path + '?page=' + page;
                let hospitalDiv = document.getElementById('hospitals');
                hospitalDiv.scrollIntoView();
                this.endpoint = url;

                return this.fetchHospitals();
            },
            navigate(url){
                this.endpoint = url;
                return this.fetchHospitals();
            },
            fetchFilter($key, $value){
                let vm = this;
                vm.search[$key] = $value;
                vm.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
            flush($filter){
                this.fetchFilter($filter, '')
            },
            FilterOrderBy($order, $sort) {
                let vm = this;
                this.search.orderBy = $order;
                this.search.sort = $sort;
                vm.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
            searchByKeyword: _.debounce(function () {
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals()
            }, 500),
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

        },
        mounted() {
            this.fetchHospitals();
        },
        watch: {
            regionId: function (val) {
                this.search.city = '';
                this.search.region = val;
                let region = this.filters.regions.filter(function (region) { return region.id === val });
                this.region = region.shift();
                this.regionName = this.region.en_name;
                this.cityName = 'Choose Area';
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
            cityId: function (val) {
                this.search.city = val;
                let city = this.region.cities.filter(function (city) { return city.id === val }).shift();
                this.cityName = city.en_name;
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
        }
    }
</script>