<template>
<div class="container">
    <modal v-show="isModalVisible" @close="closeModal" :url="delete_url" :title="title"/>
    <div class="row justify-content-center">
      <div class="col-md-8">
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
              <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{result.name}}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{result.email}}</td>
                  </tr>
                  <tr>
                    <th>Register Provider</th>
                    <td>{{result.provider}}</td>
                  </tr>
                  <tr>
                    <th>Ref_Id</th>
                    <td>{{result.ref_id}}</td>
                  </tr>
                  <tr>
                    <th>Since</th>
                    <td>{{result.created_at}}</td>
                  </tr>
                  <tr>
                    <th>Total Views</th>
                    <td>{{result.views.length}}</td>
                  </tr>
                  <tr>
                    <th>Hospitals</th>
                    <td>{{result.hospitals.length}}</td>
                  </tr>
                  <tr>
                    <th>Pharmacies</th>
                    <td>{{result.pharmacies.length}}</td>
                  </tr>
                  <tr>
                    <th>Clinics</th>
                    <td>{{result.clinics.length}}</td>
                  </tr>
                  <tr>
                    <th>Cosmetic Clinics</th>
                    <td>{{result.beauty_centers.length}}</td>
                  </tr>
                </tbody>
              </table>
              </div>
              <ul>
              <!-- HOLD ON USAGE
              <li><a :href="edit_url">Edit</a></li>
              -->
              <button class="btn btn-danger btn-block my-2 mt-5" @click="showModal">Delete</button>
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
      result: "",
      isModalVisible: false,
      title: "Are you Sure You want to Delete this user?"
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
    }
  },

  mounted() {},

  watch: {},

  computed: {
    edit_url() {
      return "/admin/users/edit/" + this.result.ref_id;
    },
    delete_url() {
      return "/admin/users/delete/" + this.result.ref_id;
    }
  }
};
</script>