<template>
 <div class="row">
        <div v-if="resultshow" class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
            <form method="" action="">
            <!--Form with header-->
            <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                    <!--Header-->
                    <div class="form-header sky-gradient">
                        <h3>Create A New User</h3>
                    </div>

                    <!--Body-->
                    <div class="md-form mt-5mb-5">
                        <i class="fa fa-user prefix white-text"></i>
                        <label for="orangeForm-name">User Name</label>
                        <input type="text" id="orangeForm-name" class="form-control" v-model="user.name"
                            required autofocus>
                        <div v-if="errors">
                            <span class="danger-color" v-if="errors.name">
                                <strong>{{ errors.name[0] }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="md-form mt-5 mb-5">
                        <i class="fa fa-envelope prefix white-text"></i>
                        <label for="orangeForm-email">Email</label>
                        <input type="text" id="orangeForm-email" class="form-control"  v-model="user.email"
                            required autofocus>
                        <div v-if="errors">
                            <span class="alert-danger" style="padding: 5px" v-if="errors.email">
                                <strong>{{ errors.email[0] }}</strong>
                            </span>
                        </div>
                    </div>

                        <div class="md-form mt-5">
                            <i class="fa fa-lock prefix white-text"></i>
                            <label for="orangeForm-pass">Password</label>
                            <input type="password" id="orangeForm-pass" class="form-control" v-model="user.password" disabled required>
                            <div v-if="errors">
                                <span class="alert-danger" style="padding: 5px" v-if="errors.password">
                                    <strong>{{ errors.password[0] }}</strong>
                                </span>
                            </div>
                            <button class="form-control btn btn-primary" type="reset" @click.prevent="genpassword" >Generate Password</button>
                        </div>

                    <div class="md-form mt-5">
                        <input @click.prevent="create()" type="submit" class="form-control btn-info">
                    </div>

                </div>
            </div>
            <!--/Form with header-->
            </form>

        </div>
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5" v-else>
                <div v-if="result" class="card">
                    <div class="card-header mb-5">
                    <h1><b>{{user.name}}</b></h1>
                    </div>
                    <div  class="card-body col-md-offset-2">
                        <label for="ref">Reference Id</label>
                        <h3 class="form-control" id="ref">{{result}}</h3>
                    </div>
                </div>
        </div>
</div>

 
</template>

<script>
export default{
    data() {
        return {
            user: {
                name:"",
                email:"",
                password:"",
                password_confirmation:"",
            },

            result:null,
            resultshow: true,
            errors: null
        }
    },
    methods: {
        create() {
            let vm = this;
            
            axios
            .post('/api/register', this.user )
            .then(function (res){
                vm.resultshow = false;
                vm.result = res.data.ref_id;
                //console.log(res.data.ref_id);
            }).catch(function (error) {
                vm.errors = error.response.data.errors;
                //console.log(error.response.data.errors);
            })
               
        },
        genpassword() {
            this.user.password = this.user.password_confirmation= Math.random().toString(36).slice(2,8);
        }
    },

    watch: {

    }
};
</script>