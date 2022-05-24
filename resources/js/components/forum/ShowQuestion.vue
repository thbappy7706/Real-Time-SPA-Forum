<template>
    <v-card>
        <v-container fluid>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ data.title }}
                    </div>
                    <span class="grey--text">{{ data.user }} said {{ data.time }}</span>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal" dark>5 Replies</v-btn>
            </v-card-title>

            <v-card-text v-html="body"></v-card-text>


            <v-card-actions v-if="own">
                <v-btn class="mx-3" fab>
                    <v-icon color="cyan" dark>mdi-pencil</v-icon>
                </v-btn>

                <v-btn class="mx-3" fab @click="destroyQuestion">
                    <v-icon color="red" dark>mdi-delete</v-icon>
                </v-btn>
            </v-card-actions>

        </v-container>
    </v-card>
</template>

<script>
export default {
    name: "ShowQuestion",
    props: ['data'],
    data() {
        return {
            own: User.own(this.data.user_id)
        }
    },
    computed: {
        body() {
            return md.parse(this.data.body)
        }
    },

    methods: {
        destroyQuestion() {
            axios.delete(`/api/question/${this.data.slug}`)
                .then(res => this.$router.push('/forum'))
                .catch(error => console.log(error.response.data))
        }
    }
}
</script>

<style scoped>

</style>
