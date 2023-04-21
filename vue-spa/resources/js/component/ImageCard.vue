<script>
export default {
    props: ['image'],
}
</script>

<template>
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <h2 class="text-xl"><strong>Title:</strong> {{ image['title'] }}</h2>
            <h2 class="text-xl"><strong>Posted by:</strong> {{ image['user_id'] }}</h2>
        </div>
    </div>
</template>
