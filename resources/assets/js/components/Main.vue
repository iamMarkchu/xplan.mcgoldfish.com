<template>
  <el-col :md="20" class="main-block">
    <router-view></router-view>
  </el-col>
</template>
<style>
  .main-block {
    height: 100%;
    background-color: #fff;
  }
</style>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>