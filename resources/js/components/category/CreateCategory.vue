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
        }
    },
    methods: {
        createCategory() {
            axios.post(`/api/category`, this.form)
                .then(res => this.$router.push(res.data.path))
                .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

<style scoped>

</style>
