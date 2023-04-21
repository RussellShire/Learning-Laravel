<script>
export default {
    props: ['image'],

    data() {
        return {
            userName: '',
        }
    },

    created() {
        const fetchTestData = async () => {
            const results = await fetch('/api/user/'+this.image['id'])
            const data = await results.json()
            console.log(data)
            this.userName = data.name;
        }

        fetchTestData()
    },
}
</script>

<template>
    <div class="">
        <img :src="image['image_path']" :alt="image['title']">
        <div class="flex">
            <h2 class="text-xl"><strong>Title:</strong> {{ image['title'] }}</h2>
            <h2 class="text-xl"><strong>Posted by:</strong> {{ userName }}</h2>
        </div>
    </div>
</template>
