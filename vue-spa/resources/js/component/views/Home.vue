<template>
    <h1>Home</h1>
    <p>This is a home route</p>

<!--    <p>Data One is: {{ rawData.dataOne }}</p>-->
<!--    <p>Data Two is: {{ rawData.dataTwo }}</p>-->
</template>

<script>
export default {
    data() {
        return {
            rawData: '',
        }
    },

    // created() {
    //     const fetchTestData = async () => {
    //         const results = await fetch('/api/test')
    //         const data = await results.json()
    //
    //         this.rawData = data
    //     }
    //
    //     fetchTestData()
    // }
};
</script>
