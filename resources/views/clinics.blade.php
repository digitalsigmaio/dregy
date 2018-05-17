@extends('layouts.main')

@section('adsSlider')
    @include('layouts.adsSlider')
@endsection

@section('content')

   <div class="row pt-4" v-cloak>

      <!-- Sidebar -->
      <div class="col-md-2">

         <div class="">
            <!-- Grid row -->
            <div class="row">
               <div class="col-md-6 col-lg-12 mb-4">
                  <!-- Panel -->
                  <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h5>
                  <div class="divider"></div>
                  <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'desc')"><a>Newest</a></p>
                  <p class="dark-grey-text mb-1" @click="FilterOrderBy('updated_at', 'asc')"><a>Oldest</a></p>
                  <p class="dark-grey-text mb-1" @click="FilterOrderBy('rate', 'asc')"><a>Rate: low to high</a></p>
                  <p class="dark-grey-text mb-1" @click="FilterOrderBy('rate', 'desc')"><a>Rate: high to low</a></p>
               </div>

               <!-- Filter by speciality -->
               <div class="col-md-6 col-lg-12 mb-4">
                  <h5 class="font-weight-bold dark-grey-text"><strong>Speciality</strong></h5>
                  <div class="divider"></div>

                  <fieldset id="speciality">
                     <!--Radio group-->
                     <div class="form-group mb-1">
                        <input name="speciality" type="radio" id="speciality0">
                        <label for="speciality0" class="dark-grey-text" @click="flush('speciality')">All</label>
                     </div>

                     <div class="form-group mb-1" v-for="speciality in filters.specialities">
                        <input name="speciality" type="radio" :id="'speciality' + speciality.id" :value="speciality.id"
                               @click="fetchFilter('speciality', speciality.id)">
                        <label :for="'speciality' + speciality.id" class="dark-grey-text">@{{ speciality.en_name }}</label>
                     </div>
                     <!--Radio group-->
                  </fieldset>
               </div>
               <!-- /Filter by speciality -->

               <!-- Filter by degree -->
               <div class="col-md-6 col-lg-12 mb-4">
                  <h5 class="font-weight-bold dark-grey-text"><strong>Degree</strong></h5>
                  <div class="divider"></div>

                  <fieldset id="degree">
                     <!--Radio group-->
                     <div class="form-group mb-1">
                        <input name="degree" type="radio" id="degree0">
                        <label for="degree0" class="dark-grey-text" @click="flush('degree')">All</label>
                     </div>

                     <div class="form-group mb-1" v-for="degree in filters.degrees">
                        <input name="degree" type="radio" :id="'degree' + degree.id" :value="degree.id"
                               @click="fetchFilter('degree', degree.id)">
                        <label :for="'degree' + degree.id" class="dark-grey-text">@{{ degree.en_name }}</label>
                     </div>
                     <!--Radio group-->
                  </fieldset>
               </div>
               <!-- /Filter by degree -->

                <!-- Filter by rate -->
                <div class="col-md-6 col-lg-12 mb-4">
                    <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h5>
                    <div class="divider"></div>

                    <fieldset id="rating">

                        <div class="form-group mb-1">
                            <input name="speciality" type="radio" id="allRatings">
                            <label for="allRatings" class="dark-grey-text" @click="flush('rate')">All</label>
                        </div>

                        <!--Radio group-->
                        <div class="form-group mb-1">
                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="rating" type="radio" id="rating1" value="4" v-model="search.rate" @click="filterByRate">
                                <label for="rating1" class="hidden">
                                    <!-- Rating -->
                                    <ul class="rating inline-ul">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="{ 'blue-text': n <=4, 'grey-text': n > 4 }"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-plus small"></i>
                                        </li>
                                    </ul>
                                </label>
                            </div>

                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="rating" type="radio" id="rating2" value="3" v-model="search.rate" @click="filterByRate">
                                <label for="rating2" class="hidden">
                                    <!-- Rating -->
                                    <ul class="rating inline-ul">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="{ 'blue-text': n <= 3, 'grey-text': n > 3 }"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-plus small"></i>
                                        </li>
                                    </ul>
                                </label>
                            </div>

                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="rating" type="radio" id="rating3" value="2" v-model="search.rate" @click="filterByRate">
                                <label for="rating3" class="hidden">
                                    <!-- Rating -->
                                    <ul class="rating inline-ul">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="{ 'blue-text': n <= 2, 'grey-text': n > 2 }"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-plus small"></i>
                                        </li>
                                    </ul>
                                </label>
                            </div>

                            <!--Radio group-->
                            <div class="form-group mb-1">
                                <input name="rating" type="radio" id="rating4" value="1" v-model="search.rate" @click="filterByRate">
                                <label for="rating4" class="hidden">
                                    <!-- Rating -->
                                    <ul class="rating inline-ul">
                                        <li v-for="n in 5">
                                            <i class="fa fa-star" :class="{ 'blue-text': n <= 1, 'grey-text': n > 1 }"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-plus small"></i>
                                        </li>
                                    </ul>
                                </label>
                            </div>


                            <!--Radio group-->
                    </fieldset>
                </div>
                <!-- /Filter by rate-->
            </div>
            <!-- /Grid row -->

         </div>

      </div>
      <!-- /.Sidebar -->

      <!-- Content -->
      <div class="col-md-10" id="clinics">

         <div class="row mb-0">
            <div class="col-md-6">
               <!-- Search -->
               <div class="md-form form-lg ml-1">
                  <input type="text" id="keyword" class="form-control form-control-lg" v-model="search.keyword" @keyup="searchByKeyword">
                  <label for="keyword">Search</label>
               </div>
            </div>
         </div>
         <!-- Address Area -->
         <div class="row mb-0">
            <!--Dropdown primary-->
            <div class="dropdown ml-2">
               <!--Trigger-->
               <button class="btn btn-info dropdown-toggle" type="button" id="RegionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@{{ regionName }}</button>
               <!--Menu-->
               <div class="dropdown-menu dropdown-info">
                  <a class="dropdown-item" @click.prevent="flush('region')">All</a>
                  <a class="dropdown-item" v-for="region in filters.regions" @click.prevent="regionId = region.id">@{{ region.en_name }}</a>
               </div>
            </div>

            <!--Dropdown Secondary-->
            <div class="dropdown ml-1" v-if="region">
               <!--Trigger-->
               <button class="btn blue-gradient dropdown-toggle" type="button" id="CityMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@{{ cityName }}</button>

               <!--Menu-->
               <div class="dropdown-menu dropdown-info">
                  <a class="dropdown-item" @click.prevent="flush('city')">All</a>
                  <a class="dropdown-item" v-for="city in region.cities" @click.prevent="cityId = city.id">@{{ city.en_name }}</a>
               </div>
            </div>

         </div>
         <!-- /.Address Area -->

         <!-- Hospitals Grid -->
         <section class="section pt-4 clinics" v-if="clinics != null">

            <!-- Grid row -->
            <div class="row" style="min-height: 100vh">

               <!--Grid column-->
               <div class="col-md-12 mb-4" v-for="clinic in clinics" >

                  <!--Card-->
                  <div class="card" :class="{ 'z-depth-2' : mouseOver == clinic.id }" @mouseover="mouseOver = clinic.id" @mouseleave="mouseOver = null">

                     <div class="row">
                        <!--Card image-->
                        <div class="view overlay col-md-6">
                           <img :src="clinic.img" class="img-fluid" alt="">
                           <a :href="'/clinics/' + clinic.id + '/' + clinic.slug">
                              <div class="mask rgba-white-slight"></div>
                           </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body col-md-6">
                           <!--Category & Title-->

                           <div class="row">

                              <div class="col-md-9">
                                 <h5 class="card-title mb-1"><i class="fa fa-user-md blue-text fa-2x pr-2"></i> <strong><a :href="'/clinics/' + clinic.id + '/' + clinic.slug" class="dark-grey-text">@{{ clinic.en_name }}</a></strong></h5>
                              </div>
                               <div class="col-md-3 mt-1 text-center">
                                   <a data-toggle="tooltip" data-placement="top" :data-original-title="originalTitle(clinic.id)" @click.prevent="fav(clinic.id)" >
                                       <i class="fa fa-heart pr-1 animated"  :class="favClass(clinic.id)"></i>
                                   </a>
                                   <span class="light-green-text text-sm-right">@{{ favorites(clinic) }}</span>
                               </div>

                           </div>
                           <div class="divider"></div>

                           <div class="row mt-1">
                              <div class="col-md-12">
                                  <!-- Clinic Rating -->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="col-md-12">
                                              <div class="m-auto h2-responsive grey-text">
                                                  @{{ clinic.rate.rating }}
                                              </div>
                                          </div>
                                          <ul class="rating mt-1">
                                              <li v-for="n in 5">
                                                  <i :class="starColor(n, clinic.rate.rating)"></i>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>


                                 <!-- Address -->
                                 <p class="about"><i class="fa fa-map-marker cyan-text pr-1"></i>@{{ clinic.en_address }}</p>

                                 <p><i class="fa fa-at pr-1 cyan-text">
                                    </i><span class="light-grey-text ">@{{ clinic.email }}</span>
                                 </p>

                                 <p><i class="fa fa-home pr-1 cyan-text">
                                    </i><span class="light-grey-text">@{{ clinic.website }}</span>
                                 </p>

                              </div>
                           </div>


                        </div>
                        <!--Card content-->
                     </div>

                  </div>
                  <!--Card-->

               </div>
               <!--Grid column-->


            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row justify-content-center m-4">

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
                     <li class="page-item" :class="{ active: n == pagination.current_page }" v-for="n in pagination.last_page" v-show="( pagination.current_page <=3 && n <= 5 ) || (n <= (pagination.current_page + 2) && n >= (pagination.current_page - 2))" >
                        <a class="page-link waves-effect waves-effect" @click.prevent="changeEndpoint(n)">@{{ n }}</a>
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
         </section>
         <!-- /.Hospitals Grid -->

         <!-- Nothing Found -->
         <section class="section pt-4 clinics" v-if="clinics == null">
            <div class="row">
               <div class="col-12 text-center text-muted" style="font-size: 72px; font-family: Raleway">
                  No clinic found
               </div>
            </div>
         </section>

         <!-- PreLoader -->
         <section class="section pt-4 fetching" >
            <div class="row">
               <div class="preloader-wrapper big active crazy m-auto">
                  <div class="spinner-layer spinner-blue-only">
                     <div class="circle-clipper left">
                        <div class="circle"></div>
                     </div>
                     <div class="gap-patch">
                        <div class="circle"></div>
                     </div>
                     <div class="circle-clipper right">
                        <div class="circle"></div>
                     </div>
                  </div>
               </div>


            </div>
         </section>
         <!-- /PreLoader -->

      </div>
      <!-- /.Content -->

   </div>

