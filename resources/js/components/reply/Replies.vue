<template>
    <div>
        <Reply v-for="reply in content"
               :key="reply.id"
               v-if="replies"
               :data="reply">
        </Reply>
    </div>
</template>

<script>
import Reply from "./Reply";
export default {
    name: "Replies",
    components: {Reply},
    props: ['replies'],
    data(){
        return{
            content: this.replies
        }
    },
    created(){
        this.listen
    },
    methods:{
        listen(){
            EventBus.$on('newReply', (reply) =>{
                this.content.unshift(reply)
            })
        }
    }
}
</script>

<style scoped>

</style>
