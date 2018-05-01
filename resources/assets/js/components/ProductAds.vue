<template>
    <div class="row pt-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <div class="">
                <!-- Grid row -->
                <div class="row">
                    <div class="col-md-6 col-lg-12 mb-4">
                        <!-- Panel -->
                        <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h5>
                        <div class="divider"></div>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'desc')"><a>Newest</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'asc')"><a>Oldest</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('price', 'asc')"><a>Price: low to high</a></p>
                        <p class="dark-grey-text mb-1" @click="FilterOrderBy('price', 'desc')"><a>Price: high to low</a></p>
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

                    <!-- Filter by status -->
                    <div class="col-md-6 col-lg-12 mb-4">
                        <h5 class="font-weight-bold dark-grey-text"><strong>Status</strong></h5>
                        <div class="divider"></div>

                        <fieldset id="status">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="status" type="radio" id="status0">
                                <label for="status0" class="dark-grey-text" @click="flush('status')">All</label>
                            </div>

                            <div class="form-group mb-1">
                                <input name="status" type="radio" id="statusNew" value="new"
                                       @click="fetchFilter('status', 'new')">
                                <label for="statusNew" class="dark-grey-text">New</label>
                            </div>

                            <div class="form-group mb-1">
                                <input name="status" type="radio" id="statusUsed" value="used"
                                       @click="fetchFilter('status', 'used')">
                                <label for="statusUsed" class="dark-grey-text">Used</label>
                            </div>
                            <!--Radio group-->
                        </fieldset>
                    </div>
                    <!-- /Filter by status -->

                </div>
                <!-- /Grid row -->

            </div>

        </div>
        <!-- /.Sidebar -->

        <!-- Content -->
        <div class="col-lg-9" id="products">

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

            <!-- Product Ads Grid -->
            <section class="section pt-4 productAds" v-if="products != null">

                <!-- Grid row -->
                <div class="row" style="min-height: 100vh">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4" v-for="product in products">
                                        <!--Card-->
                                        <div class="card card-cascade narrower card-ecommerce">
                                            <!--Card image-->
                                            <div class="view overlay">
                                                <img :src="product.img" class="card-img-top" alt="sample photo">
                                                <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                                </div>
                                                <!--Card image-->
                                                <!--Card content-->
                                                <div class="card-body text-center">
                                                    <!--Category & Title-->
                                                    <a href="" class="grey-text">
                                                        <h5>{{ product.category.en_name }}</h5>
                                                    </a>
                                                    <h4 class="card-title">
                                                        <strong>
                                                            <a href="">{{ product.title }}</a>
                                                        </strong>
                                                    </h4>

                                                    <span class="badge mb-2 p-2" :class="{ 'badge-success': product.status == 'new', 'badge-warning' : product.status == 'used' }">{{ product.status.toUpperCase() }}</span>

                                                    <!--Description-->
                                                    <p class="card-text">
                                                        {{ product.description }}
                                                    </p>
                                                    <!--Card footer-->
                                                    <div class="card-footer">
                                                    <span class="float-left font-weight-bold">
                                                      <strong>{{ product.price }} L.E</strong>
                                                    </span>
                                                    <span class="float-right">
                                                      <a data-toggle="tooltip" data-placement="top" title="Share">
                                                        <i class="fa fa-share-alt grey-text ml-3"></i>
                                                      </a>
                                                      <a data-toggle="tooltip" data-placement="top" title="Added to Favorite">
                                                        <i class="fa fa-heart ml-3"></i>
                                                      </a>
                                                    </span>
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
            <!-- /.Product Ads Grid -->

            <!-- Nothing Found -->
            <section class="section pt-4" v-if="products == null">
                <div class="row">
                    <div class="col-12 text-center text-muted" style="font-size: 72px; font-family: Raleway">
                        No product found
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
                endpoint: '/api/product-ads/search',
                products: {},
                links: {},
                pagination: {},
                search: {
                    region: '',
                    city: '',
                    keyword: '',
                    status: '',
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
            fetchProducts(){
                let vm = this;
                $('.productAds').hide();
                $('.fetching').show();
                axios.post(vm.endpoint, vm.search)
                    .then(function (response) {
                        $('.fetching').hide();
                        $('.productAds').show();
                        if (typeof response.data.data !== 'undefined') {
                            let data = response.data;
                            vm.products = data.data;
                            vm.links = data.links;
                            vm.pagination = data.meta;
                            vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                        } else if(typeof response.status !== 'undefined') {
                            vm.products = null;
                            console.log(response.data.message)
                        }

                    });
            },
            changeEndpoint(page) {
                let url = this.pagination.path + '?page=' + page;
                let productDiv = document.getElementById('products');
                productDiv.scrollIntoView();
                this.endpoint = url;

                return this.fetchProducts();
            },
            navigate(url){
                this.endpoint = url;
                return this.fetchProducts();
            },
            fetchFilter($key, $value){
                let vm = this;
                vm.search[$key] = $value;
                vm.endpoint = '/api/product-ads/search';
                this.fetchProducts();
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
                vm.endpoint = '/api/product-ads/search';
                this.fetchProducts();
            },
            searchByKeyword: _.debounce(function () {
                this.endpoint = '/api/product-ads/search';
                this.fetchProducts()
            }, 500)

        },
        mounted() {
            this.fetchProducts();
        },
        watch: {
            regionId: function (val) {
                this.search.city = '';
                this.search.region = val;
                let region = this.filters.regions.filter(function (region) { return region.id === val });
                this.region = region.shift();
                this.regionName = this.region.en_name;
                this.cityName = 'Choose Area';
                this.endpoint = '/api/product-ads/search';
                this.fetchProducts();
            },
            cityId: function (val) {
                this.search.city = val;
                let city = this.region.cities.filter(function (city) { return city.id === val }).shift();
                this.cityName = city.en_name;
                this.endpoint = '/api/product-ads/search';
                this.fetchProducts();
            },
        }
    }
</script>