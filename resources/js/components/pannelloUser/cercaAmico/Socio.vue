<template>
    <v-card
            class="mx-auto mb-5"
            max-width="250"
    >
        <v-img
                :src="socio.foto"
                height="250px"
                width="250px"
        ></v-img>

        <v-card-title style="font-size: 15px">
            {{ socio.cognome }} {{ socio.nome }}
        </v-card-title>

        <v-card-subtitle>
            Anno di nascita: {{ socio.anno }}
        </v-card-subtitle>

        <v-card-actions>
            <v-btn
                    color="purple"
                    text
            >
                Invita
            </v-btn>

            <v-dialog v-model="dialog" persistent max-width="600">
                <template v-slot:activator="{ on }">
                    <v-btn
                            text
                            v-on="on"
                            v-if="socio.telegram"
                    >
                        <v-icon dark left>mdi-telegram</v-icon>Telegram
                    </v-btn>
                </template>
                <v-card>
                    <v-card-title class="headline">Invia un messaggio</v-card-title>
                    <v-textarea
                            class="mx-3"
                            solo
                            rows="4"
                            v-model="testoMessaggio"
                            label="Testo messaggio"
                    ></v-textarea>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="indigo" text @click="dialog = false">Cancella</v-btn>
                        <v-btn color="green darken-1" text @click="invia">Invia</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>


        </v-card-actions>

    </v-card>
</template>

<script>
    export default {
        name: "Socio",

        props: ['socio'],

        data: () => ({
            dialog: false,
            testoMessaggio:''
        }),

        created(){
            console.log(this.socio);
        },

        methods:{
            invia(){
                axios.post(`/api/inviaMessaggioSocio/${this.socio.id}`,{
                    testo: this.testoMessaggio,
                })
                    .then(() => {
                        this.testoMessaggio = ''
                        this.dialog = false
                        alert('messaggio inviato')
                    })
            }
        }
    }
</script>

<style scoped>

</style>