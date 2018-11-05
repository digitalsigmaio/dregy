<template>
<div class="container">
    
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div v-if="formStatus" class="card">
            <div class="card-header mb-5 mt-5">
              <h2>Users Selection <b>:</b></h2>
              </div>
            <div  class="card-body">
                <form class="col-md-8">
                    <div class="form-group">
                      <select class="mb-5 mt-5" v-model="select_option">
                          <option value="" disabled selected>Choose your Search option</option>
                          <option value="email">E-mail</option>
                          <option value="ref_id">Reference Id</option>
                      </select>
                        <input type="text" id="form1" v-model="filter_value" class="form-control">
                    </div>

                    <!-- Submit button -->
                    <div class="form-group"> 
                        <button class="btn btn-info btn-block my-4" @click.prevent="getUser()" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

          <div v-else class="card">
            <div class="card-header mb-5 mt-5">
              <h2>User Details</h2>
            </div>
            <div class="card-body">
              <table v-if="result" class="table table-hover user-table">
                <modal v-show="isModalVisible" @close="closeModal" :url="delete_url" :title="title"/>
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
              <ul>
              <!-- HOLD ON USAGE
              <li><a :href="edit_url">Edit</a></li>
              -->
              <button class="btn btn-danger btn-block my-2 mt-5" @click="showModal">Delete</button>
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-info btn-block my-2 mt-5" @click="newjob()">New Job</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-info btn-block my-2 mt-5" @click="newproduct()">New Product</button>
                </div>
              </div>
              </ul>
            </div>
          </div>
      </div>
    </div>
</div>
</template>


<script>
export default {
  props: [],
  data() {
    return {
      formStatus: true,
      select_option: "",
      filter_value: "",
      result: null,
      isModalVisible: false,
      title: "Are you Sure You want to Delete this user?",
      hospitalStatus: false,
      pharmacyStatus: false,
      clinicStatus: false,
      cosmeticStatus: false,
    };
  },

  methods: {
    getUser() {
      if (this.select_option === "email" || "ref_id") {
        let vm = this;
        this.formStatus = false;
        axios
          .post("/api/users/info", {
            select_option: this.select_option,
            filter_value: this.filter_value
          })
          .then(function(res) {
            vm.result = res.data.data;
          });
      }
    },
    showModal() {
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
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

  watch: {},

  computed: {
    edit_url() {
      return "/admin/users/edit/" + this.result.ref_id;
    },

    delete_url() {
      return "/admin/users/delete/" + this.result.ref_id;
    },
    newjob() {
      window.location.href = "/admin/jobs/new/"+this.result.id;
    },

    newproduct() {
      window.location.href = "/admin/products/new/"+this.result.id;
    },
  }
};
</script>