<template>

</template>

<script>
export default {
    name: "Read",
    data(){
        return{
            question:{}
        }
    },
    created() {
        axios.get(`/api/question/${this.$route.params.slug}`)
        .then(res => this.question = res.data.data)
    }
}
</script>

<style scoped>

</style>
