<script>
export default {
    props: ['image'],
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
            // TODO: Change this to be emited to the parent component so we can change order live too
            // TODO: See this guide https://michaelnthiessen.com/pass-function-as-prop/
            this.image.voteScore += this.vote['vote_score']

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
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <p class="text-xl"><strong>Title:</strong> {{ image['title'] }}</p>
            <p class="text-xl"><strong>Posted by:</strong> {{ image['user']['name'] }}</p>
            <p class="text-xl"><strong>Votes:</strong> {{ image['voteScore'] }}</p>
        </div>
        <div>
            <form @submit.prevent="saveVote('up')">
                <button type="submit">^</button>
            </form>
            <button @click="saveVote('down')">v</button>
        </div>
    </div>
</template>
