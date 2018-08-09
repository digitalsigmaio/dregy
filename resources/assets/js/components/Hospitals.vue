<template>
    <div class="row pt-4" v-cloak>

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
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('rate', 'asc')"><a>Rate: low to high</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('rate', 'desc')"><a>Rate: high to low</a></p>
                    </div>

                    <!-- Filter by category-->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Speciality</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="category">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="speciality" type="radio" id="speciality0">
                                <label for="speciality0" class="dark-grey-text" @click="flush('speciality')">All</label>
                            </div>

                            <div class="form-group mb-1" v-for="speciality in filters.specialities">
                                <input name="speciality" type="radio" :id="'speciality' + speciality.id" :value="speciality.id"
                                       @click="fetchFilter('speciality', speciality.id)">
                                <label :for="'speciality' + speciality.id" class="dark-grey-text">{{ speciality.en_name }}</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by category-->

                    <!-- Filter by rate -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="rating">

                            <div class="form-group mb-1">
                                <input name="speciality" type="radio" id="allRatings">
                                <label for="allRatings" class="dark-grey-text" @click="flush('rate')">All</label>
                            </div>

                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <!--Radio group-->
                                <div class="form-group mb-1">
                                    <input name="rating" type="radio" id="rating1" value="4" v-model="search.rate" @click="filterByRate">
                                    <label for="rating1" class="hidden">
                                        <!-- Rating -->
                                        <ul class="rating inline-ul">
                                            <li v-for="n in 5">
                                                <i class="fa fa-star" :class="{ 'blue-text': n <=4, 'grey-text': n > 4 }"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus small"></i>
                                            </li>
                                        </ul>
                                    </label>
                                </div>

                                <!--Radio group-->
                                <div class="form-group mb-1">
                                    <input name="rating" type="radio" id="rating2" value="3" v-model="search.rate" @click="filterByRate">
                                    <label for="rating2" class="hidden">
                                        <!-- Rating -->
                                        <ul class="rating inline-ul">
                                            <li v-for="n in 5">
                                                <i class="fa fa-star" :class="{ 'blue-text': n <= 3, 'grey-text': n > 3 }"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus small"></i>
                                            </li>
                                        </ul>
                                    </label>
                                </div>

                                <!--Radio group-->
                                <div class="form-group mb-1">
                                    <input name="rating" type="radio" id="rating3" value="2" v-model="search.rate" @click="filterByRate">
                                    <label for="rating3" class="hidden">
                                        <!-- Rating -->
                                        <ul class="rating inline-ul">
                                            <li v-for="n in 5">
                                                <i class="fa fa-star" :class="{ 'blue-text': n <= 2, 'grey-text': n > 2 }"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus small"></i>
                                            </li>
                                        </ul>
                                    </label>
                                </div>

                                <!--Radio group-->
                                <div class="form-group mb-1">
                                    <input name="rating" type="radio" id="rating4" value="1" v-model="search.rate" @click="filterByRate">
                                    <label for="rating4" class="hidden">
                                        <!-- Rating -->
                                        <ul class="rating inline-ul">
                                            <li v-for="n in 5">
                                                <i class="fa fa-star" :class="{ 'blue-text': n <= 1, 'grey-text': n > 1 }"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus small"></i>
                                            </li>
                                        </ul>
                                    </label>
                                </div>

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
        <div class="col-md-10" id="hospitals">

            <div class="row mb-0">
                <div class="col-md-6">
                    <!-- Search -->
                    <div class="md-form form-lg ml-1">
                        <input type="text" id="keyword" class="form-control form-control-lg" v-model="search.keyword" @keyup="triggerSearch">
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

            <!-- Hospitals Grid -->
            <section class="section pt-4 hospitals" v-if="hospitals != null">

                <!-- Grid row -->
                <div class="row" style="min-height: 100vh">

                    <!--Grid column-->
                    <div class="col-md-12 mb-4" v-for="hospital in hospitals" >

                        <!--Card-->
                        <div class="card" :class="{ 'z-depth-2' : mouseOver == hospital.id }" @mouseover="mouseOver = hospital.id" @mouseleave="mouseOver = null">

                            <div class="row">
                                <!--Card image-->
                                <div class="view overlay col-md-6">
                                    <img :src="hospital.img" class="img-fluid" alt="">
                                    <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body col-md-6">
                                    <!--Category & Title-->

                                    <div class="row">

                                        <div class="col-md-9">
                                            <h5 class="card-title mb-1"><i class="fas fa-hospital-o red-text fa-2x pr-1 pb-1"></i> <strong><a :href="'/hospitals/' + hospital.id + '/' + hospital.slug" class="dark-grey-text">{{ hospital.en_name }}</a></strong></h5>
                                        </div>
                                        <div class="col-md-3 mt-1 text-center">
                                            <a data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(hospital.id)" @click.prevent="fav(hospital.id)" >
                                                <i class="fa fa-heart pr-1 animated"  :class="favClass(hospital.id)"></i>
                                            </a>
                                            <span class="light-green-text text-sm-right">{{ favorites(hospital) }}</span>
                                        </div>

                                    </div>
                                    <div class="divider"></div>
                                    <div class="row mt-1">
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="m-auto h2-responsive grey-text">
                                                            {{ hospital.rate.rating }}
                                                        </div>
                                                    </div>
                                                    <ul class="rating mt-1">
                                                        <li v-for="n in 5">
                                                            <i :class="starColor(n, hospital.rate.rating)"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 m-auto">
                                                    <span class="badge badge-primary mb-2 p-2" v-if="hospital.premium">Featured</span>
                                                </div>
                                            </div>

                                            <!-- Rating -->
                                            <p class="about"><i class="fa fa-map-marker cyan-text pr-1"></i>{{ hospital.en_address }}</p>

                                            <p><i class="fa fa-at pr-1 cyan-text">
                                                </i><span class="light-grey-text ">{{ hospital.email }}</span>
                                            </p>

                                            <p><i class="fa fa-home pr-1 cyan-text">
                                                </i><span class="light-grey-text">{{ hospital.website }}</span>
                                            </p>

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
            <!-- /.Hospitals Grid -->

            <!-- Nothing Found -->
            <section class="section pt-4 hospitals" v-if="hospitals == null">
                <div class="row">
                    <div class="col-12 text-center text-muted" style="font-size: 72px; font-family: Raleway">
                        No hospital found
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
    export default{
        props: ['filters', 'user', 'auth_user'],
        data () {
            return {
                hospitals: {},
                endpoint: '/api/hospitals/search',
                links: {},
                pagination: {},
                search: {
                    region: '',
                    city: '',
                    keyword: '',
                    speciality: '',
                    orderBy: '',
                    sort: '',
                    rate: ''
                },
                regionId:null,
                region: null,
                regionName: 'Choose City',
                cityId: null,
                cityName: 'Choose Area',
                mouseOver: false,
            }
        },
        methods: {
            favorites(val) {
                if(val.favorites !== null) {
                    return val.favorites.count;
                } else {
                    return 0;
                }
            },
            fetchHospitals(){
                let vm = this;
                $('.hospitals').hide();
                $('.fetching').show();
                axios.post(vm.endpoint, vm.search)
                    .then(function (response) {
                        $('.fetching').hide();
                        $('.hospitals').show();
                        let data = response.data;
                        vm.hospitals = data.data;
                        vm.links = data.links;
                        vm.pagination = data.meta;
                        vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                    })
                    .catch((e) => {
                        console.log(e.response);
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
                vm.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
            searchByKeyword: _.debounce(function () {
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals()
            }, 500),
            triggerSearch() {
                let len = this.search.keyword.length;
              if(len >= 3 || len === 0 ) {
                  this.searchByKeyword();
              }
            },
            floor(rate) {
                return parseInt(Math.floor(rate));
            },
            ceil(rate) {
                return parseInt(Math.ceil(rate));
            },
            round(rate) {
                return parseInt(Math.round(rate));
            },
            starColor(n, rate) {
                if (n <= this.floor(rate)) {
                    return 'fa fa-star cyan-text'
                } else if (n === this.ceil(rate)) {
                    return 'fa fa-star-half-full cyan-text'
                } else {
                    return 'fa fa-star-o cyan-text'
                }
            },
            filterByRate: _.debounce(function () {
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals()
            }, 100),
            isFav(id) {
                        if(this.auth_user){
                let favorites = this.user.favorite_hospitals;
                if(favorites.length) {
                    for(let i = 0; i < favorites.length; i++ ){
                        if(favorites[i].favourable_id === id) {
                            return true;
                        }
                    }
                } else {
                    return false;
                }
                }
                    return false;
            },
            favClass(id) {
                let fav = this.isFav(id);
                return {
                    'grey-text pulse': !fav,
                    'pink-text bounceIn': fav
                }
            },
            originalTitle(id) {
                if(this.isFav(id)) {
                    return 'Remove from Favorites'
                } else {
                    return 'Add to Favorites'
                }
            },
            fav(id) {
                if(this.user) {
                    let user = this.user;
                    let hospitals = this.hospitals;
                    let favorites = this.user.favorite_hospitals;
                    if (this.isFav(id)) {
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        for(let i = 0; i < hospitals.length; i++ ){
                            if(hospitals[i].id === id) {

                                if(hospitals[i].favorites !== null) {
                                    hospitals[i].favorites.count--
                                }
                            }
                        }
                        axios.delete('/api/hospitals/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });
                        for(let i = 0; i < hospitals.length; i++ ){
                            if(hospitals[i].id === id) {
                                if(hospitals[i].favorites !== null) {
                                    hospitals[i].favorites.count++
                                } else {
                                    hospitals[i].favorites = { count: 1 };
                                }
                            }
                        }
                        axios.post('/api/hospitals/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    }
                } else {
                    $('#elegantModalForm').modal('show');
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
                if(this.region) {
                    this.regionName = this.region.en_name;
                }
                this.cityName = 'Choose Area';
                this.endpoint = '/api/hospitals/search';
                this.fetchPharmacies();
            },
            cityId: function (val) {
                this.search.city = val;
                let city = this.region.cities.filter(function (city) { return city.id === val }).shift();
                if(city) {
                    this.cityName = city.en_name;
                }
                this.endpoint = '/api/hospitals/search';
                this.fetchHospitals();
            },
        }
    };
</script>