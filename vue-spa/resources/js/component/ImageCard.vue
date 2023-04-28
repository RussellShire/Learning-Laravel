<script>
export default {
    props: ['image'],
    emits: ['submitVote'],

    data() {
        return {
            'vote': {
                'image_id': this.image['id'],
                'user_id': 1,
                'vote_score': 1,
                // CRSF linked to meta info on app.blade.php
                '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        }
    },

    methods: {
        saveVote(vote) {
            vote === "up" ? this.vote['vote_score'] = 1 : this.vote['vote_score'] = -1

            // Updating the live vote for the user
            this.image.voteScore += this.vote['vote_score']

            // Emit an event to the parent component that will resort the list
            this.$emit('submitVote')

            const options = {
                method: "POST",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(this.vote)
            }
            async function postVote() {
                // targeting /vote on web route
                await fetch('/vote', options)
            }

            postVote()
        },
    },
}
</script>

<template>
    <div class="flex-col p-4">
        <img :src="image['image_path']" :alt="image['title']">

        <div class="flex justify-between">
            <p class="text-xl"><strong>Votes:</strong> {{ image['voteScore'] }}</p>
            <p class="text-xl"><strong>Title:</strong> {{ image['title'] }}</p>
            <p class="text-xl"><strong>Posted by:</strong> {{ image['user']['name'] }}</p>
        </div>
        <div>
            <button @click="saveVote('up')"><i class="fa-solid fa-arrow-up"></i></button>
            <button @click="saveVote('down')"><i class="fa-solid fa-arrow-down"></i></button>
        </div>
    </div>
</template>
