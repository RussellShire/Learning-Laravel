

<template>
    <h1 class="text-xl text-red-500">Image List</h1>
    <p class="text-red-500">This is a list of imagery dynamically pulled from the database</p>

    <ul>
        <template v-for="(image, index) in rawData" :key="index">
            <li>
                <image-card :image="image" />
            </li>
        </template>
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
            rawData: '',
        }
    },

    created() {
        const fetchTestData = async () => {
            const results = await fetch('/api/images')
            const data = await results.json()

            this.rawData = data
        }

        fetchTestData()
    },
};
</script>
