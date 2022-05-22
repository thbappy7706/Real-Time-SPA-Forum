<template>
<ShowQuestion :data = question>

</ShowQuestion>
</template>

<script>
import ShowQuestion from "./ShowQuestion";
export default {
    name: "Read",
    components: {ShowQuestion},
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
