<template>
    <div id="nav">
        <router-link to="/">Home</router-link> |
        <router-link :to="{name: 'about'}">About</router-link> <!--using a named route note ':' before 'to' so it's dynamic-->
    </div>

    
    <router-view />
</template>

<script>
export default {
    setup() {

    }
}
</script>
