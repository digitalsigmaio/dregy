@extends('layouts.main')
@section('adsSlider')
    @include('layouts.adsSlider')
@endsection
@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!--Section: Cosmetic Clinic detail -->
        <section id="cosmeticClinicDetails" class="pb-5" v-cloak>

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img :src="cosmetic.img" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>@{{ cosmetic.en_name }}</strong>
                        </h2>
                        <div class="row">

                            <div class="col-md-6" v-if="cosmetic.premium">
                                <span class="badge mb-2 p-2 badge-info">Featured</span>
                            </div>

                        </div>

                        <!--Accordion wrapper-->
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingTwo">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#address" aria-expanded="true" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            Address
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="address" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>@{{ cosmetic.region.en_name }}, @{{ cosmetic.city.en_name }}, @{{ cosmetic.en_address }}</p>
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

                                            <p v-for="phone in cosmetic.phone"><i class="fa fa-phone pr-2 blue-text"></i>@{{ phone }}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#moreinfo" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            More Info
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="moreinfo" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">

                                            <p v-if="cosmetic.website"><i class="fa fa-home pr-2 blue-text"></i>@{{ cosmetic.website }}</p>



                                            <p v-if="cosmetic.email"><i class="fa fa-at pr-2 blue-text"></i>@{{ cosmetic.email }}</p>


                                    </div>
                                </div>
                            </div>


                                <div class="card card-ecommerce" v-if="cosmetic.en_note">
                                    <div class="card-header pl-0" role="tab" id="headingThree">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#note" aria-expanded="false" aria-controls="collapseThree">
                                            <h5 class="mb-0">
                                                Note
                                                <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <div id="note" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="dark-grey-text pl-0">

                                            <p>@{{ cosmetic.en_note }}</p>

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
                                @{{ cosmetic.created_at }}
                            </div>
                            <div class="col-md-6 text-right">
                                <span class="light-green-text">
                                    <a @click.prevent="fav(cosmetic.id)" data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(cosmetic.id)">
                                        <i class="fa fa-heart pr-2 animated" :class="favClass(cosmetic.id)"></i>
                                    </a>
                                    @{{ cosmetic.favorites.count }}</span>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Cosmetic Clinic detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Cosmetic Clinics</h3>
        </div>

        <!--Section: Cosmetic Clinics v.5-->
        <section id="cosmeticClinics" class="pb-5">


            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top" v-if="cosmetics.length > 1">
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                <!--Controls-->



                <!--Indicators-->
                <ol class="carousel-indicators" v-if="cosmetics.length > 1" >

                        <li class="primary-color" :class="{ active: n ==1 }" data-target="#multi-item-example" :data-slide-to="(n-1)" v-for="n in cosmetics.length"></li>

                </ol>
                <!--Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">


                        <div class="carousel-item" :class="{ active: n == 1 }" v-for="n in cosmetics.length">

                            <!--Grid column-->
                            <div class="col-md-4 mb-4" v-for="cosmetic in cosmetics[(n-1)]">
                                <!--Card-->
                                <div class="card card-cascade narrower card-ecommerce">
                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img :src="cosmetic.img" class="card-img-top" alt="sample photo">
                                        <a :href="'/cosmetic-clinics/' + cosmetic.id + '/' + cosmetic.slug">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->
                                    <!--Card content-->
                                    <div class="card-body text-center">
                                        <!--Category & Title-->
                                        <a class="grey-text">
                                            <h5>@{{ cosmetic.specialities[0].en_name }}</h5>
                                        </a>
                                        <h4 class="card-title">
                                            <strong>
                                                <a :href="'/cosmetic-clinics/' + cosmetic.id + '/' + cosmetic.slug">@{{ cosmetic.en_name }}</a>
                                            </strong>
                                        </h4>


                                        <span class="badge mb-2 p-2 badge-info" v-if="cosmetic.premium">Featured</span>


                                    <!--Description-->
                                        <p class="card-text">
                                            @{{ cosmetic.region.en_name }}, @{{ cosmetic.city.en_name }}, @{{ cosmetic.en_address }}
                                        </p>


                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="float-right">
                                              <a data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(cosmetic.id)" class="light-green-text" @click.prevent="fav(cosmetic.id)">
                                                <i class="fa fa-heart ml-3 pr-1" :class="favClass(cosmetic.id)"></i> @{{ cosmetic.favorites.count }}
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


                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>
        <!--Section: Cosmetic Clinics v.5-->

    </div>
    <!-- /.Main Container -->

@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data () {
            return {
                user: {!! Auth::check() ? Auth::user()->load(['favoriteCosmeticClinics']) : 'null' !!},
                cosmetics: {!! $relatedCosmeticClinicsChunks !!},
                cosmetic: {!! $cosmetic !!}
            }
        },
        methods: {
            isFav(id) {
                        @if(Auth::check())
                let favorites = this.user.favorite_cosmetic_clinics;
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
                        let cosmetics = this.cosmetics;
                        let favorites = this.user.favorite_cosmetic_clinics;
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        for(let i = 0; i < cosmetics.length; i++ ){
                            if(cosmetics[i].id === id) {

                                cosmetics[i].favorites.count--
                            }
                        }
                        axios.delete('/api/cosmetic-clinics/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {

                        let user = this.user;
                        let cosmetics = this.cosmetics;
                        let favorites = this.user.favorite_cosmetic_clinics;
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });
                        for(let i = 0; i < cosmetics.length; i++ ){
                            if(cosmetics[i].id === id) {
                                console.log(cosmetics[i]);
                                cosmetics[i].favorites.count++
                            }
                        }
                        axios.post('/api/cosmetic-clinics/' + id + '/users/' + user.id + '/fav')
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