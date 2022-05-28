<template>
    <v-container>
        <v-form @submit.prevent="createCategory">

            <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
            <v-text-field
                label="Category Name"
                v-model="form.name"
                type="text"
                required
            ></v-text-field>

            <v-btn
                color="green"
                type="submit"
            >Create
            </v-btn>
        </v-form>


        <v-card class="mt-10">
            <v-toolbar color="indigo" dark dense>
                <v-toolbar-title>Category</v-toolbar-title>
            </v-toolbar>

            <v-list>
                <div v-for="(category,index) in categories" :key="category.id">
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title>{{category.name}}</v-list-item-title>
                        </v-list-item-content>

                        <v-list-item-icon>
                            <v-btn class="mx-2" small fab>
                                <v-icon color="cyan" dark>mdi-pencil</v-icon>
                            </v-btn>
                            <v-btn class="mx-2" small fab @click="destroyCategory(category.slug,index)">
                                <v-icon color="red" dark>mdi-delete</v-icon>
                            </v-btn>
                        </v-list-item-icon>

                    </v-list-item>
                    <v-divider></v-divider>
                </div>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: "CreateCategory",
    data() {
        return {
            form: {
                name: null,
            },
            errors: {},
            categories: {}
        }
    },

    created() {
        axios.get(`/api/category`)
            .then(res => this.categories = res.data.data)
            .catch(error => (this.categories = error.response.data.errors));
    },
    methods: {
        createCategory() {
            axios.post(`/api/category`, this.form)
                .then(res => {
                    this.categories.unshift(res.data)
                    this.form.name = null
                })
                .catch(error => this.errors = error.response.data.error)
        },
        destroyCategory(slug, index) {
            axios.delete(`/api/category/${slug}`)
                .then(res => this.categories.splice(index, 1))
                .catch(error => console.log(error.response.data))
        }
    }
}
</script>

<style scoped>

</style>
