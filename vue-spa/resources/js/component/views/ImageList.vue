

<template>
    <h1 class="text-xl text-red-500">Image List</h1>
    <p class="text-xs">This is a list of imagery dynamically pulled from the database</p>

    <ul v-for="(image, index) in images" :key="index">
        <li>
            <image-card :image="image" />
        </li>
    </ul>

</template>

<script>
import ImageCard from '../ImageCard.vue';
export default {
    components: {
        ImageCard
    },

    data() {
        return {
            images: '',
        }
    },

    created() {
        const fetchTestData = async () => {
            const results = await fetch('/api/images')
            const data = await results.json()
            console.log(data)
            this.images = data
        }

        fetchTestData()
    },
};
</script>
