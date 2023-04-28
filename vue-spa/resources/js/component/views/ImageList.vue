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
            const images = await results.json()

            // looping over each image
            images.forEach(image => {
                // Creating an array of all the votes on an image
                const votesArray = image['votes'].map(vote => vote['vote_score'])

                // Adding up all the votes on an image
                const totalVotes = votesArray.reduce((partialSum, a) => partialSum + a, 0)

                // Adding a new property to the image object
                image.voteScore = totalVotes
            })

            // Sorting by Vote Score desc
            images.sort(function(a, b){return b.voteScore - a.voteScore});

            // Assigning to Vue.js Data
            this.images = images
        }

        fetchImageData();
    },

    methods: {
        updateView() {
            this.images.sort(function(a, b){return b.voteScore - a.voteScore});
        }
    }
};
</script>


<template>
    <h1 class="text-xl text-red-500">Image List</h1>
    <p class="text-xs">This is a list of imagery dynamically pulled from the database</p>

    <!--  Looping over images in order of vote score and sending to image card component  -->
    <ul v-for="(image, index) in images" :key="index" class="flex flex-nowrap">
        <li>
            <image-card :image="image" @submit-vote="updateView" />
        </li>
    </ul>

</template>

