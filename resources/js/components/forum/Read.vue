<template>
    <div v-if="question">
        <EditQuestion v-if="editing" :data=question></EditQuestion>

        <ShowQuestion v-else :data=question
        ></ShowQuestion>

        <v-container class="cardPos">
            <div >
                <Replies :replies="question.replies"></Replies>
                <NewReply :questionSlug="question.slug"></NewReply>
            </div>

        </v-container>


    </div>

</template>

<script>
import ShowQuestion from "./ShowQuestion";
import EditQuestion from "./EditQuestion";
import Replies from "../reply/Replies";
import NewReply from "../reply/NewReply";

export default {
    name: "Read",
    components: {NewReply, Replies, EditQuestion, ShowQuestion},
    data() {
        return {
            question: null,
            editing: false
        }
    },
    created() {
        this.listen();
        this.getQuestion()
    },

    methods: {
        listen() {
            EventBus.$on('startEditing', () => {
                this.editing = true;
            })
            EventBus.$on('cancelEditing', () => {
                this.editing = false;
            })
        },
        getQuestion() {
            axios.get(`/api/question/${this.$route.params.slug}`)
                .then(res => this.question = res.data.data)
        }
    }


}
</script>

<style scoped>
.cardPos{
    margin-right: 30rem;
}
</style>
