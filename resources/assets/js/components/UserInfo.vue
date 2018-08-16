<template>
<div class="container">
    <modal v-show="isModalVisible" @close="closeModal" :url="delete_url" :title="title"/>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div v-if="formStatus" class="card">
                <div class="card-header">Users Selection</div>
                <div  class="card-body">
                   <form>
                       <div class="">
                       <select class="" v-model="select_option">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="email">E-mail</option>
                            <option value="ref_id">Reference Id</option>
                        </select>
                            <input type="text" id="form1" v-model="filter_value" class="form-control">
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-info btn-block my-4" @click.prevent="getUser()" type="submit">Search</button>
                   </form>
                </div>
            </div>

            <div v-else class="card">
                <div class="card-header">Result Selection</div>
                <div class="card-body">
                   {{result}}
                </div>
                <ul>
                    <!-- HOLD ON USAGE
                    <li><a :href="edit_url">Edit</a></li>
                    -->
                    <button @click="showModal">Delete</button>
                </ul>
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
      title:"Are you Sure You want to Delete this User?"
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