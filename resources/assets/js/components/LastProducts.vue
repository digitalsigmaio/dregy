<template>
    <div id="lastProducts" v-cloak>
        <!-- Grid row -->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4" v-for="product in products">
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
                              <a data-toggle="tooltip" data-placement="top" title="Added to Favorite" class="light-green-text">
                                <i class="fa fa-heart ml-3 pr-1 grey-text"></i> {{ product.favorites.count }}
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
        <div class="row justify-content-center mb-4">

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
                    <li class="page-item" :class="{ active: n == pagination.current_page }" v-for="n in pagination.last_page" v-show="( pagination.current_page <=3 && n <= 5 ) || (n <= (pagination.current_page + 2) && n >= (pagination.current_page - 2))">
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
    </div>
</template>
<script>
    export default {
        data () {
            return {
                endpoint: '/api/product-ads',
                products: {},
                links: {},
                pagination: {}
            }
        },
        methods: {
            fetchProducts() {
                let vm = this;
                axios.get(vm.endpoint)
                    .then(function (response) {
                        let res = response.data;
                        vm.products = res.data;
                        vm.links = res.links;
                        vm.pagination = res.meta;
                        vm.endpoint = res.meta.path + '?page=' + vm.pagination.current_page;
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
            },
            changeEndpoint(page) {
                let url = this.pagination.path + '?page=' + page;
                this.endpoint = url;
                return this.fetchProducts();
            },
            navigate(url){
                this.endpoint = url;
                return this.fetchProducts();
            },
        },
        mounted() {
            this.fetchProducts();
        }
    }
</script>