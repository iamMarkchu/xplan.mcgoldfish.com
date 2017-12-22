<template>
    <el-row id="admin">
        <menu-block-component></menu-block-component>
        <main-component></main-component>
        <footer-component></footer-component>
    </el-row>
</template>
<style>
    body {
        height: 100%;
    }
    #app,html {
        height: 100%;
    }
    #admin {
        height: 100%;
        width: 100%;
        position: relative;
    }
</style>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components :{
            'menu-block-component': require('./MenuBlock.vue'),
            'main-component': require('./Main.vue'),
            'footer-component': require('./Footer.vue'),
        }
    }
</script>
