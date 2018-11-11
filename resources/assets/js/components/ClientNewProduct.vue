<template>
<section>
        <div class="container">
            <form  v-on:submit.prevent="submit">
                <!--Section: Inputs-->
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
                                        <input type="text" v-model="data.title" name="title" id="title" class="form-control" maxlength="30" required>
                                        <label for="title" class="">Title</label>
                                    </div>

                                        <span v-if="errors.title" class="invalid-feedback">
                                            <strong>{{ errors.title[0] }}</strong>
                                        </span>
                                   
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">

                                    <div class="md-form">
                                        <i class="fas fa-tag prefix"></i>
                                        <input type="number" v-model="data.price" name="price" id="price" class="form-control" maxlength="6" required>
                                        <label for="price" class="">Price</label>
                                    </div>

                                        <span v-if="errors.price" class="invalid-feedback">
                                            <strong>{{ errors.price[0] }}</strong>
                                        </span>

                                </div>
                                <!--Grid column-->
                            </div>

                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12 mb-4">

                                    <!--Basic textarea-->
                                    <div class="md-form">
                                        <i class="fas fa-pencil-alt prefix"></i>
                                        <textarea type="text" id="description" v-model="data.description" name="description" class="md-textarea form-control" rows="3" required></textarea>
                                        <label for="description" class="">Description</label>
                                    </div>

                                        <span v-if="errors.description" class="invalid-feedback">
                                            <strong>{{ errors.description[0] }}</strong>
                                        </span>

                                </div>
                                <!--Grid column-->
                            </div>

                            <div class="row">
                                <!--Grid column-->
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <!--Name-->
                                    <div class="form-group">
                                        <label for="city"></label>
                                        <select class="form-control custom-select-lg" name="regionId" v-model="data.regionId" id="city" required>
                                            <option value="101" selected disabled>Choose City</option>
                                            <option :value="region.id" v-for="region in regions">{{ region.en_name }}</option>
                                        </select>
                                        
                                            <span v-if="errors.regionId" class="invalid-feedback">
                                                <strong>{{ errors.regionId[0] }}</strong>
                                            </span>
                                        
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-3 col-md-6 mb-4">

                                    <!--Name-->
                                    <div class="form-group">
                                        <label for="area"></label>
                                        <select class="form-control custom-select-lg" name="cityId" v-model="data.cityId" id="area" required>
                                            <option value="101" disabled>Choose Area</option>
                                            <option v-for="city in cities" :value="city.id" >{{ city.en_name }}</option>
                                        </select>

                                            <span v-if="errors.cityId" class="invalid-feedback">
                                            <strong>{{ errors.cityId[0] }}</strong>
                                        </span>

                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-lg-6 col-md-12">
                                    <div class="md-form">
                                        <input id="input-char-counter" type="text" v-model="data.address" name="address" maxlength="60" class="form-control"  required>
                                        <label for="input-char-counter">Address</label>
                                        
                                            <span v-if="errors.address" class="invalid-feedback">
                                                <strong>{{ errors.address[0] }}</strong>
                                            </span>

                                    </div>
                                </div>
                                <!--Grid column-->
                            </div>

                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="category"></label>
                                        <select class="form-control custom-select-lg" name="categoryId" v-model="data.categoryId" id="category" required>
                                            <option value="101" selected disabled>Choose Category</option>
                                            <option :value="category.id" v-for="category in categories">{{ category.en_name }}</option>
                                        </select>
                                            <span v-if="errors.categoryId" class="invalid-feedback">
                                                <strong>{{ errors.categoryId[0] }}</strong>
                                            </span>
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">

                                    <div class="md-form">
                                        <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                                                <span>Choose Image</span>
                                                <input id="file" type="file" name="img" @change="handleFileUpload()" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"  placeholder="Upload product image">
                                            </div>
                                        </div>

                                            <span v-if="errors.img" class="invalid-feedback">
                                                <strong>{{ errors.img[0] }}</strong>
                                            </span>
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
                                                    <input type="tel" class="form-control py-0" v-model="phone" name="phones" placeholder="Phone" maxlength="15" aria-describedby="basic-addon1">
                                                        <span v-if="errors.phones" class="invalid-feedback">
                                                            <strong>{{ errors.phones[0] }}</strong>
                                                        </span>
                                                </div>
                                            </li>
                                        </ul>
                                    <button type="button" class="btn btn-success btn-sm btn-add-phone" @click.prevent="addPhone"><span class="fas fa-plus-plus"></span> Add Phone</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-add-phone" @click.prevent="removePhone"><span class="fas fa-plus-plus"></span> Remove Phone</button>
                                    <br><br>
                                    <div class="col-md-8 btn btn-info btn-lg btn-block btn-add-phone" v-for="phone in data.phones" required>{{phone}}</div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-4">
                                    <fieldset class="form-check mb-4 text-center" id="status">
                                        <div class="row pt-4">
                                            <div class="form-group col-md-3 col-md-offset-3">
                                                <input class="form-check-input" name="status" type="radio" id="new" value="1" v-model="data.status" checked="checked">
                                                <label class="form-check-label" for="new">New</label>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <input class="form-check-input" name="status" type="radio" id="used" value="2" v-model="data.status">
                                                <label class="form-check-label" for="used">Used</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="col-md-12 mb-4">
                                        <div class="waves-input-wrapper waves-effect waves-light float-right mt-2">
                                            <input type="submit" value="Add Product" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <!--Grid column-->
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
                    <div v-if="session" class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                            <p>
                                {{ session.success }}
                                .</p>
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
        props:['product_regions', 'product_categories'],
        data() {
            return {
                regions: this.product_regions,
                categories: this.product_categories,
                cities: null,
                data:{
                    title:'',
                    price:'',
                    description:'',
                    regionId: 101,
                    cityId: 101,
                    address:'',
                    phones:[],
                    categoryId: 101,
                    status: 1,
                },
                file: '',
                errors:[],
                session:'',
                phone:'',
            }
        },
        methods: {
            addPhone() {
                this.data.phones.push(this.phone);
                this.phone = '';
            },
            removePhone() {
                if(this.data.phones.length > 1){
                    this.data.phones.pop();
                }
            },
            sessionCheck(){
                if(session){
                    $('#sideModalSuccess').modal('show');
                }
            },
            phonee(){
                $(document.body).on('click', '.remove-phone' ,function(){
                    $(this).closest('.second-phone').remove();
                    $('.btn-add-phone').prop('disabled', false);
                });
            },
            submit(){
                let formData = new FormData();
                formData.append('img', this.file);
                let formKeys = Object.getOwnPropertyNames(this.data); 
                let formValues = Object.values(this.data);
                let i = 0;
                formKeys.forEach(function(key){
                    formData.append(key, formValues[i] )
                    i++;
                });
                let vm = this;
                axios.post('/product-ads', 
                    formData,
                    {
                        headers:{
                            'Content-Type': 'multipart/form-data'
                        }
                    },
                ).then(function (res){
                    vm.session = res.data;

                }).catch(function (err) {
                    vm.errors = err.response.data.errors;
                });
                
            },
            handleFileUpload(){
                this.file = document.getElementById('file').files[0];
                
            },
        },
        watch: {
            data: {
                    handler:function (val) {
                        if(val.regionId !== 101){
                            //console.log(val.regionId)
                            let region = this.regions.filter(function (region) { return region.id === val.regionId });
                            region = region.shift();
                            this.cities = region.cities;
                            //this.data.cityId = 101;
                        }
                },
                deep: true
            },
            session: function (val){
                    if(val.success){
                    $('#sideModalSuccess').modal('show');
                    this.data
                    }
                }
        },
        created(){
            
        }
    };
</script>
