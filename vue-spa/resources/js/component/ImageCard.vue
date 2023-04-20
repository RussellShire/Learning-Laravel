<script>
export default {
    props: ['image'],
}
</script>

<template>
    <div>
        <img :src="image['image_path']" :alt="image['title']">
        <h2>{{ image['title'] }}</h2>
    </div>
</template>
