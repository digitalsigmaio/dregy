<template>
    <div>
        <!-- Grid row -->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4" v-for="product in products">

                <!--Card-->
                <div class="card card-ecommerce">

                    <!--Card image-->
                    <div class="view overlay">
                        <img :src="product.img" class="img-fluid" alt="sample image">
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
                                <a href="" class="dark-grey-text">{{ product.title }}</a>
                            </strong>
                        </h5>
                        <span class="badge badge-danger mb-2">{{ product.status }}</span>
                        <!-- Rating -->
                        <ul class="rating">

                            <li v-for="phone in product.phone" class="text-grey">
                                <i class="fa fa-phone blue-text"></i> <strong>{{ phone }}</strong>
                            </li>

                        </ul>

                        <!--Card footer-->
                        <div class="card-footer pb-0">
                            <div class="row mb-0">
                                            <span class="float-left">
                                                <strong>{{ product.price }}$</strong>
                                            </span>
                                <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart ml-3"></i>
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
            }
        },
        mounted() {
            this.fetchProducts();
        }
    }
</script>