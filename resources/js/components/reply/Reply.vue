<template>
    <div class="mt-4">
        <v-card>
            <v-card-title>
                <div class="headline"> {{ data.user }}</div>
                <div class="ml-2"> said {{ data.time }}</div>
            </v-card-title>
            <v-divider></v-divider>
            <EditReply v-if="editing" :reply="data">

            </EditReply>
            <v-card-text v-else v-html="reply"></v-card-text>
            <v-divider></v-divider>

            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn small fab @click="edit">
                        <v-icon color="cyan" dark>mdi-pencil</v-icon>
                    </v-btn>

                    <v-btn small fab @click="destroy">
                        <v-icon color="red" dark>mdi-delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>

        </v-card>
    </div>
</template>

<script>
import EditReply from "./EditReply";

export default {
    name: "Reply",
    components: {EditReply},
    props: ['data', 'index'],
    data() {
        return {
            editing: false
        }
    },

    created() {
      this.listen()
    },
    computed: {
        own() {
            return User.own(this.data.user_id)
        },
        reply() {
            return md.parse(this.data.reply)
        }
    },
    methods: {
        destroy(index) {
            EventBus.$emit('deleteReply', this.index)
        },

        edit() {
            this.editing = true;
        },
        listen(){
            EventBus.$on('cancelEditing',()=>{
                this.editing = false;
            })
        }

    }
}
</script>

<style scoped>

</style>
