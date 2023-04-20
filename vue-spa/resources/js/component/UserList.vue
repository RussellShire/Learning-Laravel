<template>
    <h1 class="text-xl">User List</h1>

    <ul>
        <template v-for="(user, index) in rawData" :key="index">
            <li>{{ user['name'] }}</li>
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
            const results = await fetch('/api/users')
            const data = await results.json()

            this.rawData = data
        }

        fetchTestData()
    }
};
</script>
