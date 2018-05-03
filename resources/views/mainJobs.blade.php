<div class="row" id="mainJobs" v-cloak>
    <!-- New Jobs-->
    <div class="col-lg-4 col-md-12 col-12 pt-5">
        <hr>
        <h5 class="text-center font-weight-bold dark-grey-text">
            <strong>New Jobs</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in newJobs">

            <div class="col-6">
                <a :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <strong>@{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.category.en_name }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.region.en_name }}, @{{ job.city.en_name }}</strong>
                </h6>

            </div>

        </div>
        <!-- /.First row -->

    </div>
    <!-- /.New Jobs-->

    <!-- Hot Jobs -->
    <div class="col-lg-4 col-md-12 col-12 pt-5">
        <hr>
        <h5 class="text-center font-weight-bold dark-grey-text">
            <strong>Hot Jobs</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in hotJobs">

            <div class="col-6">
                <a :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <strong>@{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.category.en_name }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.region.en_name }}, @{{ job.city.en_name }}</strong>
                </h6>

            </div>

        </div>
        <!-- /.First row -->

    </div>
    <!-- /.Hot Jobs -->

    <!-- Random Jobs-->
    <div class="col-lg-4 col-md-12 col-12 pt-5">
        <hr>
        <h5 class="text-center font-weight-bold dark-grey-text">
            <strong>Random Jobs</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in randomJobs">

            <div class="col-6">
                <a :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/u/'+ job.user_id + '/jobs/' + job.slug">
                    <strong>@{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.category.en_name }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>@{{ job.region.en_name }}, @{{ job.city.en_name }}</strong>
                </h6>

            </div>

        </div>
        <!-- /.First row -->

    </div>
    <!-- /.Random Jobs -->
</div>

@push('scripts')
<script>
    const mainJobs = new Vue({
        el: '#mainJobs',
        data() {
            return {
                newJobs: {},
                hotJobs: {},
                randomJobs: {}
            }
        },
        methods: {
            fetchJobs() {
                let vm = this;
                axios.get('/api/job-list')
                    .then(function (response) {
                        let res = response.data;
                        vm.newJobs = res.newJobs;
                        vm.hotJobs = res.hotJobs;
                        vm.randomJobs = res.randomJobs;
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
            }
        },
        mounted() {
            this.fetchJobs()
        }
    });
</script>
@endpush