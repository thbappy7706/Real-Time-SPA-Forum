<template>
    <div>
        <Reply v-for="(reply,index) in content"
               :key="reply.id"
               :index="index"
               :data="reply">
        </Reply>
    </div>
</template>

<script>
import Reply from "./Reply";

export default {
    name: "Replies",
    components: {Reply},
    props: ['question'],
    data() {
        return {
            content: this.question.replies
        }
    },
    created() {
        this.listen()
    },
    methods: {
        listen() {
            EventBus.$on('newReply', (reply) => {
                this.content.unshift(reply)
                window.location.reload();
            })

            EventBus.$on('deleteReply', (index) => {
                // console.log(this.content[index].id)
                // this.content.splice(index,1)

                // axios.delete(`/api/reply/delete/${this.question.slug}/reply/${this.content[index].id}`)
                axios.post(`/api/reply/delete/${this.content[index].id}`)
                    .then(res => {
                        this.content.splice(index, 1)
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
