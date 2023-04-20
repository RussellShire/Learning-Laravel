<template>
    <h1 class="text-xl">Image List</h1>
    <p>This is a list of imagery dynamically pulled from the database</p>

    <ul>
        <template v-for="(image, index) in rawData" :key="index">
            <li>
                <img :src="image['image_path']" :alt="image['title']">
                {{ image['title'] }}
            </li>
        </template>
    </ul>

</template>

<script>
export default {
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
    }
};
</script>
