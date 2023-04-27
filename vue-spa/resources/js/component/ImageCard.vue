<script>
export default {
    props: ['image'],
    data() {
        return {
            'vote': {
                'image_id': this.image['id'],
                'user_id': 1,
                'vote_score': 1,
            },
        }
    },

    methods: {
        saveVote(vote) {
            vote === "up" ? this.vote['vote_score'] = 1 : this.vote['vote_score'] = -1

            console.log("done", this.vote)

            // Do Vue 3 Post request here using fetch
            // https://jasonwatmore.com/vue-3-http-post-request-examples
        },
    },
}
</script>

<template>
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <p class="text-xl"><strong>Title:</strong> {{ image['title'] }}</p>
            <p class="text-xl"><strong>Posted by:</strong> {{ image['user']['name'] }}</p>
            <p class="text-xl"><strong>Votes:</strong> {{ image['voteScore'] }}</p>
        </div>
        <div>
            <button @click="saveVote('up')">^</button>
            <button @click="saveVote('down')">v</button>
        </div>
    </div>
</template>
