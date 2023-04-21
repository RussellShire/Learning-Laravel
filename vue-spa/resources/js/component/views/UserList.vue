<template>
    <h1 class="text-xl">User List</h1>
    <p>This is a list of users dynamically pulled from the database</p>
    <ul>
        <template v-for="(user, index) in users" :key="index">
            <li>{{ user['name'] }}</li>
        </template>
    </ul>

</template>

<script>
export default {
    data() {
        return {
            users: '',
        }
    },

    created() {
        const fetchTestData = async () => {
            const results = await fetch('/api/users')
            const data = await results.json()

            this.users = data
        }

        fetchTestData()
    }
};
</script>
