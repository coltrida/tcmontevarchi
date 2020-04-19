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
                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                            v-model="form.password"
                            label="Password"
                            :type="show2 ? 'text' : 'password'"
                            @click:append="show2 = !show2"
                            required
                    ></v-text-field>
                    <span class="red--white caption" style="padding:0; margin:0">Password Dimenticata</span>

                </v-col>

                <v-btn
                        color="green"
                        type="submit"
                        class="mt-3"
                >
                    Login
                </v-btn>

                <router-link to="/registrati">
                    <v-btn
                            color="indigo"
                            class="mt-3 ml-2"
                    >
                        Registrati
                    </v-btn>
                </router-link>

            </v-row>

        </v-container>
    </v-form>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                show2: false,
                dimenticata: 'www.example.com/page',
                form: {
                    email:null,
                    password:null
                },
            }
        },

        methods:{
            login(){
               User.login(this.form)
            },

            passwordDimenticata(){
                console.log('ciao')
            }
        }
    }
</script>

<style scoped>

</style>