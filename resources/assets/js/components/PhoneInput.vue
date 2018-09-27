<template>
<div class="row mb-2 phoneInput">
    <div class="col-md-8 ml-2">
        <!--
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
        </div>
        -->
        <input class="form-control"  type="number" :value="number" name="phones[]" required>
    </div>
</div>
</template>
<script>
export default {
    props:['number']
}
</script>
<style>
.phoneInput{
    margin-bottom:5px;
}
</style>
