<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <Question v-for="question in questions"
                          :key="question.path"
                          :data=question
                >

                </Question>
            </v-flex>
            Sidebar
        </v-layout>
    </v-container>
</template>

<script>
import Question from "./Question";

export default {
    name: "Forum",
    data() {
        return {
            questions: {},
        }
    },
    components: {Question},
    created() {
        axios.get(`/api/question`)
            .then(res => this.questions = res.data.data)
            .catch(err => console.log(err.response.data))
    }
}
</script>

<style scoped>

</style>
