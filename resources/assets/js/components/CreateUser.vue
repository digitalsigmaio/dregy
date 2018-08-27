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
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="md-form mt-5 mb-5">
                        <i class="fa fa-envelope prefix white-text"></i>
                        <label for="orangeForm-email">Email</label>
                        <input type="text" id="orangeForm-email" class="form-control"  v-model="user.email"
                            required autofocus>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>

                        <div class="md-form mt-5">
                            <i class="fa fa-lock prefix white-text"></i>
                            <label for="orangeForm-pass">Password</label>
                            <input type="password" id="orangeForm-pass" class="form-control" v-model="user.password" disabled required>
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
        <div else class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
            {{result}}
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

            result:"",
            resultshow: true
        }
    },
    methods: {
        create() {
            this.resultshow = false;
            let vm = this;
            
            axios
            .post('/api/register', this.user )
            .then(function (res){
                vm.result = res.data.ref_id;
                //console.log(res.data.ref_id);
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