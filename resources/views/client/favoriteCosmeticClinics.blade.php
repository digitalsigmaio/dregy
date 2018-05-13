@extends('client.home')

@section('userContent')
    <div class="row pb-5">
        <h1 class="blue-grey-text">Favorite Cosmetic Clinics</h1>
    </div>
    <div class="row mt-4" v-cloak>

        <div class="col-lg-3 col-md-6 mb-4" v-for="cosmetic in cosmetics" :id="'favorite' + cosmetic.id">

            <!--Collection card-->
            <div class="card collection-card z-depth-1-half">
                <!--Card image-->
                <div class="view zoom">
                    <img :src="cosmetic.img" class="img-responsive" alt="">
                    <div class="stripe dark">
                        <a :href="'/cosmetic-clinics/' + cosmetic.id + '/' + cosmetic.slug" target="_blank">
                            <p>@{{ cosmetic.en_name }}
                                <i class="fa fa-angle-right"></i>
                            </p>
                        </a>
                    </div>
                </div>
                <!--Card image-->
            </div>
            <!--Collection card-->

            <a class="btn-floating btn-sm rgba-pink-strong dismiss-favorite" @click.prevent="removeFavorite(cosmetic.id)"><i class="fa fa-times"></i></a>

        </div>

    </div>
@endsection

@push('scripts')

<script>
    const app = new Vue({
       el: '#app',
        data() {
           return {
               user: {!! $user !!},
               cosmetics: {!! $cosmeticClinics !!}
           }
        },
        methods: {
           removeFavorite(id) {
               let user = this.user;
               let favorites = this.user.favorite_cosmetic_clinics;
               for(let i = 0; i < favorites.length; i++ ){
                   if(favorites[i].favourable_id === id) {

                       favorites.splice(i, 1);
                   }
               }

               axios.delete('/api/cosmetic-clinics/' + id + '/users/' + user.id + '/fav')
                   .then(function (res) {
                        $('#favorite' + id).remove()
                   })
           }
        }
    });

    $('.dismiss-favorite').on('click', function () {
        let parent = $(this).parent();
        parent.addClass('animated zoomOut');
    })
</script>

@endpush