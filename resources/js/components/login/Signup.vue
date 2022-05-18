<template>
    <v-container>
        <v-form ref="form" @submit.prevent="Signup">
            <v-text-field
                v-model="form.name"
                label="Name"
                type="text"
                required
            ></v-text-field>


            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
                required
            ></v-text-field>

            <v-text-field
                v-model="form.password"
                type="password"
                label="Password"
                required
            ></v-text-field>

            <v-text-field
                v-model="form.password_confirmation"
                type="password"
                label="Password Confirmation"
                required
            ></v-text-field>


            <div class="text-center">
                <v-btn
                    color="green" type="submit">
                    Signup
                </v-btn>

                <router-link to="/login">
                    <v-btn >
                        Login
                    </v-btn>
                </router-link>

            </div>
        </v-form>

    </v-container>

</template>

<script>
export default {
    name: "Signup",
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }
    },
    methods: {
        signup() {
            axios.post(`/api/auth/signup`, this.form)
                .then(res => User.responseAfterLogin(res))
        }
    },

}
</script>

<style scoped>

</style>
