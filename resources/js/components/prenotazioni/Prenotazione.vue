<template>
    <div>
        <v-list-item>
            <v-list-item-content style="height: 130px; align-items: start">
                <v-dialog v-model="dialog" persistent max-width="600px">
                    <template v-slot:activator="{ on }">
                        <v-btn color="green" dark v-on="on" style="height: 50px">{{orario}} - {{orario+1}}</v-btn>
                    </template>
                    <v-card>
                        <v-card-title v-if="pren.doppio">
                            <span class="headline">{{giorno}} - {{campo}} - {{orario}} - {{pren.doppio}}</span>
                        </v-card-title>
                        <v-card-title v-else>
                            <span class="headline">{{giorno}} - {{campo}} - {{orario}}</span>
                        </v-card-title>
                        <v-card-text v-if="!pren.doppio">
                            <v-container>
                                <v-row>
                                    <v-radio-group v-model="scelta" row>
                                        <v-radio label="Singolo" value="0"></v-radio>
                                        <v-radio label="Doppio" value="1"></v-radio>
                                    </v-radio-group>
                                </v-row>
                            </v-container>
                            <small>*scelta obbligatoria</small>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="dialog = false">Annulla</v-btn>
                            <v-btn color="blue darken-1" text @click="conferma">Conferma</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

                <div v-for="prenotazione in prenotazioni" :key="prenotazione.id">
                    <div v-if="prenotazione.oraon == orario">
                        <prenotazione-singolo
                                v-if="prenotazione.doppio == 'S'"
                                :prenotazione="prenotazione"
                        ></prenotazione-singolo>
                        <prenotazione-doppio
                                v-else
                                :prenotazione="prenotazione"
                        ></prenotazione-doppio>
                    </div>
                </div>

            </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>
    </div>
</template>

<script>
    import PrenotazioneSingolo from './PrenotazioneSingolo'
    import PrenotazioneDoppio from './PrenotazioneDoppio'
    export default {
        name: "Prenotazione",

        components:{PrenotazioneSingolo, PrenotazioneDoppio},

        props: ['prenotazioni', 'orario', 'campo', 'giorno'],

        data(){
            return {
                full: false,
                dialog: false,
                pren: {},
                scelta: 0
            }
        },

        created(){
            //console.log(this.campo)
            //EventBus.$once('prenotazioneFull', (valore) => {
                //console.log(this.orario+'-'+ this.campo +'-'+ this.giorno)
                //this.full = true
                //console.log(valore)
            //})

            axios.post('/api/full', {
                dataprenotazione: this.giorno,
                campo: this.campo,
                oraon: this.orario
            })
                .then(res => {
                    //this.prenotazioni = JSON.parse(JSON.stringify(res.data.data))
                    if(res.data){
                        this.pren = res.data.data
                    }
                })
        },

        methods:{
            prenota(){

            },

            conferma(){
                this.dialog = false
                axios.post('/api/prenotazioni',{
                    username: User.name(),
                    campo: this.campo,
                    dataprenotazione: this.giorno,
                    oraon: this.orario,
                    doppio: this.pren.doppio ? this.pren.doppio : this.scelta,
                })
                    .then(res => location.reload())
            }
        }
    }
</script>

<style scoped>

</style>