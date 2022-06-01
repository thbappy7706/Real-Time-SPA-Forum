<template>
    <div>
        <v-btn class="mx-3" fab @click="likeIt">
            <v-icon :color="likedColor">mdi-heart</v-icon>
            {{count}}
        </v-btn>
    </div>

</template>

<script>
export default {
    name: "Like",
    props: ['content'],
    data() {
        return {
            liked: this.content.liked,
            count: this.content.like_count
        }
    },
    computed: {
        likedColor() {
            return this.liked ? 'red' : 'black'
        }
    },
    methods: {
        likeIt() {
            if (User.loggedIn()) {
                this.liked ? this.decr() : this.incr()
                this.liked = !this.liked
            }
        },
        incr() {
            axios.post(`/api/like/${this.content.id}`)
                .then(res => this.count++)
        },
        decr() {
            axios.delete(`/api/like/${this.content.id}`)
                .then(res => this.count--)
        }
    }
}
</script>

<style scoped>

</style>
