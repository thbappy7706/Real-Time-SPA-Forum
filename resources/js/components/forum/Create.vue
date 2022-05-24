<template>
    <v-container>
        <v-form @submit.prevent="createQuestion">

            <span class="red--text" v-if="errors.title">{{ errors.title[0] }}</span>
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
                required
            ></v-text-field>

            <span class="red--text" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
            <v-select
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                autocomplete
            ></v-select>

            <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>
            <vue-simplemde v-model="form.body" ref="markdownEditor"/>

            <v-btn
                color="green"
                type="submit"
            >Create
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            form: {
                title: null,
                category_id: null,
                body: null
            },
            categories: {},
            errors: {}
        }
    },
    created() {
        axios.get(`/api/category`)
            .then(res => this.categories = res.data.data)
            .catch(error => (this.categories = error.response.data.errors));
    },

    methods: {
        createQuestion() {
            axios.post(`/api/category`, this.form)
                .then(res => console.log(res.data))
        }
    },
}
</script>

<style scoped>
@import '~simplemde/dist/simplemde.min.css';
</style>
