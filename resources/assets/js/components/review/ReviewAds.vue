<style>
  #adjust_row{
    margin-left:3%;
  }

  .red{
    color: red;
  }

  .blue {
    color: blue
  }

</style>
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
                    <th>Stauts</th>
                    <td>{{jobad.status}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{jobad.address}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Region</th>
                    <td>{{jobad.region.en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>City</th>
                    <td>{{jobad.city.en_name}}</td>
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
                    <td>{{jobad.employment_type.en_name}}</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Education Level</th>
                    <td>{{jobad.education_level.en_name}}</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <ul class="m-auto">
                <!-- HOLD ON USAGE
                <li><a :href="edit_url">Edit</a></li>
                -->
                <div id="adjust_row" class="row p-0 ml-4">
                  <form action="/" method="post">
                      <div class="col-md">
                        <div class="md-form">
                          <i class="fa fa-pencil prefix"></i>
                          <label for="form10">Declined Reason</label>
                          <textarea type="text" id="form10" class="md-textarea form-control" placeholder="Reason if declined" rows="3"></textarea>
                        </div>
                      </div>
                      <!-- Group of default radios - option 1 -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
                        <label class="custom-control-label blue" for="defaultGroupExample1">Approved</label>
                      </div>

                      <!-- Group of default radios - option 2 -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios">
                        <label class="custom-control-label red" for="defaultGroupExample2">Declined</label>
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-info danger btn-block my-2 mt-5" @click="deletejob()">Submit</button>
                      </div>
                  </form>
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
    approvejob() {
      window.confirm("Are you sure you want to approve this?");

    },

    deletejob() {
      window.location.href = "/admin/products/new/"+this.result.id;
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

  }
};
</script>