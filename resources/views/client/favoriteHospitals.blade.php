@extends('client.home')

@section('userContent')
    <div class="row pb-5">
        <h1 class="blue-grey-text">Favorite Hospitals</h1>
    </div>
    <div class="row mt-4">

        <div class="col-lg-3 col-md-6 mb-4" v-for="hospital in hospitals">

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

            <a class="btn-floating btn-sm rgba-pink-strong dismiss-favorite" @click.prevent="removeFavorite"><i class="fa fa-times"></i></a>

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
               hospitals: {!! $hospitals !!}
           }
        },
        methods: {
           removeFavorite() {

           }
        }
    });

    $('.dismiss-favorite').on('click', function () {

        $(this).parent().addClass('animated rotateOutDownLeft')

    })
</script>

@endpush