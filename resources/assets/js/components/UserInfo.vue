<template>
<div class="container">
    
    <div class="row justify-content-center">
      <div class="col-md-10" style="margin-top: 50px">
        <div v-if="formStatus" class="card">
            <div class="card-header mb-5 mt-5">
              <h2>Users Selection <b>:</b></h2>
              </div>
            <div  class="card-body">
                <form class="col-md-8">
                    <div class="form-group">
                        <label for="selections">Identified by</label>
                          <select class="mb-5 mt-5 form-control" v-model="select_option" id="selections" required>
                              <option value="null" disabled selected>Choose your Search option</option>
                              <option value="email">E-mail</option>
                              <option value="ref_id">Reference Id</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="identification">Value</label>
                        <input type="text" id="identification" v-model="filter_value" class="form-control" required>
                    </div>
                    <!-- Submit button -->
                    <div class="form-group"> 
                        <button class="btn btn-info btn-block my-4" @click.prevent="getUser()" type="submit">Search</button>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div id="required_fields" >
                            <ul class="list-unstyled">
                                <li v-if="required_fields.select_option" class="alert-danger" style="padding: 5px">{{ required_fields.select_option }}</li>
                                <li v-if="required_fields.filter_value" class="alert-danger" style="padding: 5px">{{ required_fields.filter_value }}</li>
                                <li v-if="error" class="alert-danger" style="padding: 5px">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" v-if="userDetails">
          <div class="card-header mb-5 mt-5">
            <h2>User Details</h2>
          </div>
          <div class="card-body">
            <table v-if="result" class="table table-hover user-table">
              <modal v-show="isModalVisible" @deleted="userDeleted" @close="closeModal" :url="delete_url" :admin="admin" :title="title"></modal>
              <thead>
              </thead>
              <tbody>
                <tr>
                  <th>Name</th>
                  <td>{{result.name}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{result.email}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th>Register Provider</th>
                  <td>{{result.provider}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th>Ref_Id</th>
                  <td>{{result.ref_id}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th>Since</th>
                  <td>{{result.created_at}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th>Total Views</th>
                  <td>{{result.views.length}}</td>
                  <td></td>
                </tr>
                <tr>
                  <th><a href="" @click.prevent="hospitalShow">Hospitals</a></th>
                  <td>{{result.hospitals.length}}</td>
                  <td></td>
                </tr>
                <tr v-if="hospitalStatus" v-for="hospital in result.hospitals">
                  <td>{{hospital.name}}</td>
                  <td>{{hospital.email}}</td>
                  <td>{{hospital.website}}</td>
                </tr>
                <tr>
                  <th><a href="" @click.prevent="pharmacyShow">Pharmacies</a></th>
                  <td>{{result.pharmacies.length}}</td>
                </tr>
                <tr v-if="pharmacyStatus" v-for="pharmacy in result.pharmacies">
                    <td>{{pharmacy.en_name}}</td>
                    <td>{{pharmacy.email}}</td>
                    <td>{{pharmacy.website}}</td>
                </tr>
                <tr>
                  <th><a href="" @click.prevent="clinicShow">Clinics</a></th>
                  <td>{{result.clinics.length}}</td>
                </tr>
                <tr v-if="clinicStatus" v-for="clinic in result.clinics">
                    <td>{{clinic.en_name}}</td>
                    <td>{{clinic.email}}</td>
                </tr>
                <tr>
                  <th><a href="" @click.prevent="cosmeticShow">Cosmetic Clinics</a></th>
                  <td>{{result.beauty_centers.length}}</td>
                </tr>
                <tr v-if="cosmeticStatus" v-for="cosmetic in result.beauty_centers">
                    <td>{{cosmetic.en_name}}</td>
                    <td>{{cosmetic.email}}</td>
                </tr>
              </tbody>
            </table>
            </div>
            <div class="row">

                  <div class="col-md-12">
                      <a class="btn btn-danger btn-block my-2 mt-5" @click="showModal()">Delete</a>
                  </div>
                  <div class="col-md-6">
                      <a class="btn btn-info btn-block my-2 mt-5" :href="newjob">New Job</a>
                  </div>
                  <div class="col-md-6">
                      <a class="btn btn-info btn-block my-2 mt-5" :href="newproduct">New Product</a>
                  </div>
            </div>
          </div>
        </div>

        <div class="card" v-if="userDeleteSuccess">
            <div class="card-body text-center">
                <div class="col-md-12">
                    <h1>User has been deleted successfully</h1>
                    <a href="/admin/users/info">Back to user search</a>
                </div>
            </div>
        </div>

      </div>
    </div>



</template>


<script>
export default {
  props: ['admin'],
  data() {
    return {
        formStatus: true,
        userDetails: false,
        userDeleteSuccess: false,
        select_option: '',
        filter_value: '',
        result: null,
        isModalVisible: false,
        title: "Are you Sure You want to Delete this user?",
        hospitalStatus: false,
        pharmacyStatus: false,
        clinicStatus: false,
        cosmeticStatus: false,
        newjob: null,
        newproduct: null,
        required_fields: {
            select_option: null,
            filter_value: null
        },
        error: null
    };
  },

  methods: {
    getUser() {
        let vm = this;
      if (vm.select_option !== '') {
          if (vm.required_fields.select_option !== '') {
              vm.required_fields.select_option = '';
          }
          if (vm.filter_value !== '') {
              if (vm.required_fields.filter_value !== '') {
                  vm.required_fields.filter_value = '';
              }
              axios.post("/api/users/info", {
                      select_option: vm.select_option,
                      filter_value: vm.filter_value
                  })
                  .then(function(res) {
                      vm.formStatus = false;
                      vm.userDetails = true;
                      vm.error = null;
                      vm.required_fields = null;
                      vm.result = res.data.data;
                      vm.newjob = "/admin/jobs/new/" + vm.result.id;
                      vm.newproduct = "/admin/products/new/" + vm.result.id;
                  })
                  .catch(function (error) {
                      vm.error = error.response.data;
                  });
          } else {
              vm.required_fields.filter_value = 'Value is required';
          }
      } else {
          vm.required_fields.select_option = 'Option is required';
      }
    },
    showModal() {
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
    userDeleted() {
        this.formStatus = false;
        this.userDetails = false;
        this.userDeleteSuccess = true;
    },
    hospitalShow(){
        this.hospitalStatus = !this.hospitalStatus;
    },
    pharmacyShow(){
        this.pharmacyStatus = !this.pharmacyStatus;
    },
    clinicShow(){
        this.clinicStatus = !this.clinicStatus;
    },
    cosmeticShow(){
        this.cosmticStatus = !this.cosmticStatus;
    },
  },

  mounted() {},

  watch: {

  },

  computed: {
    edit_url() {
      return "/admin/users/edit/" + this.result.ref_id;
    },

    delete_url() {
      return "/admin/users/delete/" + this.result.ref_id;
    },
  }
};
</script>