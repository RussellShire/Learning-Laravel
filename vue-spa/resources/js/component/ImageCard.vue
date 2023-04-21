<script>
export default {
    props: ['image'],

    // data() {
    //     return {
    //         userName: '',
    //     }
    // },
}
</script>

<template>
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <h2 class="text-xl"><strong>Title:</strong> {{ image['title'] }}</h2>
            <h2 class="text-xl"><strong>Posted by:</strong> {{ image['user']['name'] }}</h2>
        </div>
    </div>
</template>
