<template>
    <div class="text-center">
        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
                <v-btn large fab v-bind="attrs" v-on="on">
                    <v-icon color="red" dark>mdi-bell</v-icon>
                    {{ unreadCount }}
                </v-btn>

            </template>
            <v-list>
                <v-list-item
                    v-for="(item, index) in unread"
                    :key="index">
                    <router-link :to="item.path">
                        <v-list-item-title @click="readNotification(item.id,item.data)">
                            {{ item.question }}
                        </v-list-item-title>
                    </router-link>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item
                    v-for="(item, index) in read"
                    :key="index">
                    <router-link :to="item.path">
                        <v-list-item-title>{{ item.question }}</v-list-item-title>
                    </router-link>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
export default {
    name: "AppNotification",
    data() {
        return {
            read: {},
            unread: {},
            unreadCount: 0,
        }
    },
    created() {
        if (User.loggedIn()) {
            this.getNewNotifications()
        }
    },

    methods: {
        getNewNotifications() {
            axios.post('/api/notifications')
                .then(res => {
                    console.log(res.data.unread)
                    this.read = res.data.read
                    this.unread = res.data.unread
                    this.unreadCount = res.data.unreadCount
                })
        },

        readNotification(id,notifyData){
            console.log(notifyData)
          axios.post(`/api/read-notification/${id}`)
            .then(res=>{
                this.unread.splice(notifyData,1)
                this.read.push(notifyData)
                this.unreadCount--
            })
        }
    },

    // computed: {
    //     color() {
    //         return this.unreadCount > 0 ? "red" : "red lighten-2";
    //     }
    // }

}
</script>

<style scoped>
.v-btn--fab.v-size--large {
    height: 40px;
    width: 40px;
    margin-top: 1.5rem;
    margin-right: 2rem;
    background-color: transparent;
}
</style>



