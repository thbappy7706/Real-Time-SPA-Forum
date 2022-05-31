<template>
    <div class="mt-4">
        <vue-simplemde v-model="body" ref="markdownEditor"/>
        <v-btn class="mx-5" @click="submit">
            <v-icon color="green" dark>mdi-comment</v-icon>
        </v-btn>

    </div>
</template>

<script>
export default {
    name: "NewReply",
    props:['questionSlug'],
    data(){
        return{
            body:null
        }
    },
    methods:{
        submit(){
            axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
                .then(res => {
                    this.body = ''
                    EventBus.$emit('newReply',res.data.reply)
                    window.location.reload();
                    window.scrollTo(0,0)
                })
        }
    }
}
</script>

<style scoped>

</style>
