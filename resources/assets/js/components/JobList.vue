<template>
<div id="jobList">
    <h2 class="blue-grey-text">My Jobs</h2>
    <section  class="mt-5">
            <div v-if="jobs.count()" class="col-md-8 card">

                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Title</th>
                            <th>Views</th>
                            <th>Favorites</th>
                            <th width="100px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(job, index) in jobs">
                                <th scope="row">{{ index }}</th>
                                <td>{{ job.title }}</td>
                                <td>{{ job.views ? job.views.count : '0' }}</td>
                                <td>{{ job.favorites ? $ob.favorites.count : '0    '}}</td>
                                <td>
                                    <a class="blue-text pr-2" data-toggle="tooltip" data-placement="top" title="View" @click.prevent="show(job.id)"><i class="fa fa-user"></i></a>
                                    <a class="teal-text pr-2" data-toggle="tooltip" data-placement="top" title="Edit" :href="edit_link"><i class="fa fa-pencil"></i></a>
                                    <a class="red-text pr-2 delete" data-toggle="tooltip" data-placement="top" title="Remove" :href="delete_link"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        

                        </tbody>
                    </table>
                </div>
            </div>
        
            <div v-else class="row p-3 rgba-grey-light">
                <h1 class="white-text m-auto">You have no job listed yet</h1>
            </div>

        <!-- Modal: modalQuickView -->
        <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="jobDetails" aria-hidden="true" v-if="job">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <!--Carousel Wrapper-->
                                <img :src="job.img" class="img-fluid" alt="">
                                <!--/.Carousel Wrapper-->
                            </div>
                            <div class="col-lg-7">
                                <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                                    <strong>{{ job.title }}</strong>
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                            <span class="badge mb-2 p-2 " :class="{ 'blue-gradient': job.type.en_name == 'Employer', 'aqua-gradient' : job.type.en_name == 'Job Seeker' }">
                                {{ job.type.en_name }}</span>
                                    </div>
                                </div>

                                <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4" v-if="job.salary">
                    <span class="red-text font-weight-bold">
                        <strong>{{ job.salary }} L.E</strong>
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
                                                <p>{{ job.description }}</p>
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
                                                <p>{{ job.region.en_name }}, {{ job.city.en_name }}, {{ job.address }}</p>
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
                                                <p v-for="phone in job.phone"><i class="fa fa-phone pr-2 blue-text"></i>{{ phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-ecommerce">
                                        <div class="card-header pl-0" role="tab" id="headingThree">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#requirements" aria-expanded="false" aria-controls="collapseThree">
                                                <h5 class="mb-0">
                                                    More Info
                                                    <i class="fa fa-angle-down rotate-icon"></i>
                                                </h5>
                                            </a>
                                        </div>
                                        <div id="requirements" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="dark-grey-text pl-0">

                                                <p v-if="job.experience_level"><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Experience Level: </strong>{{ job.experience_level.en_name }}</p>



                                                <p v-if="job.education_level"><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Education Level: </strong>{{ job.education_level.en_name }}</p>



                                                <p v-if="job.employment_type"><i class="fa fa-arrow-right pr-2 blue-text"></i><strong>Employment Type: </strong>{{ job.employment_type.en_name }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Accordion wrapper-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal: modalQuickView -->

    </section>
</div>
</template>
<script>
    export default{
        props:['jobs'],
        data() {
            return {
                job: null,
            }
        },
        methods: {
            show(id) {
                this.job = this.jobs.filter(function (job) { return job.id === id }).shift();
                $('#modalQuickView').modal('show');
            }
        },
        mounted() {
            this.job = this.jobs[0];
        },
        computed: {
            edit_link() {
                return '/job-ads/' + this.job.id +'edit';
            },
            delete_link() {
                return '/job-ads/' + this.job.id +'delete';
            }
        }
    };
    $('.delete').on('click', function () {
        return confirm('Are you sure?');
    })
</script>