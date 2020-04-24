<template>
    <div>
        <v-list-item style="padding: 0 5px !important">
            <v-list-item-content style="height: 150px; align-items: start">
                <v-dialog v-model="dialog" persistent max-width="500px">
                    <template v-slot:activator="{ on }">

                            <v-btn v-if="!full" color="green" dark v-on="on" style="height: 50px">{{orario}} - {{orario+1}}</v-btn>

                            <v-btn v-else color="orange accent-2" dark style="height: 50px">{{orario}} - {{orario+1}}</v-btn>


                    </template>
                    <v-card v-if="(possoPrenotare || stato=='illimitati' || stato=='special' || stato=='admin')">
                        <v-card-title v-if="pren.doppio">
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title class="headline">Prenotazione per il: {{reversedGiorno}}</v-list-item-title>
                                    <v-list-item-title class="headline">Alle ore: {{orario}}</v-list-item-title>
                                    <v-list-item-title class="headline">Nel: {{campo}}</v-list-item-title>
                                    <v-list-item-title class="headline">{{pren.doppio}}</v-list-item-title>
                                    <v-list-item-title class="headline">Il tuo credito: € {{credito}}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card-title>
                        <v-card-title v-else>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title class="headline">Prenotazione per il: {{reversedGiorno}}</v-list-item-title>
                                    <v-list-item-title class="headline">Alle ore: {{orario}}</v-list-item-title>
                                    <v-list-item-title class="headline">Nel: {{campo}}</v-list-item-title>
                                    <v-list-item-title class="headline">Il tuo credito: € {{credito}}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>

                          <!--  <span class="headline">{{giorno}} - {{campo}} - {{orario}}</span>-->
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

                    <v-card v-else>
                        <v-card-title>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title class="headline">Non puoi prenotare in questa data</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card-title>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="dialog = false">Ok</v-btn>
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
    import CostiPrenotazioni from '../../Helpers/Prenotazioni'
    import AppStorage from "../../Helpers/AppStorage";
    export default {
        name: "Prenotazione",

        components:{PrenotazioneSingolo, PrenotazioneDoppio},

        props: ['prenotazioni', 'orario', 'campo', 'giorno', 'prenotazioneremota', 'possoPrenotare'],

        data(){
            return {
                full: false,
                dialog: false,
                credito: User.credito(),
                eta: User.eta(),
                stato: User.stato(),
                privilegi: User.privilegi(),
                id: User.id(),
                pren: {},
                sound: "http://soundbible.com/mp3/9mm%20Glock%2017-SoundBible.com-1873916083.mp3",
                scelta: 0
            }
        },

        computed: {
            reversedGiorno: function () {
                return this.giorno.split('-').reverse().join('-')
            },

        },

        created(){
            axios.post('/api/full', {
                dataprenotazione: this.giorno,
                campo: this.campo,
                oraon: this.orario
            })
                .then(res => {
                    //this.prenotazioni = JSON.parse(JSON.stringify(res.data.data))
                    if(res.data){
                        this.pren = res.data.data
                        //console.log(res.data.data.full)
                        this.full = res.data.data.full

                    }
                })

            Echo.channel('prenotazioneChannel')
                .listen('PrenotazioneEvent', (e) => {
                    //console.log(e.dataprenotazione)
                        if (this.giorno == e.prenotazione.datapren && this.campo == e.prenotazione.campo && this.orario == e.prenotazione.oraon) {
                            this.pren = e.prenotazione
                            this.full = e.prenotazione.full
                        }

                });
        },

        methods:{
            conferma(){
                this.dialog = false
                let tipoPrenotazione = this.pren.doppio ? this.pren.doppio : this.scelta
                let costoPrenotazione = 0

                /* ------------ ILLIMITATI ---------------*/
                if(this.stato == 'illimitati' || this.stato == 'admin'){
                    axios.post('/api/prenotazioni'+this.id,{
                        username: User.id(),
                        campo: this.campo,
                        dataprenotazione: this.giorno,
                        datamessaggio: this.giorno.split('-').reverse().join('-'),
                        oraon: this.orario,
                        doppio: tipoPrenotazione,
                        privilegi: this.privilegi,
                        credito: this.credito,
                    })
                        .then(res => {
                            this.playSound()
                            location.reload()
                        })
                } else
                /* ------------ GRATIS ---------------*/
                    if(this.stato == 'gratis'){
                        /* ------------ PAGA CON I PRIVILEGI ---------------*/
                        if (this.privilegi > 0){
                            this.privilegi--
                            AppStorage.storePrivilegi(this.privilegi)
                            axios.post('/api/prenotazioni/'+this.id,{
                                username: User.id(),
                                campo: this.campo,
                                dataprenotazione: this.giorno,
                                datamessaggio: this.giorno.split('-').reverse().join('-'),
                                oraon: this.orario,
                                doppio: tipoPrenotazione,
                                privilegi: this.privilegi,
                                credito: this.credito,
                            })
                                .then(res => {
                                    this.playSound()
                                    location.reload()
                                })
                        } else {
                            alert('Hai finito le ore gratis')
                            /* ------------ PAGA CON I SOLDI ---------------*/
                            /* ------------ UNDER ---------------*/
                            if (this.eta <= CostiPrenotazioni.etaUnder() ){
                                costoPrenotazione = CostiPrenotazioni.prezzoUnder()
                            } else
                            /* ------------ OVER ---------------*/
                                if (this.eta >= CostiPrenotazioni.etaOver() ){
                                    costoPrenotazione = CostiPrenotazioni.prezzoOver()
                                } else
                                /* ------------ SINGOLO ---------------*/
                                    if (tipoPrenotazione == 0 || tipoPrenotazione == 'S'){
                                        costoPrenotazione = CostiPrenotazioni.prezzoStandardSingolo()
                                    } else
                                        if (tipoPrenotazione == 1 || tipoPrenotazione == 'D'){
                                            costoPrenotazione = CostiPrenotazioni.prezzoStandardDoppio()
                                        }
                            if (this.credito >= costoPrenotazione){
                                this.credito = parseFloat(this.credito - costoPrenotazione)
                                AppStorage.storeCredito(this.credito)
                                axios.post('/api/prenotazioni/'+this.id,{
                                    username: User.id(),
                                    campo: this.campo,
                                    dataprenotazione: this.giorno,
                                    datamessaggio: this.giorno.split('-').reverse().join('-'),
                                    oraon: this.orario,
                                    doppio: tipoPrenotazione,
                                    privilegi: this.privilegi,
                                    credito: this.credito,
                                })
                                    .then(res => {
                                        this.playSound()
                                        location.reload()
                                    })
                            } else {
                                alert('Credito Insufficiente')
                            }
                        }
                } else
                    /* ------------ STANDARD ---------------*/
                    if(this.stato == 'normale'){
                        /* ------------ UNDER ---------------*/
                        if (this.eta <= CostiPrenotazioni.etaUnder() ){
                            costoPrenotazione = CostiPrenotazioni.prezzoUnder()
                        } else
                        /* ------------ OVER ---------------*/
                        if (this.eta >= CostiPrenotazioni.etaOver() ){
                            costoPrenotazione = CostiPrenotazioni.prezzoOver()
                        } else
                        /* ------------ SINGOLO ---------------*/
                        if (tipoPrenotazione == 0 || tipoPrenotazione == 'S'){
                            costoPrenotazione = CostiPrenotazioni.prezzoStandardSingolo()
                        } else
                        if (tipoPrenotazione == 1 || tipoPrenotazione == 'D'){
                            costoPrenotazione = CostiPrenotazioni.prezzoStandardDoppio()
                        }
                        if (this.credito >= costoPrenotazione){
                            this.credito = parseFloat(this.credito - costoPrenotazione)
                            AppStorage.storeCredito(this.credito)
                            axios.post('/api/prenotazioni/'+this.id,{
                                username: User.id(),
                                campo: this.campo,
                                dataprenotazione: this.giorno,
                                datamessaggio: this.giorno.split('-').reverse().join('-'),
                                oraon: this.orario,
                                doppio: tipoPrenotazione,
                                privilegi: this.privilegi,
                                credito: this.credito,
                            })
                                .then(res => {
                                    this.playSound()
                                    location.reload()
                                })
                        } else {
                            alert('Credito Insufficiente')
                        }
                    }
            },

            playSound(){
                let alert = new Audio(this.sound)
                alert.play()
            },
        }
    }
</script>

<style scoped>

</style>