<template>
    <v-form @submit.prevent="login">
        <v-container>
            <v-row>
                <v-col
                        cols="12"
                        md="4"
                >
                    <v-text-field
                            dark
                            v-model="form.email"
                            label="E-mail"
                            type="email"
                            required
                    ></v-text-field>
                </v-col>

                <v-col
                        cols="12"
                        md="4"
                >
                    <v-text-field
                            dark
                            v-model="form.password"
                            label="Password"
                            type="password"
                            required
                    ></v-text-field>
                </v-col>

                <v-btn
                        color="green"
                        type="submit"
                        class="mt-3"
                >
                    Login
                </v-btn>

            </v-row>
        </v-container>
    </v-form>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                form: {
                    email:null,
                    password:null
                },
            }
        }

        /*created(){
            if(User.loggedIn()){
                this.$router.push('/')
            }
        }*/,

        methods:{
            login(){
               User.login(this.form)
            }
        }
    }
</script>

<style scoped>

</style>