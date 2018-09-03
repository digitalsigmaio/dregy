<template>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Job List <small>review</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <p>Pending jobs for review</p>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Title</th>
                            <th class="column-title" style="display: table-cell;">User</th>
                            <th class="column-title" style="display: table-cell;">Created</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="even pointer" :class="'job-' + job.id" v-for="job in jobs">
                            <td class="">{{ job.title }}</td>
                            <td class="">{{ job.user_email }}</td>
                            <td class="">{{ job.created_at }}</td>
                            <td class=""><a :href="'/admin/pending-jobs/' + job.id" class="btn btn-info" :class="'job-' + job.id + '-btn'">{{ status(job.id) }}</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['joblist'],
        data() {
            return {
                jobs: this.joblist,
                reviewing: []
            }
        },
        computed: {
        },
        methods: {
            underReview(id) {
                this.reviewing.push(id);
                let jobDiv = '.job-' + id;
                let div = $(jobDiv);
                div.addClass('warning');
                let button = $(jobDiv + '-btn');
                button.addClass('btn-warning disabled');
            },
            logIndex(id) {
                let index = this.jobs.filter(function(job) {
                    return job.id === id;
                });
                let job = this.jobs.indexOf(index[0]);
                this.jobs.splice(job, 1)
            },
            status(id) {
                if(this.reviewing.includes(id)) {
                    return 'Under review'
                } else {
                    return 'Review'
                }
            }
        },
        mounted() {
        Echo.private(`review-job`)
            .listen('ReviewJob', (e) => {
                console.log(e.job_id);
                this.underReview(e.job_id);
            });
        }
    }
</script>