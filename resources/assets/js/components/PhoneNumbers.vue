<template>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">PhoneNumbers</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <button @click.prevent="addPhoneInput">+</button>
            <button v-if="inputArray > 0" @click.prevent="removePhoneInput">-</button>
            <div v-if="inputArray !== 0">
                <phone-input  v-for="n in inputArray" :key="n"></phone-input>
            </div>
            
        </div>
    </div>
</template>
<script>
export default{
    props:[],
    data() {
        return {
            inputArray:1,
        }
    },
    methods:{
        addPhoneInput(){
            this.inputArray++;
        },
        removePhoneInput(){
            this.inputArray--;
        }
    }
}
</script>