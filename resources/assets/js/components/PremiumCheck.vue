<template>
<div>
    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Premium
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            
                <input type="radio" id="one" value="false" v-model="premiumShow" checked name="premium">
                <label for="one">No</label>
                <br>
                <input type="radio" id="two" value="true" v-model="premiumShow" name="premium">
                <label for="two">Yes</label>
                <br>
        </div>
    </div>
    <div v-if="premiumShow === 'true'" class="form-group">
            <label for="priority" class="control-label col-md-3 col-sm-3 col-xs-12">
                Priority
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select name="priority">
                    <option selected="selected" disabled>Select Priority</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
        
        
            <label for="expires_at" class="control-label col-md-3 col-sm-3 col-xs-12">
                Expires At
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <input id="expires_at" type="date"  name="expires_at">
            </div>
        
        
    
    </div>
    
</div>
</template>
<script>
export default {
    props:[],
    data(){
        return {
            premiumShow:false,
            picked:null,
        }
    },

}
</script>
