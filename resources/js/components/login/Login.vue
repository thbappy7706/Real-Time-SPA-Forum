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

            </div>
        </v-form>

    </v-container>


</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            form : {
                email : null,
                password : null
            }
        }
    },
    methods:{
        login(){
            axios.post(`/api/auth/login`, this.form)
            .then(res=> console.log(res.data))
            .catch(error=> console.log(error.data))
        }

    }
}
</script>

<style scoped>

</style>
