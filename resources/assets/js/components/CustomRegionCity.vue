<template>
<div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Region</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select v-model="region" name="regionId" class="form-control">
                <option disabled>Choose Region</option>
                <option v-for="region in regions" :value="region.id" :key="region.id">{{region.en_name}}</option>
            </select>
        </div>
    </div>
    <div v-if="cities" class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="cityId" v-model="city" class="form-control">
                <option selected="selected" disabled>Choose City</option>
                <option v-for="city in cities" :value="city.id" :key="city.id">{{city.en_name}}</option>
            </select>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['regions'],
    data() {
        return{
            citiesShow: false,
            cities:null,
            region:null,
            city: null
        }
    },

    methods: {
        getCities(region) {
            this.cities = region.cities;
            citiesShow =  true;
        },
        selected()
        {
            return "selected";
        }
    },
    watch: {
        region(val) {
            if(val !== null && val !=="Choose Region") {
                let region = this.regions.filter(function(region) {
                    return region.id == val
                })
                this.cities = region[0].cities
            }
        }
    },
    created(){
        this.region = "Choose Region";
    }

}
</script>