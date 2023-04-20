<template>
    <div id="nav">
        <router-link to="/">Home</router-link> |
        <router-link :to="{name: 'about'}">About</router-link> | <!--using a named route note ':' before 'to' so it's dynamic-->
        <router-link :to="{name: 'example'}">Api Example</router-link> |
        <router-link :to="{name: 'users'}">Users</router-link> |
        <router-link :to="{name: 'images'}">Images</router-link>

    </div>

    <router-view></router-view> <!--  This is where our routes will appear  -->
</template>

<script>
export default {
    setup() {

    }
}
</script>

<style>
    @import "../css/app.css";
</style>
