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

                    <span style="padding:0; margin:0" v-if="errors">
                            <div color="primary" style="font-size: 12px;">{{errors.error}}</div>
                    </span>
                </v-col>

                <v-col
                        cols="12"
                        md="4"
                        id="input-usage"
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

                    <span style="padding:0; margin:0">
                        <v-dialog v-model="dialog" persistent max-width="430">
                          <template v-slot:activator="{ on }">
                            <div color="primary" dark v-on="on" style="font-size: 10px; cursor: pointer; ">Password dimenticata</div>
                          </template>
                          <v-card>
                            <v-card-title class="headline">Inserisci la tua e-mail:</v-card-title>
                            <v-card-text>Ti invieremo un link in posta per re-impostare la password</v-card-text>
                              <v-col>
                                  <v-text-field
                                          placeholder="Placeholder"
                                          v-model="inviamail"
                                  ></v-text-field>
                                </v-col>
                            <v-card-actions>
                              <v-spacer></v-spacer>
                              <v-btn color="green darken-1" text @click="dialog = false">Chiudi</v-btn>
                              <v-btn color="green darken-1" text @click="passwordDimenticata">Invia</v-btn>
                            </v-card-actions>
                          </v-card>
                        </v-dialog>
                    </span>

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
                dialog: false,
                dimenticata: 'www.example.com/page',
                inviamail:'',
                errors:null,
                form: {
                    email:null,
                    password:null
                },
            }
        },

        methods:{
            login(){
               //User.login(this.form)
                axios.post('/api/auth/login', this.form)
                    .then(res => User.responseAfterLogin(res))
                    .catch(error => this.errors = error.response.data)
                //this.errors = error.response.data
            },

            passwordDimenticata(){
                this.dialog = false
                axios.get('/api/dimenticata/'+this.inviamail)
                    .then(() => {
                        this.inviamail = ''
                        alert('posta inviata')
                    })
            }
        }
    }
</script>

<style>
    .theme--dark.v-messages {
        display:none !important;
    }
    .v-text-field__details{
        display:none !important;
    }
</style>