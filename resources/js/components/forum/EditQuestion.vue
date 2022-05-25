<template>
    <v-container>

        <v-form @submit.prevent="updateQuestion">
            <span class="red--text" v-if="errors.title">{{ errors.title[0] }}</span>
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
                required
            ></v-text-field>

            <!--        <span class="red&#45;&#45;text" v-if="errors.category_id">{{ errors.category_id[0] }}</span>-->
            <!--        <v-select-->
            <!--            :items="categories"-->
            <!--            item-text="name"-->
            <!--            item-value="id"-->
            <!--            v-model="form.category_id"-->
            <!--            label="Category"-->
            <!--            autocomplete-->
            <!--        ></v-select>-->

            <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>
            <vue-simplemde v-model="form.body" ref="markdownEditor"/>

            <v-card-actions>
                <v-btn class="mx-3" fab type="submit">
                    <v-icon color="teal" dark>mdi-update</v-icon>
                </v-btn>

                <v-btn class="mx-3" fab @click="cancelEditing">
                    <v-icon color="black" dark>mdi-cancel</v-icon>
                </v-btn>
            </v-card-actions>
        </v-form>


    </v-container>
</template>

<script>
export default {
    name: "EditQuestion",
    props: ['data'],
    data() {
        return {
            form: {
                title: null,
                // category_id: null,
                body: null
            },
            // categories: {},
            errors: {}
        }
    },
    created() {
        this.form = this.data
    },

    methods: {
        cancelEditing() {
            EventBus.$emit('cancelEditing')
        },
        updateQuestion() {
            axios.patch(`/api/question/${this.data.slug}`, this.form)
                .then(res => this.cancelEditing())

        }
    }

}
</script>

<style scoped>

</style>
