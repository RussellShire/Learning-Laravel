<script>
export default {
    props: ['image'],

    data() {
        return {
            imageVotes: '',
        }
    },

    created() {
        const fetchVoteData = async () => {
            const results = await fetch('/api/votes/'+this.image['id'])
            const data = await results.json()
            // console.log(data)
            const dataArray = Object.values(data)
            const imageVotes = dataArray.map(vote => vote['vote_score'])
            const totalVotes = imageVotes.reduce((partialSum, a) => partialSum + a, 0)

            this.imageVotes = totalVotes
        }

        fetchVoteData()
    }
}
</script>

<template>
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <h2 class="text-xl"><strong>Title:</strong> {{ image['title'] }}</h2>
            <h2 class="text-xl"><strong>Posted by:</strong> {{ image['user']['name'] }}</h2>
            <h2 class="text-xl"><strong>Votes:</strong> {{ imageVotes }}</h2>
        </div>
    </div>
</template>
