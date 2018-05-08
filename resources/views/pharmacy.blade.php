@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!--Section: Pharmacy detail -->
        <section id="pharmacyDetails" class="pb-5" v-cloak>

            <!--News card-->
            <div class="card mt-5 hoverable">
                <div class="row mt-5 pb-5">
                    <div class="col-lg-6">

                        <!--Carousel Wrapper-->
                        <img :src="pharmacy.img" class="img-fluid"/>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                            <strong>@{{ pharmacy.en_name }}</strong>
                        </h2>
                        <div class="row">

                            <div class="col-md-6" v-if="pharmacy.premium">
                                <span class="badge mb-2 p-2 badge-info">Featured</span>
                            </div>

                            <div class="col-md-6 text-center">

                                <a class="btn-floating btn-sm sky-gradient mr-0 mt-0" data-toggle="tooltip" data-placement="top" title="Open 24 hour" v-if="pharmacy.full_time"><div class="m-auto pt-2 white-text"><strong>24</strong></div></a>


                                <a class="btn-floating btn-sm purple-gradient ml-1 mt-0" data-toggle="tooltip" data-placement="top" title="Home Delivery" v-if="pharmacy.delivery"><i class="fas fa-truck"></i></a>

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

                                        <p v-if="pharmacy.website"><i class="fa fa-home pr-2 blue-text"></i>@{{ pharmacy.website }}</p>



                                        <p v-if="pharmacy.email"><i class="fa fa-at pr-2 blue-text"></i>@{{ pharmacy.email }}</p>

                                    </div>
                                </div>
                            </div>


                            <div class="card card-ecommerce" v-if="pharmacy.en_note">
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

                                        <p>@{{ pharmacy.en_note }}</p>

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
                            @{{ pharmacy.created_at }}
                        </div>
                        <div class="col-md-6 text-right">
                                <span class="light-green-text">
                                    <a @click.prevent="fav(pharmacy.id)" data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(pharmacy.id)">
                                        <i class="fa fa-heart pr-2 animated" :class="favClass(pharmacy.id)"></i>
                                    </a>
                                    @{{ pharmacy.favorites.count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section: Pharmacy detail -->

        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold blue-text mx-3">Related Pharmacies</h3>
        </div>

        <!--Section: Pharmacies v.5-->
        <section id="pharmacies" class="pb-5">


            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            @if(count($relatedPharmaciesChunks) > 1)
                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                <!--Controls-->
            @endif

            @if(count($relatedPharmaciesChunks) > 1)
                <!--Indicators-->
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($relatedPharmaciesChunks); $i++)
                        <li class="primary-color {{ $i == 0 ? 'active': '' }}" data-target="#multi-item-example" data-slide-to="{{$i}}"></li>
                    @endfor
                </ol>
                <!--Indicators-->
            @endif
                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    @for($i = 0; $i < count($relatedPharmaciesChunks); $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active': '' }}">
                        @foreach($relatedPharmaciesChunks[$i] as $pharmacy)
                            <!--Grid column-->
                                <div class="col-md-4 mb-4">
                                    <!--Card-->
                                    <div class="card card-cascade narrower card-ecommerce">
                                        <!--Card image-->
                                        <div class="view overlay">
                                            <img src="{{ $pharmacy->img }}" class="card-img-top" alt="sample photo">
                                            <a href="/pharmacies/{{ $pharmacy->id }}/{{ $pharmacy->slug }}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <!--Card image-->
                                        <!--Card content-->
                                        <div class="card-body text-center">
                                            <!--Category & Title-->
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    @if($pharmacy->full_time)
                                                        <a class="btn-floating btn-sm sky-gradient mr-0 mt-0" data-toggle="tooltip" data-placement="top" title="Open 24 hour"><div class="m-auto pt-2 white-text"><strong>24</strong></div></a>
                                                    @endif
                                                    @if($pharmacy->delivery)
                                                        <a class="btn-floating btn-sm purple-gradient ml-1 mt-0" data-toggle="tooltip" data-placement="top" title="Home Delivery"><i class="fas fa-truck"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <h4 class="card-title mt-2">
                                                <strong>
                                                    <a href="/pharmacies/{{ $pharmacy->id }}/{{ $pharmacy->slug }}">{{ $pharmacy->en_name }}</a>
                                                </strong>
                                            </h4>

                                            @if($pharmacy->premium)
                                                <span class="badge mb-2 p-2 badge-info">Featured</span>
                                            @endif

                                        <!--Description-->
                                            <p class="card-text">
                                                {{ $pharmacy->region->en_name }}, {{ $pharmacy->city->en_name }}, {{ $pharmacy->en_address }}
                                            </p>


                                            <!--Card footer-->
                                            <div class="card-footer">
                                                <span class="float-right">
                                                  <a data-toggle="tooltip" data-placement="top" title="Added to Favorite" class="light-green-text">
                                                    <i class="fa fa-heart ml-3 pr-1 grey-text"></i> {{ $pharmacy->favorites->count() }}
                                                  </a>
                                                </span>
                                            </div>
                                        </div>
                                        <!--Card content-->
                                    </div>
                                    <!--Card-->

                                </div>
                                <!--Grid column-->
                            @endforeach
                        </div>
                    @endfor

                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>
        <!--Section: Pharmacies v.5-->

    </div>
    <!-- /.Main Container -->


@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data () {
            return {
                user: {!! Auth::check() ? Auth::user()->load(['favoritePharmacies']) : 'null' !!},
                pharmacies: {!! $relatedPharmaciesChunks !!},
                pharmacy: {!! $pharmacy !!}
            }
        },
        methods: {
            isFav(id) {
                        @if(Auth::check())
                let favorites = this.user.favorite_pharmacies;
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
                        let favorites = this.user.favorite_pharmacies;
                        for(let i = 0; i < favorites.length; i++ ){
                            if(favorites[i].favourable_id === id) {

                                favorites.splice(i, 1);
                            }
                        }

                        if (this.pharmacy.id === id) {
                            this.pharmacy.favorites.count--
                        }

                        axios.delete('/api/pharmacies/' + id + '/users/' + user.id + '/fav')
                            .then(function (res) {

                            })
                    } else {

                        let user = this.user;
                        let favorites = this.user.favorite_cosmetic_clinics;
                        favorites.push({
                            favourable_id: id,
                            user_id: user.id
                        });


                        if (this.pharmacy.id === id) {
                            this.pharmacy.favorites.count++
                        }

                        axios.post('/api/pharmacies/' + id + '/users/' + user.id + '/fav')
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