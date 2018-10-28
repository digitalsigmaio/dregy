<template>
<div class="row mb-2 phoneInput">
    <div class="col-md-8 ml-2">
        <input class="form-control"  type="number" v-model="phones"  required>
    </div>
</div>
</template>
<script>
export default {
    props:[],
    model: {
        prop: 'value',
        event: 'change'
    },
}
</script>
<style>
.phoneInput{
    margin-bottom:5px;
}
</style>
