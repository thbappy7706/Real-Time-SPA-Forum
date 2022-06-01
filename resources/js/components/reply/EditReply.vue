<template>
    <div class="mt-4">
        <vue-simplemde v-model="reply.reply" ref="markdownEditor"/>
        <v-card-actions>
            <v-btn small fab @click="update">
                <v-icon color="green" dark>mdi-store</v-icon>
            </v-btn>

            <v-btn small fab @click="cancel">
                <v-icon color="black" dark>mdi-cancel</v-icon>
            </v-btn>
        </v-card-actions>

    </div>
</template>

<script>
export default {
    name: "EditReply",
    props: ['reply'],
    methods: {
        cancel() {
            EventBus.$emit('cancelEditing');
        },
        update() {
            axios.post(`/api/question/reply/update/${this.reply.id}`,{body:this.reply.reply})
                .then(res=> this.cancel())
        }
    }
}
</script>

<style scoped>

</style>
