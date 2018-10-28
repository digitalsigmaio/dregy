<template>
<div>
    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Premium
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            
                <input type="radio" id="one" value="false" v-model="premiumShow"  name="premium">
                <label for="one">No</label>
                <br>
                <input type="radio" id="two" value="true" v-model="premiumShow"  name="premium">
                <label for="two">Yes</label>
                <br>
        </div>
    </div>
    <div v-if="premiumShow === 'true'" class="form-group">
            <label for="priority" class="control-label col-md-3 col-sm-3 col-xs-12">
                Priority
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select v-model="selected" name="priority">
                    <option v-for="n in priorities">{{n}}</option>
                </select>
            </div>
        
        
            <label for="expires_at" class="control-label col-md-3 col-sm-3 col-xs-12">
                Expires At
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <input id="expires_at" type="date"  v-model="expires_at" name="expires_at">
            </div>
        
        
    
    </div>
    
</div>
</template>
<script>
export default {
    props:['premium', 'status'],
    data(){
        return {
            premiumShow:null,
            picked:null,
            priorities:[1,2,3],
            selected:null,
            expires_at:null,
        }
    },
    methods:{
        checkStatus(){
            if(this.status){
                return "true";
            }else{
                return "false"
            }
        }
    },
    created() {
        this.premiumShow = this.status.toString();
        this.selected = this.premium.priority;
        this.expires_at = this.premium.expires_at.split(" ")[0];
    }

}
</script>
