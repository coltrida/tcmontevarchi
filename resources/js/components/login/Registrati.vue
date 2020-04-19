<template>
    <v-container>
        <v-form @submit.prevent="signup">
            <v-text-field
                    v-model="form.nome"
                    label="Nome"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text mb-2" v-if="errors.nome">{{ errors.nome[0] }}</span>

            <v-text-field
                    v-model="form.cognome"
                    label="Cognome"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.cognome">{{ errors.cognome[0] }}</span>

            <v-text-field
                    v-model="form.username"
                    label="Username"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.username">{{ errors.username[0] }}</span>

            <v-text-field
                    v-model="form.telefono"
                    label="Telefono"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.telefono">{{ errors.telefono[0] }}</span>

            <v-text-field
                    v-model="form.anno"
                    label="Anno di nascita"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.anno">{{ errors.anno[0] }}</span>

            <v-text-field
                    v-model="form.email"
                    label="E-mail"
                    type="email"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

            <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"
                    required
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>

            <v-text-field
                    v-model="form.password_confirmation"
                    label="Conferma Password"
                    type="password"
                    required
            ></v-text-field>


            <v-btn
                    color="green"
                    type="submit"
            >
                Signup
            </v-btn>

            <div class="red--text" ><h1>{{ nonpresente }}</h1></div>

        </v-form>
    </v-container>

</template>

<script>
    export default {
        name: "signup",
        data(){
            return {
                form: {
                    nome: null,
                    cognome: null,
                    username: null,
                    telefono: null,
                    anno: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                errors: {},
                nonpresente:''
            }
        },

        created(){
            if(User.loggedIn()){
                this.$router.push('/')
            }
        },

        methods: {
            signup(){
                axios.post('/api/auth/signup', this.form)
                    .then(res => {
                            User.responseAfterLogin(res)
                            this.$router.push('/')
                    })
                    .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>