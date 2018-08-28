<template>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">PhoneNumbers</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <button @click.prevent="addPhoneInput">+</button>
            <button v-if="phonesArray.length > 0" @click.prevent="removePhoneInput">-</button>
            <div v-if="phonesArray.length !== 0">
                <phone-input  v-for="(n, index) in phonesArray" :key="index" :number="n.number"></phone-input>
            </div>
            
        </div>
    </div>
</template>
<script>
export default{
    props:['phones'],
    data() {
        return {
            phonesArray:this.phones,
        }
    },
    methods:{
        addPhoneInput(){
            this.phonesArray.push({});
        },
        removePhoneInput(){
            this.phonesArray.pop();
        }
    }
}
</script>