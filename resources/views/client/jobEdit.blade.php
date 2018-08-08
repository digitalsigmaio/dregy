@extends('client.home')

@section('userContent')

<job-edit
    :regions = "{{ $regions }}"
    :categories = "{{ $categories }}"
    :experienceLevels = "{{ $experienceLevels }}"
    :educationLevels = "{{ $educationLevels }}"
    :employmentTypes = "{{ $employmentTypes }}"
    :title = "{{ $jobAd->title }}"
    :description = "{{ $jobAd->description }}"
    :salary = "{{ $jobAd->salary }}"
    :categoryId = "{{ $jobAd->job_ad_category_id }}"
    :jobTypeId = "{{ $jobAd->job_type_id }}"
    :experienceLevelId = "{{ $jobAd->job_experience_level_id }}"
    :educationLevelId = "{{ $jobAd->job_education_level_id }}"
    :employmentTypeId = "{{ $jobAd->job_employment_type_id }}"
    :regionId = "{{ $jobAd->region_id }}"
    :cityId = "{{ $jobAd->city_id }}"
    :address = "{{ $jobAd->address }}"
    :phonenumber = "{{ $jobAd->phoneNumbers }}"
    :success = "{{ session('success') }}"
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

                        })
                } else {

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