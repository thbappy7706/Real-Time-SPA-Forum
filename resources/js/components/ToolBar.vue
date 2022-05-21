<template>
    <v-toolbar dense elevation="24" rounded>


        <v-toolbar-title style="color: #04414d;font-weight: bold">SPA FORUM</v-toolbar-title>


        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show">
                <v-btn flat>
                  {{item.title}}
                </v-btn>
            </router-link>


        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
export default {
    name: "ToolBar",
    data() {
        return {
            items: [
                {title: 'Forum', to: '/forum', show: true},
                {title: 'Ask Question', to: '/ask', show: User.loggedIn()},
                {title: 'Category', to: '/category', show: User.loggedIn()},
                {title: 'Login', to: '/login', show: !User.loggedIn()},
                {title: 'Logout', to: '/logout', show: User.loggedIn()},
            ]
        }
    }
}
</script>

<style scoped>
.v-btn:not(.v-btn--round).v-size--default {
    height: 50px;
    min-width: 64px;
    padding: 5px 47px;
    margin-right: 1rem;
}
</style>
