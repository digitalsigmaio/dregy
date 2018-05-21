@extends('client.home')

@section('userContent')


    <div class="container">
        <form action="/job-ads/{{$jobAd->id}}/edit" method="post" enctype="multipart/form-data">
            <!--Section: Inputs-->
            @csrf
            @method('PUT')
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
                                        <option :value="region.id" v-for="region in regions">@{{ region.en_name }}</option>
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
                                        <option :value="city.id" v-for="city in cities">@{{ city.en_name }}</option>
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
                                        <option :value="category.id" v-for="category in categories">@{{ category.en_name }}</option>
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
                                        <option :value="experienceLevel.id" v-for="experienceLevel in experienceLevels">@{{ experienceLevel.en_name }}</option>
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
                                        <option :value="educationLevel.id" v-for="educationLevel in educationLevels">@{{ educationLevel.en_name }}</option>
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
                                        <option :value="employmentType.id" v-for="employmentType in employmentTypes">@{{ employmentType.en_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->



                        </div>

                        <div class="row">



                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                @foreach($jobAd->phoneNumbers as $phone)
                                    <div class="phone-input ml-2 mb-2">
                                        <div class="md-form input-group pl-0 mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="tel" class="form-control py-0" maxlength="15" name="phone[{{$phone->id}}]" placeholder="Phone" value="{{$phone->number}}" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                @endforeach
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
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
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
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>@if(session('success'))
                                {{ session()->get('success') }}
                            @endif.</p>
                    </div>
                </div>


            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->



@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                regions: {!! $regions !!},
                categories: {!! $categories !!},
                experienceLevels: {!! $experienceLevels !!},
                educationLevels: {!! $educationLevels !!},
                employmentTypes: {!! $employmentTypes !!},
                cities: null,
                errors: [],
                title: '{!! $jobAd->title !!}',
                description: '{!! $jobAd->description !!}',
                salary: '{!! $jobAd->salary !!}',
                categoryId: {!! $jobAd->job_ad_category_id !!},
                jobTypeId: {!! $jobAd->job_type_id !!},
                experienceLevelId: {!! $jobAd->job_experience_level_id !!},
                educationLevelId: {!! $jobAd->job_education_level_id !!},
                employmentTypeId: {!! $jobAd->job_employment_type_id !!},
                regionId: {!! $jobAd->region_id !!},
                cityId: {!! $jobAd->city_id !!},
                address: '{!! $jobAd->address !!}',
                img: null
            }
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
            submitForm() {
                this.checkForm();
                if(!this.errors.length){
                    axios.post('/api/job-ads', {
                        title: this.title,
                        description: this.description,
                        price: this.price,
                        regionId: this.regionId,
                        cityId: this.cityId,
                        address: this.address,
                        img: this.img,
                        status: this.status,
                        categoryId: this.categoryId
                    },{
                        headers: {
                            'Content-Type': undefined
                        }
                    })
                        .then(function (res) {
                            console.log(res.data)
                        })
                } else {
                    console.log(this.errors)
                }
            },
            addPhone() {
                $('.phone-input').append("<div class='md-form input-group pl-0 second-phone'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon2'><i class='fas fa-phone'></i></span></div>" +
                    "<input type='tel' class='form-control py-0' maxlength='15' name='phone[]' placeholder='Phone' aria-describedby='basic-addon2'>" +
                    "<div class='input-group-append' ><a><span class='input-group-text badge-danger remove-phone'><i class='fas fa-times'></i></span></a></div></div>");
                $('.btn-add-phone').prop('disabled', true);
            },
        },
        watch: {
            regionId: function (val) {

                let region = this.regions.filter(function (region) { return region.id === val });
                region = region.shift();
                this.cityId = 101;
                this.cities = region.cities
            }
        },
        mounted() {
            let val = this.regionId;
            let region = this.regions.filter(function (region) { return region.id === val });
            region = region.shift();
            this.cities = region.cities
        }
    });
    $(document.body).on('click', '.remove-phone' ,function(){
        $(this).closest('.second-phone').remove();
        $('.btn-add-phone').prop('disabled', false);
    });
    @if(session('success'))
        $('#sideModalSuccess').modal('show');
    @endif
</script>
@endpush