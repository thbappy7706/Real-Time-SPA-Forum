<template>
    <v-toolbar dark
                prominent
                src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
                dense elevation="24" rounded>


        <v-toolbar-title >
           <router-link  class="text-decoration-none myStyle" to="/">
               SPFORUM
           </router-link>

        </v-toolbar-title>

        <v-spacer></v-spacer>
        <AppNotification></AppNotification>

        <v-toolbar-items class="hidden-sm-and-down">
            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show">
                <v-btn>
                  {{item.title}}
                </v-btn>
            </router-link>


        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
import AppNotification from "./AppNotification";
export default {
    name: "ToolBar",
    components: {AppNotification},
    data() {
        return {
            items: [
                {title: 'Forum', to: '/forum', show: true},
                {title: 'Ask Question', to: '/ask', show: User.loggedIn()},
                {title: 'Category', to: '/category', show: User.admin()},
                {title: 'Login', to: '/login', show: !User.loggedIn()},
                {title: 'Logout', to: '/logout', show: User.loggedIn()},
            ]
        }
    },
    created() {
        EventBus.$on('logout', () =>{
            User.logout()
        })
    }
}
</script>

<style scoped>
.v-btn:not(.v-btn--round).v-size--default[data-v-b21dd180] {
    height: 50px;
    min-width: 64px;
    padding: 48px 47px;
    margin-right: 1rem;
    background-color: transparent;
    font-weight: bolder;
    font-size: 1rem;
}
.myStyle{
    color: white;font-family:Impact; font-size: 3.5rem
}
</style>
