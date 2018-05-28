@extends('layouts.client')

@section('content')



        <div class="container">
            <form action="/product-ads" method="post" enctype="multipart/form-data">
                <!--Section: Inputs-->
                @csrf
                <section class="section card mb-5">

                    <div class="card-body">

                        <!--Section heading-->
                        <h1 class="text-center my-5 h1">New Product</h1>

                        <div class="container">

                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-6 mb-4">

                                    <div class="md-form">
                                        <i class="fas fa-tag prefix"></i>
                                        <input type="text" name="title" id="title" class="form-control" maxlength="30" required>
                                        <label for="title" class="">Title</label>
                                    </div>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--Grid column-->



                                <!--Grid column-->
                                <div class="col-md-6 mb-4">

                                    <div class="md-form">
                                        <i class="fas fa-tag prefix"></i>
                                        <input type="number" name="price" id="price" class="form-control" maxlength="6" required>
                                        <label for="price" class="">Price</label>
                                    </div>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <!--Grid column-->
                            </div>

                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12 mb-4">

                                    <!--Basic textarea-->
                                    <div class="md-form">
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea type="text" id="description" name="description" class="md-textarea form-control" rows="3" required></textarea>
                                        <label for="description" class="">Description</label>
                                    </div>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif

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
                                        @if ($errors->has('regionId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
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

                                        @if ($errors->has('cityId'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cityId') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-6 col-md-12">
                                    <div class="md-form">
                                        <input id="input-char-counter" type="text" name="address" maxlength="60" class="form-control"  required>
                                        <label for="input-char-counter">Address</label>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif


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

                                        @if ($errors->has('categoryId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('categoryId') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">

                                    <div class="md-form">
                                        <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                                                <span>Choose Image</span>
                                                <input type="file" name="img" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"  placeholder="Upload product image">
                                            </div>
                                        </div>

                                        @if ($errors->has('img'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>

                            <div class="row">



                                <!--Grid column-->
                                <div class="col-md-6 mb-4">
                                    <div class="phone-input ml-2 mb-2">
                                        <div class="md-form input-group pl-0 mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="tel" class="form-control py-0" name="phone[]" placeholder="Phone" maxlength="15" aria-describedby="basic-addon1" required>

                                            @if ($errors->has('phone.*'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('phone.*') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm btn-add-phone" @click.prevent="addPhone"><span class="fas fa-plus-plus"></span> Add Phone</button>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">
                                    <fieldset class="form-check mb-4 text-center" id="status">
                                        <div class="row pt-4">
                                            <div class="form-group col-md-3 col-md-offset-3">
                                                <input class="form-check-input" name="status" type="radio" id="new" value="1" v-model="status" checked="checked">
                                                <label class="form-check-label" for="new">New</label>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <input class="form-check-input" name="status" type="radio" id="used" value="2" v-model="status">
                                                <label class="form-check-label" for="used">Used</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <!--Grid column-->
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="waves-input-wrapper waves-effect waves-light float-right mt-2">
                                        <input type="submit" value="Add Product" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </section>
                <!--Section: Inputs-->
            </form>

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
                regions: {!! $regions !!} ,
                categories: {!! $categories !!} ,
                cities: null,
                errors: [],
                categoryId: 101,
                status: 1,
                regionId: 101,
                cityId: 101,

            }
        },
        methods: {
            addPhone() {
                $('.phone-input').append("<div class='md-form input-group pl-0 second-phone'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon2'><i class='fas fa-phone'></i></span></div>" +
                    "<input type='tel' class='form-control py-0' name='phone[]' placeholder='Phone' aria-describedby='basic-addon2'>" +
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
            },
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