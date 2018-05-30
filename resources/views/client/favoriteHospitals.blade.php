@extends('client.home')

@section('userContent')
    <div class="container" v-cloak>
        <div class="row pb-5">
            <h1 class="blue-grey-text">Favorite Hospitals</h1>
        </div>
        <div class="row mt-4" v-if="hospitals.length">

            <div class="col-lg-3 col-md-6 mb-4" v-for="hospital in hospitals" :id="'favorite' + hospital.id">

                <!--Collection card-->
                <div class="card collection-card z-depth-1-half">
                    <!--Card image-->
                    <div class="view zoom">
                        <img :src="hospital.img" class="img-responsive" alt="">
                        <div class="stripe dark">
                            <a :href="'/hospitals/' + hospital.id + '/' + hospital.slug" target="_blank">
                                <p>@{{ hospital.en_name }}
                                    <i class="fa fa-angle-right"></i>
                                </p>
                            </a>
                        </div>
                    </div>
                    <!--Card image-->
                </div>
                <!--Collection card-->

                <a class="btn-floating btn-sm rgba-pink-strong dismiss-favorite" @click.prevent="removeFavorite(hospital.id)"><i class="fa fa-times"></i></a>

            </div>

        </div>
        <div class="row mt-4  grey lighten-1 z-depth-1 p-5" v-else>
            <div class="col-md-12 text-center  white-text p-5">
                <h1>Nothing in Favorites</h1>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    $('.dismiss-favorite').on('click', function () {
        let parent = $(this).parent();
        parent.addClass('animated zoomOut');    
    });

    const app = new Vue({
       el: '#app',
        data() {
           return {
               user: {!! $user !!},
               hospitals: {!! $hospitals !!}
           }
        },
        methods: {
           removeFavorite(id) {
               let user = this.user;
               let favorites = this.user.favorite_hospitals;
               let hospitals = this.hospitals;
               for(let i = 0; i < favorites.length; i++ ){
                   if(favorites[i].favourable_id === id) {

                       favorites.splice(i, 1);
                   }
               }

               for(let i = 0; i < hospitals.length; i++ ){
                   if(hospitals[i].id === id) {

                       hospitals.splice(i, 1);
                   }
               }

               axios.delete('/api/hospitals/' + id + '/users/' + user.id + '/fav')
                   .then(function (res) {
                        $('#favorite' + id).remove()
                   })
           }
        }
    });

</script>

@endpush