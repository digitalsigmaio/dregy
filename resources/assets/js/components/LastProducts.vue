<template>
<div id="lastProducts" v-cloak>
    <!-- Grid row -->
    <div class="row">

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4" v-for="product in products">
            <!--Card-->
            <div class="card card-cascade narrower card-ecommerce">
                <!--Card image-->
                <div class="view overlay product-img" :style="backgroundImg(product.img)">

                    <a :href="'/products/' + product.id + '/' + product.slug">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body text-center">
                    <!--Category & Title-->
                    <a class="grey-text">
                        <h5>{{ product.category.en_name }}</h5>
                    </a>
                    <h4 class="card-title" :title="product.title">
                        <strong>
                            <a :href="'/products/' + product.id + '/' + product.slug">{{ product.title }}</a>
                        </strong>
                    </h4>

                    <div class="row my-2">
                        <div class="col-md-6 pr-0 pt-1">
                                        <span class="badge mb-2 p-2" :class="{ 'badge-success': product.status == '1', 'badge-warning' : product.status == '2' }">
                                    {{ product.status == '1' ? 'New' : 'Used' }}</span>
                        </div>
                        <div class="col-md-6">
                            <a data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(product.id)" @click.prevent="fav(product.id)" class="h3-responsive mr-2 float-left">
                                <i class="fas fa-heart pr-1 animated"  :class="favClass(product.id)"></i>
                            </a>
                        </div>
                    </div>

                    <!--Description-->
                    <p class="card-text">
                        {{ product.description }}
                    </p>
                    <!--Card footer-->
                    <div class="card-footer pb-0 pl-0">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <strong>{{ product.price }} L.E</strong>
                            </div>
                            <div class="col-md-6 text-center pr-0">
                                            <span class="small">
                                                {{ product.created_at }}
                                            </span>
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
    export default{
        props:['user', 'auth_user'],
        data () {
            return {
                endpoint: '/api/product-ads',
                products: {},
                links: {},
                pagination: {},
            }
        },
        methods: {
            backgroundImg(src) {
                return "background-image: url('" + src + "')";
            },
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
            isFav(id) {
                if(this.auth_user){
                    let favorites = this.user.favorite_product_ads;
                    for(let i = 0; i < favorites.length; i++ ){
                        if(favorites[i].favourable_id === id) {
                            return true
                        }
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
                    if (this.isFav(id)) {
                        let user = this.user;
                        let products = this.products;
                        let favorites = this.user.favorite_product_ads;
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        for(let i = 0; i < products.length; i++ ){
                            if(products[i].id === id) {

                                products[i].favorites.count--
                            }
                        }
                        axios.delete('/api/product-ads/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {

                        let user = this.user;
                        let products = this.products;
                        let favorites = this.user.favorite_product_ads;
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });
                        for(let i = 0; i < products.length; i++ ){
                            if(products[i].id === id) {
                                products[i].favorites.count++
                            }
                        }
                        axios.post('/api/product-ads/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    }
                } else {
                    $('#elegantModalForm').modal('show');
                }
            }
        },
        mounted() {
            this.fetchProducts();
        }
    };
</script>
