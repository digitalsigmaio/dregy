@extends('layouts.client')

@section('content')

    <div class="container-fluid mt-5">

        <form action="/product-ads" method="post" enctype="multipart/form-data">
            <!--Section: Inputs-->
            @csrf
            <section class="section card mb-5" style="margin-top: 100px">

                <div class="card-body">

                    <!--Section heading-->
                    <h1 class="text-center my-5 h1">New Product</h1>

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-4 mb-4">

                            <div class="md-form">
                                <i class="fas fa-tag prefix"></i>
                                <input type="text" name="title" id="title" class="form-control" v-model="title" required>
                                <label for="title" class="">Title</label>
                            </div>

                        </div>
                        <!--Grid column-->



                        <!--Grid column-->
                        <div class="col-md-4 mb-4">

                            <div class="md-form">
                                <i class="fas fa-money-bill-alt prefix"></i>
                                <input type="text" name="price" id="price" class="form-control" v-model="price" required>
                                <label for="price" class="">Price</label>
                            </div>

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row text-left">

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
                    <!--Grid row-->



                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <h2>Status</h2>
                            <fieldset class="form-check mb-4" id="status">
                                <div class="form-group">
                                    <input class="form-check-input" name="status" type="radio" id="new" value="1" v-model="status" checked="checked">
                                    <label class="form-check-label" for="new">New</label>
                                </div>

                                <div class="form-group">
                                    <input class="form-check-input" name="status" type="radio" id="used" value="2" v-model="status">
                                    <label class="form-check-label" for="used">Used</label>
                                </div>
                            </fieldset>


                        </div>
                        <!--Grid column-->


                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <h2>Category</h2>
                            <fieldset id="category">
                                <!--Radio group-->
                                <div class="form-group mb-1" v-for="category in categories">
                                    <input name="categoryId" type="radio" :id="'category' + category.id" :value="category.id"
                                           v-model="categoryId">
                                    <label :for="'category' + category.id" class="dark-grey-text">@{{ category.en_name }}</label>
                                </div>
                                <!--Radio group-->
                            </fieldset>

                        </div>
                        <!--Grid column-->


                    </div>
                    <!--Grid row-->


                    <!--Grid row-->
                    <div class="row mb-5">
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
                                <input id="input-char-counter" type="text" name="address" length="10" class="form-control" v-model="address" required>
                                <label for="input-char-counter">Address</label>
                                <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6 mb-4">

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                                            <span>Choose file</span>
                                            <input type="file" name="img" @change="uploadImage($event)" required>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload product image">
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!--Grid column-->

                        <div class="col-md-6 mb-4">
                            <div class="waves-input-wrapper waves-effect waves-light float-right">
                                <input type="submit" value="Add Product" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->


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



    </div>

@endsection

@push('scripts')
<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                regions: {!! $regions !!},
                categories: {!! $categories !!},
                cities: null,
                errors: [],
                title: null,
                description: null,
                price: null,
                categoryId: 1,
                status: 1,
                regionId: 101,
                cityId: 101,
                address: null,
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
                    axios.post('/api/product-ads', {
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
            }
        },
        watch: {
            regionId: function (val) {

                let region = this.regions.filter(function (region) { return region.id === val });
                region = region.shift();
                this.cityId = 101;
                this.cities = region.cities
            }
        }
    });

    @if(session('success'))
        $('#sideModalSuccess').modal('show');
    @endif
</script>
@endpush