@endsection

@push('scripts')
<script>
   const app = new Vue({
       el: '#app',
       data () {
           return {
               endpoint: '/api/clinics/search',
               clinics: {},
               links: {},
               pagination: {},
               search: {
                   region: '',
                   city: '',
                   keyword: '',
                   speciality: '',
                   degree: '',
                   orderBy: '',
                   sort: '',
                   rate: ''
               },
               filters: {!! $filters->toJson() !!},
               regionId:null,
               region: null,
               regionName: 'Choose City',
               cityId: null,
               cityName: 'Choose Area',
               mouseOver: false,
               user: {!! Auth::check() ? Auth::user()->load(['favoriteClinics']) : 'null' !!}
           }
       },
       methods: {
           favorites(val) {
               if(val.favorites !== null) {
                   return val.favorites.count;
               } else {
                   return 0;
               }
           },
           fetchClinics(){
               let vm = this;
               $('.clinics').hide();
               $('.fetching').show();
               axios.post(vm.endpoint, vm.search)
                   .then(function (response) {
                       $('.fetching').hide();
                       $('.clinics').show();
                       let data = response.data;
                       vm.clinics = data.data;
                       vm.links = data.links;
                       vm.pagination = data.meta;
                       vm.endpoint = data.meta.path + '?page=' + vm.pagination.current_page;
                   })
                   .catch((response) => {
                       console.log(response);
                   });
           },
           changeEndpoint(page) {
               let url = this.pagination.path + '?page=' + page;
               let clinicDiv = document.getElementById('clinics');
               clinicDiv.scrollIntoView();
               this.endpoint = url;

               return this.fetchClinics();
           },
           navigate(url){
               this.endpoint = url;
               return this.fetchClinics();
           },
           fetchFilter($key, $value){
               let vm = this;
               vm.search[$key] = $value;
               vm.endpoint = '/api/clinics/search';
               this.fetchClinics();
           },
           flush($filter){
               if ($filter === 'region') {
                   this.regionName = 'Choose City';
                   this.regionId = '';
               } else if($filter === 'city') {
                   this.cityName = 'Choose Area';
                   this.cityId = '';
               }
               this.fetchFilter($filter, '')
           },
           FilterOrderBy($order, $sort) {
               let vm = this;
               this.search.orderBy = $order;
               this.search.sort = $sort;
               vm.endpoint = '/api/clinics/search';
               this.fetchClinics();
           },
           searchByKeyword: _.debounce(function () {
               this.endpoint = '/api/clinics/search';
               this.fetchClinics()
           }, 500),
           floor(rate) {
               return parseInt(Math.floor(rate));
           },
           ceil(rate) {
               return parseInt(Math.ceil(rate));
           },
           round(rate) {
               return parseInt(Math.round(rate));
           },
           starColor(n, rate) {
               if (n <= this.floor(rate)) {
                   return 'fa fa-star cyan-text'
               } else if (n === this.ceil(rate)) {
                   return 'fa fa-star-half-full cyan-text'
               } else {
                   return 'fa fa-star-o cyan-text'
               }
           },
           filterByRate: _.debounce(function () {
               this.endpoint = '/api/clinics/search';
               this.fetchClinics()
           }, 100),
           isFav(id) {
               @if(Auth::check())
                   let favorites = this.user.favorite_clinics;
                   if(favorites.length) {
                   for(let i = 0; i < favorites.length; i++ ){
                       if(favorites[i].favourable_id === id) {
                           return true
                       }
                   }
               } else {
                   return false;
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
                   let user = this.user;
                   let clinics = this.clinics;
                   let favorites = this.user.favorite_clinics;
                   if (this.isFav(id)) {
                       for(let i = 0; i < favorites.length; i++ ){
                           if(favorites[i].favourable_id === id) {

                               favorites.splice(i, 1);
                           }
                       }

                       for(let i = 0; i < clinics.length; i++ ){
                           if(clinics[i].id === id) {

                               if(clinics[i].favorites !== null) {
                                   clinics[i].favorites.count--
                               }
                           }
                       }
                       axios.delete('/api/clinics/' + id + '/users/' + user.id + '/fav')
                           .then(function (res) {

                           })
                   } else {
                       favorites.push({
                           favourable_id: id,
                           user_id: user.id
                       });
                       for(let i = 0; i < clinics.length; i++ ){
                           if(clinics[i].id === id) {
                               if(clinics[i].favorites !== null) {
                                   clinics[i].favorites.count++
                               } else {
                                   clinics[i].favorites = { count: 1 };
                               }
                           }
                       }
                       axios.post('/api/clinics/' + id + '/users/' + user.id + '/fav')
                           .then(function (res) {

                           })
                   }
               } else {
                   $('#elegantModalForm').modal('show');
               }
           }
       },
       mounted() {
           this.fetchClinics();
       },
       watch: {
           regionId: function (val) {
               this.search.city = '';
               this.search.region = val;
               let region = this.filters.regions.filter(function (region) { return region.id === val });
               this.region = region.shift();
               if(this.region) {
                   this.regionName = this.region.en_name;
               }
               this.cityName = 'Choose Area';
               this.endpoint = '/api/clinics/search';
               this.fetchClinics();
           },
           cityId: function (val) {
               this.search.city = val;
               let city = this.region.cities.filter(function (city) { return city.id === val }).shift();
               if(city) {
                   this.cityName = city.en_name;
               }
               this.endpoint = '/api/clinics/search';
               this.fetchClinics();
           },
       }
   });
</script>
@endpush