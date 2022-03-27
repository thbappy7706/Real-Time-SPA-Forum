<template>
    <v-toolbar dense elevation="24" rounded>

        <v-toolbar-title style="color: #04414d;font-weight: bold">SPA FORUM</v-toolbar-title>

        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <v-btn flat>
                Forum
            </v-btn>


            <v-btn flat>
                Ask Question
            </v-btn>


            <v-btn flat>
         Category
            </v-btn>



            <v-btn flat>
                Login
            </v-btn>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
export default {
    name: "ToolBar"
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
