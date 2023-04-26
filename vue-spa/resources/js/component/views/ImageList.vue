

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
        const fetchImageData = async () => {
            const results = await fetch('/api/images')
            const data = await results.json()
            // console.log(data)

            const images = data

            images.forEach(image => {
                // console.log(image)
                const votesArray = image['votes'].map(vote => vote['vote_score'])
                const totalVotes = votesArray.reduce((partialSum, a) => partialSum + a, 0)

                image.voteScore = totalVotes
            })

            this.images = images
        }

        fetchImageData();
    },
};
</script>
