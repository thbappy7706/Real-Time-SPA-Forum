<template>
    <v-container>
        <v-form ref="form" @submit.prevent="login">
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


            <div class="text-center">
                <v-btn
                    color="green" type="submit">
                    Login
                </v-btn>

                <router-link to="/signup ">
                    <v-btn>
                        Sign Up
                    </v-btn>
                </router-link>


            </div>
        </v-form>

    </v-container>


</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            form: {
                email: null,
                password: null
            }
        }
    },
    created() {
    if(User.loggedIn()){
      this.$router.push({name:'forum'})
    }
    },
    methods: {
        login() {
            User.login(this.form)
            // this.$router.push({name: 'forum'})
        }

    }
}
</script>

<style scoped>

</style>
