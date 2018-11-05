<template>
<div class="container">
    
    <div class="row justify-content-center">
      <div class="col-md-10">


          <div class="card">
            <div class="card-header mb-5 mt-5">
              <h2>Job Details</h2>
            </div>
            <div class="card-body">
              <table class="table table-hover user-table">
                <modal v-show="isModalVisible" @close="closeModal" :url="delete_url" :title="title"/>
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <th>Title</th>
                    <td>{{jobad.title}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>{{jobad.description}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{jobad.address}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Expires at</th>
                    <td>{{jobad.expires_at}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td>{{jobad.category.en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Experience Level</th>
                    <td>{{jobad.experience_level.en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Employment Type</th>
                    <td>{{jobad.employment_type_id}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Education Level</th>
                    <td>{{jobad.education_level_id}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Region Id</th>
                    <td>{{jobad.region_id}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>City Id</th>
                    <td>{{jobad.city_id}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th><a href="" @click.prevent="hospitalShow">Hospitals</a></th>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr v-if="hospitalStatus" v-for="">
                    <td>{{hospital.name}}</td>
                    <td>{{hospital.email}}</td>
                    <td>{{hospital.website}}</td>
                  </tr>
                  <tr>
                    <th><a href="" @click.prevent="pharmacyShow">Pharmacies</a></th>
                    <td>{{result}}</td>
                  </tr>
                  <tr v-if="pharmacyStatus" v-for="">
                      <td>{{pharmacy.en_name}}</td>
                      <td>{{pharmacy.email}}</td>
                      <td>{{pharmacy.website}}</td>
                  </tr>
                  <tr>
                    <th><a href="" @click.prevent="clinicShow">Clinics</a></th>
                    <td>{{result}}</td>
                  </tr>
                  <tr v-if="clinicStatus" v-for="">
                      <td>{{clinic.en_name}}</td>
                      <td>{{clinic.email}}</td>
                  </tr>
                  <tr>
                    <th><a href="" @click.prevent="cosmeticShow">Cosmetic Clinics</a></th>
                    <td>{{result}}</td>
                  </tr>
                  <tr v-if="cosmeticStatus" v-for="">
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
  props: ['jobad'],
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
      return "/admin/users/edit/";
    },

    delete_url() {
      return "/admin/users/delete/";
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