<script>
export default {
    props: ['image'],
    data() {
        return {
            'vote': {
                'image_id': '',
                'user_id': '',
                'vote_score': '',
            }
        }
    },

    methods: {
        saveData() {
            console.log("done")
        }
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
            <form @submit.prevent="saveData()">
                <input type="hidden" name="vote_score" v-model="vote.vote_score" />
                <input type="hidden" name="image_id" v-model="vote.image_id" />
                <input type="hidden" name="user_id" v-model="vote.user_id" />
                <button type="submit">^</button>
            </form>

<!--            <form method="POST" action="/vote">-->
<!--                <input type="hidden" name="vote_score" v-model="vote.vote_score" value="1"/>-->
<!--                <input type="hidden" name="image_id" v-model="vote.image_id" value="{{ this.image['id'] }}"/>-->
<!--                <input type="hidden" name="user_id" v-model="vote.user_id" value="-1"/>-->
<!--                <button type="submit">v</button>-->
<!--            </form>-->
        </div>
    </div>
</template>
