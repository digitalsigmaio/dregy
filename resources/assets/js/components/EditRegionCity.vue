<template>
<div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Region</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select v-model="region" name="region_id" class="form-control">
                <option v-for="region in regions" :selected="region.id == current_region" :value="region.id">{{region.en_name}}</option>
                
            </select>
        </div>
    </div>
    <div v-if="cities" class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <select name="city_id" v-model="city" class="form-control">
                <option v-for="city in cities" :value="city.id">{{city.en_name}}</option>
            </select>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['regions', 'current_region', 'current_city'],
    data() {
        return{
            citiesShow: false,
            cities:null,
            region:null,
            city: null
        }
    },
    created(){
        this.region = this.current_region;
        this.city = this.current_city;
    },

    methods: {
        getCities(region) {
            this.cities = region.cities;
            citiesShow =  true;
        },
        selected()
        {
            return "selected";
        },
    },
    watch: {
        region(val) {
            if(val !== null) {
                let region = this.regions.filter(function(region) {
                    return region.id == val
                })
                this.cities = region[0].cities
            }
        }
    },

}
</script>