<script>
import axios from 'axios';
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
            
            axios.post('/vote', this.vote)
                .then(response => console.log(response))
                .catch(error => console.log(error))
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
