<template>
<section>
    <div class="container">
        <form v-on:submit.prevent="submitForm(edit_url)">
            <!--Section: Inputs-->
            <section class="section card mb-5">

                <div class="card-body">

                    <!--Section heading-->
                    <h1 class="text-center my-5 h1">Edit Job</h1>

                    <div class="container">

                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6 mb-4">

                                <div class="md-form">
                                    <i class="fas fa-tag prefix"></i>
                                    <input type="text" name="title" id="title" class="form-control" v-model="title" maxlength="30" required>
                                    <label for="title" class="">Title</label>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">

                                <div class="md-form">
                                    <i class="fas fa-tag prefix"></i>
                                    <input type="text" name="salary" id="salary" class="form-control" v-model="salary" maxlength="5" required>
                                    <label for="salary" class="">Salary</label>
                                </div>

                            </div>
                            <!--Grid column-->
                        </div>

                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <fieldset class="form-check mb-4 text-center" id="status">
                                    <div class="row pt-4">
                                        <div class="form-group col-md-6">
                                            <input class="form-check-input" name="jobTypeId" type="radio" id="employer" value="1" v-model="jobTypeId" checked="checked">
                                            <label class="form-check-label" for="employer">Employer</label>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input class="form-check-input" name="jobTypeId" type="radio" id="jobSeeker" value="2" v-model="jobTypeId">
                                            <label class="form-check-label" for="jobSeeker">Job Seeker</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">

                                <!--Basic textarea-->
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix"></i>
                                    <textarea type="text" id="description" name="description" class="md-textarea form-control" rows="3" v-model="description" required></textarea>
                                    <label for="description" class="">Description</label>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>

                        <div class="row">
                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <!--Name-->
                                <div class="form-group">
                                    <label for="city"></label>
                                    <select class="form-control custom-select-lg" name="regionId" v-model="regionId" id="city" required>
                                        <option value="101" selected disabled>Choose City</option>
                                        <option :value="region.id" v-for="region in regions">{{ region.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">

                                <!--Name-->
                                <div class="form-group">
                                    <label for="area"></label>
                                    <select class="form-control custom-select-lg" name="cityId" v-model="cityId" id="area" required>
                                        <option value="101" selected disabled>Choose Area</option>
                                        <option :value="city.id" v-for="city in cities">{{ city.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-6 col-md-12">
                                <div class="md-form">
                                    <input id="input-char-counter" type="text" name="address" maxlength="60" class="form-control" v-model="address" required>
                                    <label for="input-char-counter">Address</label>
                                    <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="category"></label>
                                    <select class="form-control custom-select-lg" name="categoryId" v-model="categoryId" id="category" required>
                                        <option value="101" selected disabled>Choose Category</option>
                                        <option :value="category.id" v-for="category in categories">{{ category.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="experienceLevel"></label>
                                    <select class="form-control custom-select-lg" name="experienceLevelId" v-model="experienceLevelId" id="experienceLevel" required>
                                        <option value="101" selected disabled>Experience Level</option>
                                        <option :value="experienceLevel.id" v-for="experienceLevel in experienceLevels">{{ experienceLevel.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="educationLevel"></label>
                                    <select class="form-control custom-select-lg" name="educationLevelId" v-model="educationLevelId" id="educationLevel" required>
                                        <option value="101" selected disabled>Education Level</option>
                                        <option :value="educationLevel.id" v-for="educationLevel in educationLevels">{{ educationLevel.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="employmentType"></label>
                                    <select class="form-control custom-select-lg" name="employmentTypeId" v-model="employmentTypeId" id="employmentType" required>
                                        <option value="101" selected disabled>Employment Type</option>
                                        <option :value="employmentType.id" v-for="employmentType in employmentTypes">{{ employmentType.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->



                        </div>

                        <div class="row">



                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                    <ul class="phone-input list-unstyled mb-2">
                                        <li class="ml-2 mb-2">
                                            <div class="md-form input-group pl-0 mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="number" class="form-control py-0" v-model="phone" name="phones" placeholder="Phone" maxlength="15" aria-describedby="basic-addon1">
                                                    <span v-if="errors.phones" class="invalid-feedback">
                                                        <strong>{{ errors.phones[0] }}</strong>
                                                    </span>
                                            </div>
                                        </li>
                                    </ul>
                                <button type="button" class="btn btn-success btn-sm btn-add-phone" @click.prevent="addPhone"><span class="fas fa-plus-plus"></span> Add Phone</button>
                                <button type="button" class="btn btn-danger btn-sm btn-add-phone" @click.prevent="removePhone"><span class="fas fa-plus-plus"></span> Remove Phone</button>
                                <br><br>
                                <div class="col-md-8 btn btn-info btn-lg btn-block btn-add-phone" v-for="phone in phones" :key="phone.id" required>{{phone}}</div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-4">

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                                            <span>Choose file</span>
                                            <input type="file" name="img" @change="uploadImage($event)">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload job image">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--Grid column-->
                            <!--Grid column-->


                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="waves-input-wrapper waves-effect waves-light float-right mt-2">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </section>
            <!--Section: Inputs-->
        </form>
        <div class="row">
            
        </div>
    </div>



    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="sideModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Success</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div v-if="session" class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>{{ session.success }}</p>
                    </div>
                </div>


            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->
    </section>
</template>
<script>
    export default{
        props:['job_regions', 'job_categories', 'job_regions', 'job_experiencelevels', 'job_educationlevels', 'job_employmenttypes', 'jobad'],
        data() {
            return {
                regions: this.job_regions,
                categories: this.job_categories,
                experienceLevels: this.job_experiencelevels,
                educationLevels: this.job_educationlevels,
                employmentTypes: this.job_employmenttypes,
                title: this.jobad.title,
                description: this.jobad.description,
                salary: this.jobad.salary,
                categoryId: this.jobad.job_ad_category_id,
                jobTypeId: this.jobad.job_type_id,
                experienceLevelId: this.jobad.job_experience_level_id,
                educationLevelId: this.jobad.job_education_level_id,
                employmentTypeId: this.jobad.job_employment_type_id,
                regionId: this.jobad.region_id,
                cityId: this.jobad.city_id,
                address: this.jobad.address,
                cities: null,
                errors: [],
                img: null,
                phone: "",
                phones: [],
                selected: null,
                session: null,
                id: this.jobad.id,
            }
        },
        created(){
            let phones_array = Object.values(this.jobad.phone_numbers);
            let vm = this;
            phones_array.forEach(function(value) {
                vm.phones.push(value.number);
            });
        },
        methods: {
            uploadImage(event) {
                this.img = event.target.files[0]
            },
            checkForm() {
                this.errors = [];
                if(!this.title) {
                    this.errors.push("Title Required")
                }
                if(!this.description) {
                    this.errors.push("Description Required")
                }
                if(!this.price) {
                    this.errors.push("Price Required")
                }
                if(!this.address) {
                    this.errors.push("Address Required")
                }
                if(!this.img) {
                    this.errors.push("Image Required")
                }
                if(!this.regionId) {
                    this.errors.push("City Required")
                }
                if(!this.cityId) {
                    this.errors.push("Area Required")
                }
            },
            submitForm(edit_url) {
                this.checkForm();
                if(true){
                    let vm = this;
                    let formData = new FormData();
                    formData.append("img", this.img);
                    formData.append("title", this.title);
                    formData.append("description", this.description);
                    formData.append("salary", this.salary);
                    formData.append("regionId", this.regionId);
                    formData.append("cityId", this.cityId);
                    formData.append("address", this.address);
                    formData.append("status", this.jobTypeId);
                    formData.append("jobTypeId", this.jobTypeId);
                    formData.append("experienceLevelId", this.experienceLevelId);
                    formData.append("educationLevelId", this.educationLevelId);
                    formData.append("employmentTypeId", this.employmentTypeId);
                    formData.append("categoryId", this.categoryId);
                    formData.append("phones", this.phones);
                    formData.append("_method", "PUT");
                    axios.post(edit_url, formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(function (res) {
                            vm.session = res.data;
                        }).catch(function(err) {
                            vm.errors = err.response.data.errors;
                        });
                } else {

                }
            },
            addPhone() {
                if(this.phone){
                    this.phones.push(this.phone);
                    this.phone = '';
                }
            },
            removePhone() {
                if(this.phones.length > 1){
                    this.phones.pop();
                }
            },
        },
        watch: {
            regionId: function (val) {
                let region = this.regions.filter(function (region) { return region.id === val });
                region = region.shift();
                //this.cityId = 101;
                this.cities = region.cities
            },
            session: function(val){
                if(val.success){
                    $('#sideModalSuccess').modal('show');
                }
            }
        },
        mounted() {
            let val = this.regionId;
            let region = this.regions.filter(function (region) { return region.id === val });
            region = region.shift();
            this.cities = region.cities
        },
        computed:{
            edit_url(){
                return '/job-ads/'+ this.id + '/edit';
            }
        }
    };
</script>