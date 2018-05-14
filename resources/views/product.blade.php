@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3" v-cloak>

        <!--Section: Product detail -->
        <section id="productDetails" class="pb-5">

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img :src="product.img" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>@{{ product.title }}</strong>
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="badge mb-2 p-2" :class="{ 'badge-success': product.status == 1, 'badge-warning': product.status == 2 }">
                                    @{{ product.status == '1' ? 'New' : 'Used' }}
                                </span>
                            </div>
                        </div>

                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4" v-if="product.price">
                            <span class="red-text font-weight-bold">
                                <strong>@{{ product.price }} L.E</strong>
                            </span>
                            </h3>

                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4" v-else>
                            <span class="red-text font-weight-bold">
                                <strong>Negotiable</strong>
                            </span>
                            </h3>

                        <!--Accordion wrapper-->
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0">
                                            Description
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="description" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>@{{ product.description }}.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#address" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            Address
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="address" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>@{{ product.region.en_name }}, @{{ product.city.en_name }}, @{{ product.address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#phone" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            Phone
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="phone" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">

                                        <p v-for="phone in product.phone"><i class="fa fa-phone pr-2 blue-text"></i>@{{ phone }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Accordion wrapper-->
                    </div>
                </div>
                <div class="card-footer p-2 pr-5">
                    <div class="row">
                        <div class="col-md-6 pl-5">
                            @{{ product.created_at }}
                        </div>
                        <div class="col-md-6 text-right">
                                <span class="light-green-text">
                                    <a @click.prevent="fav(product.id)" data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(product.id)">
                                        <i class="fa fa-heart pr-2 animated" :class="favClass(product.id)"></i>
                                    </a>
                                    <span v-if="product.favorites">@{{ product.favorites.count }}</span>
                                    <span v-else>0</span>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Product detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Products</h3>
        </div>

        <!--Section: Products v.5-->
        <section id="products" class="pb-5">


            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                    <div class="controls-top" v-if="products.length > 1">
                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                <!--Controls-->


                <!--Indicators-->
                <ol class="carousel-indicators" v-if="products.length > 1" >
                    <li class="primary-color" :class="{ active: n ==1 }" data-target="#multi-item-example" :data-slide-to="(n-1)" v-for="n in products.length"></li>
                </ol>
                <!--Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item" :class="{ active: n == 1 }" v-for="n in products.length">

                        <!--Grid column-->
                        <div class="col-md-4 mb-4" v-for="product in products[(n-1)]">

                            <!--Card-->
                            <div class="card card-cascade narrower card-ecommerce">
                                <!--Card image-->
                                <div class="view overlay">
                                    <img :src="product.img" class="card-img-top" :alt="product.title">
                                    <a :href="'/products/' + product.id + '/' + product.slug">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Category & Title-->
                                    <a class="grey-text">
                                        <h5>@{{ product.category.en_name }}</h5>
                                    </a>
                                    <h4 class="card-title" :title="product.title">
                                        <strong>
                                            <a :href="'/products/' + product.id + '/' + product.slug">@{{ product.title }}</a>
                                        </strong>
                                    </h4>

                                    <span class="badge mb-2 p-2" :class="{ 'badge-success': product.status == 1, 'badge-warning': product.status == 2 }">
                                    @{{ product.status == '1' ? 'New' : 'Used' }}
                                    </span>

                                    <!--Description-->
                                    <p class="card-text">
                                        @{{ product.description }}
                                    </p>
                                    <!--Card footer-->
                                    <div class="card-footer">
                                            <span class="float-left font-weight-bold">
                                              <strong>@{{ product.price }} L.E</strong>
                                            </span>
                                        <span class="float-right light-green-text">
                                            <i class="fa fa-heart ml-3 pr-1" :class="favClass(product.id)"></i>
                                            <span v-if="product.favorites">@{{ product.favorites.count }}</span>
                                            <span v-else>0</span>
                                        </span>
                                    </div>
                                </div>
                                <!--Card content-->
                            </div>
                            <!--Card-->

                        </div>
                        <!--Grid column-->

                        </div>


                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>
        <!--Section: Products v.5-->

    </div>
    <!-- /.Main Container -->


@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data () {
            return {
                user: {!! Auth::check() ? Auth::user()->load(['favoriteProductAds']) : 'null' !!},
                products: {!! $relatedProductsChunks !!},
                product: {!! $productAd !!}
            }
        },
        methods: {
            isFav(id) {
                        @if(Auth::check())
                let favorites = this.user.favorite_product_ads;
                for(let i = 0; i < favorites.length; i++ ){
                    if(favorites[i].favourable_id === id) {
                        return true
                    }
                }
                @endif
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
                        let favorites = this.user.favorite_product_ads;
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        if (this.product.id === id) {
                            this.product.favorites.count--
                        }

                        axios.delete('/api/product-ads/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {

                        let user = this.user;
                        let favorites = this.user.favorite_product_ads;
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });


                        if (this.product.id === id) {
                            this.product.favorites.count++
                        }

                        axios.post('/api/product-ads/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    }
                } else {
                    $('#elegantModalForm').modal('show');
                }
            }
        }
    });
</script>
@endpush