<template>
  <el-col :md="4" class="menu-block">
    <el-menu
      default-active="2"
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b"
      router=1>
      <el-menu-item index="/home">
        <i class="el-icon-menu"></i>
        <span slot="title">首页</span>
      </el-menu-item>
      <el-menu-item index="/merchant">
        <i class="el-icon-setting"></i>
        <span slot="title">商家管理</span>
      </el-menu-item>
    </el-menu>
  </el-col>
</template>
<style>
  .menu-block {
    height: 100%;
    background-color: rgb(84, 92, 100)
  }
</style>
<script>

</script>