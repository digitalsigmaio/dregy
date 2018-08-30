<template>
<div class="row mb-2 phoneInput">
    <div class="col-md-8 ml-2">
    <input class="form-control" type="text" :value="number" name="phones[]" required>
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
