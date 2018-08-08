<template>
<div class="row" id="mainJobs" v-cloak>
    <!-- New Jobs-->
    <div class="col-lg-4 col-md-12 col-12 pt-5">
        <hr>
        <h5 class="text-center font-weight-bold dark-grey-text">
            <strong>{{ words_jobs_new }}</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in newJobs">

            <div class="col-6">
                <a :href="'/jobs/' + job.id + '/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/jobs/' + job.id + '/' + job.slug">
                    <strong>{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.category) }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.region) }}, {{ name(job.city) }}</strong>
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
            <strong>{{ words_jobs_popular }}</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in hotJobs">

            <div class="col-6">
                <a :href="'/jobs/' + job.id + '/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/jobs/' + job.id + '/' + job.slug">
                    <strong>{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.category) }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.region) }}, {{ name(job.city) }}</strong>
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
            <strong>{{ words_jobs_random }}</strong>
        </h5>
        <hr class="mb-5">
        <!-- First row -->
        <div class="row py-2 mb-4 hoverable align-items-center" v-for="job in randomJobs">

            <div class="col-6">
                <a :href="'/jobs/' + job.id + '/' + job.slug">
                    <img :src="job.img" class="img-fluid">
                </a>
            </div>
            <div class="col-6">

                <!-- Title -->
                <a class="pt-5 dark-grey-text" :href="'/jobs/' + job.id + '/' + job.slug">
                    <strong>{{ job.title }}</strong>
                </a>

                <!-- Category -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.category) }}</strong>
                </h6>

                <!-- Address -->
                <h6 class="h6-responsive font-weight-bold grey-text">
                    <strong>{{ name(job.region) }}, {{ name(job.city) }}</strong>
                </h6>

            </div>

        </div>
        <!-- /.First row -->

    </div>
    <!-- /.Random Jobs -->
</div>
</template>

<script>
    export default{
        props: ['lang', 'words_jobs_new', 'words_jobs_popular', 'words_jobs_random'],
        data() {
            return {
                newJobs: {},
                hotJobs: {},
                randomJobs: {}
            }
        },
        methods: {
            backgroundImg(src) {
                return "background-image: url('" + src + "')";
            },
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
            },
            // language transformers
            transformer(property, attribute) {

                let key;
                switch (this.lang) {
                    case 'ar':
                        key = 'ar_' + attribute;
                        return property[key];
                        break;
                    case 'en':
                        key = 'en_' + attribute;
                        return property[key];
                        break;
                    default:
                        return null;
                        break;
                }
            },
            name(property){
                return this.transformer(property, 'name')
            },
            address(property) {
                return this.transformer(property, 'address')
            },
            note(property) {
                return this.transformer(property, 'note')
            }
        },
        mounted() {
            this.fetchJobs()
        }
    };
</script>