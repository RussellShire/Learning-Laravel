<template>
    <h1>API Example</h1>

    <p>Data One is: {{ rawData.dataOne }}</p>
    <p>Data Two is: {{ rawData.dataTwo }}</p>
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
            const results = await fetch('/api/example')
            const data = await results.json()

            this.rawData = data
        }

        fetchTestData()
    }
};
</script>
