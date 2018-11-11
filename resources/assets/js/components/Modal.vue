<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    max-width: 400px;
    max-height: 150px;
    margin-left: 40%;
    margin-top: 10%;
  }

  .modal-header,
  .modal-footer {
    border: none!important;
    display: flex;
  }

  .modal-header {
    /*border-bottom: 1px solid #eeeeee;*/
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    /*border-top: 1px solid #eeeeee;*/
    margin-top: 10px;
    display: flex;
    justify-content: space-around;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    /*border: 1px solid #4AAE9B;
    border-radius: 2px;*/
  }
</style>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop">
      <div class="modal"
        role="dialog"
        aria-labelledby="modalTitle"
        aria-describedby="modalDescription">

        <header class="modal-header" id="modalTitle">

            {{title}}

        </header>
          <div v-if="message" class="modal-body">
              <p>{{message}}</p>
          </div>
        <section class="modal-footer">
            <button
              type="button"
              class="btn-green"
              @click="YES"
              aria-label="Yes"
            >
              YES
            </button>

            <button
              type="button"
              class="btn-green"
              @click="NO"
              aria-label="Yes"
            >
              NO
            </button>
        </section>
      </div>
    </div>
  </transition>
</template>
<script>
  export default {
    name: 'modal',
    props:['url','title', 'admin'],
    data() {
      return{
        message:null
      }
    },
    methods: {
      YES() {
        let vm = this;
        //console.log(this.url);
        axios.delete(this.url, {
            data: { id: this.admin.id }
      })
        .then(function(res){console.log(res.data);
            vm.message = res.data;
            vm.$emit('close');
            vm.$emit('deleted');
        }).catch(function (error) {
            console.log(error);
            vm.message = error.response.data;
        });
      },

      NO() {
          let vm = this;
          console.log(this.url);
        this.$emit('close');
      },
    },
  };
</script>
