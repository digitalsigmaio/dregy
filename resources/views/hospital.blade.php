@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!--Section: Hospital detail -->
        <section id="hospitalDetails" class="pb-5" v-cloak>

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img :src="hospital.img" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>@{{ hospital.en_name }}</strong>
                        </h2>
                        <div class="row">
                            <div class="col-md-6" v-if="hospital.premium">
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
                                        <p>@{{ hospital.region.en_name }}, @{{ hospital.city.en_name }}, @{{ hospital.en_address }}</p>
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
                                        <p v-for="phone in hospital.phone"><i class="fa fa-phone pr-2 blue-text"></i>@{{ phone }}</p>
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

                                        <p v-if="hospital.website"><i class="fa fa-home pr-2 blue-text"></i>@{{ hospital.website }}</p>



                                        <p v-if="hospital.email"><i class="fa fa-at pr-2 blue-text"></i>@{{ hospital.email }}</p>

                                    </div>
                                </div>
                            </div>


                                <div class="card card-ecommerce" v-if="hospital.en_note">
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

                                            <p>@{{ hospital.en_note }}</p>

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
                                @{{ hospital.created_at }}
                            </div>
                        <div class="col-md-6 text-right">
                                <span class="light-green-text">
                                    <a @click.prevent="fav(hospital.id)" data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(hospital.id)">
                                        <i class="fa fa-heart pr-2 animated" :class="favClass(hospital.id)"></i>
                                    </a>@{{ hospital.favorites.count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Hospital detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Hospitals</h3>
        </div>

        <!--Section: Hospitals v.5-->
        <section id="hospitals" class="pb-5">
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            @

            <!--Controls-->
                <div class="controls-top" v-if="hospitals.length > 1">
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            <!--Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators" v-if="hospitals.length > 1" >
                <li class="primary-color" :class="{ active: n ==1 }" data-target="#multi-item-example" :data-slide-to="(n-1)" v-for="n in hospitals.length"></li>
            </ol>
            <!--Indicators-->


                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item" :class="{ active: n == 1 }" v-for="n in hospitals.length">

                        <!--Grid column-->
                        <div class="col-md-4 mb-4" v-for="hospital in hospitals[(n-1)]">
                                    <!--Card-->
                                    <div class="card card-cascade narrower card-ecommerce">
                                        <!--Card image-->
                                        <div class="view overlay">
                                            <img :src="hospital.img" class="card-img-top" :alt="hospital.en_name">
                                            <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!--Card image-->
                                        <!--Card content-->
                                        <div class="card-body text-center">
                                            <!--Category & Title-->
                                            <a class="grey-text">
                                                <h5>@{{ hospital.specialities[0].en_name }}</h5>
                                            </a>
                                            <h4 class="card-title">
                                                <strong>
                                                    <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug">@{{ hospital.en_name }}</a>
                                                </strong>
                                            </h4>

                                            <span class="badge mb-2 p-2 badge-info" v-if="hospital.premium">Featured</span>

                                            <!--Address-->
                                            <p class="card-text">
                                                @{{ hospital.region.en_name }}, @{{ hospital.city.en_name }}, @{{ hospital.en_address }}
                                            </p>


                                            <!--Card footer-->
                                            <div class="card-footer">
                                            <span class="float-right light-green-text">
                                                <i class="fa fa-heart ml-3 pr-1" :class="favClass(hospital.id)"></i>@{{ hospital.favorites.count }}
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
        <!--Section: Hospitals v.5-->

    </div>
    <!-- /.Main Container -->


@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data () {
            return {
                user: {!! Auth::check() ? Auth::user()->load(['favoriteHospitals']) : 'null' !!},
                hospitals: {!! $relatedHospitalsChunks !!},
                hospital: {!! $hospital !!}
            }
        },
        methods: {
            isFav(id) {
                        @if(Auth::check())
                let favorites = this.user.favorite_hospitals;
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
                        let favorites = this.user.favorite_hospitals;
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        if (this.hospital.id === id) {
                            this.hospital.favorites.count--
                        }

                        axios.delete('/api/hospitals/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {

                        let user = this.user;
                        let favorites = this.user.favorite_hospitals;
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });


                        if (this.hospital.id === id) {
                            this.hospital.favorites.count++
                        }

                        axios.post('/api/hospitals/' + id + '/users/' + user.id + '/fav')
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