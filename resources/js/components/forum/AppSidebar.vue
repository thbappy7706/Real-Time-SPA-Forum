<template>
    <v-card>
        <v-toolbar color="cyan" dark dense class="mt-2">
            <v-toolbar-title>Category</v-toolbar-title>
        </v-toolbar>
        <v-list>
       <v-list-item-content class="ml-5" v-for="category in categories" :key="category.id">
           <v-list-item-title>{{category.name}}</v-list-item-title>
       </v-list-item-content>
        </v-list>
    </v-card>
</template>

<script>
export default {
    name: "AppSidebar",
    data(){
        return{
            categories:{},
        }
    },
    created() {
        axios.get(`/api/category`)
            .then(res => this.categories = res.data.data)
            .catch(error => (this.categories = error.response.data.errors));
    },
}
</script>

<style scoped>

</style>
