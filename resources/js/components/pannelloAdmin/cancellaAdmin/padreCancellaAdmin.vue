<template>
    <v-container>
        <div v-if="cambiaComponent">
            <v-form>

                <v-row>
                    <v-col cols="12" md="4">
                        <v-text-field
                                @keyup="filtraggio"
                                v-model="filtro"
                                label="Nome/Cognome"
                                required>
                        </v-text-field>
                    </v-col>
                </v-row>

                <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">

                    <v-col>Nome:</v-col>
                    <v-col>Cognome:</v-col>
                    <v-col>Credito:</v-col>
                    <v-col>Anno:</v-col>
                    <v-col>Azione:</v-col>
                </v-row>

                <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">

                    <v-col>
                        <canc-visualizzazioni v-for="socio in prelevati" :key="socio.id"
                                              :socio="socio">
                        </canc-visualizzazioni>
                    </v-col>
                </v-row>

            </v-form>
        </div>

        <div v-else>
            <v-list-item>
            <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
                <v-col>Data:</v-col>
                <v-col>Campo:</v-col>
                <v-col>Ora:</v-col>
                <v-col>Tipo:</v-col>
                <v-col>Partecipanti:</v-col>
                <v-col>Azione:</v-col>
            </v-row>
            </v-list-item>

                    <canc-prenotazioni
                            v-for="(prenotazione,i) in prenotazioni" :key="prenotazione.id"
                            :pren="prenotazione"
                            :indice='i'>
                    </canc-prenotazioni>

        </div>
    </v-container>
</template>

<script>
    import CancVisualizzazioni from "./cancellaVisualizzaAdmin"
    import CancPrenotazioni from "./cancellaPrenAdmin"
    import CostiPrenotazioni from "../../../Helpers/Prenotazioni"

    export default {
        components: {CancVisualizzazioni, CancPrenotazioni},

        data: function () {
            return {
                prenotazioni: {},
                utenteSelezionato:{},
                filtro: '',
                prelevati: {},
                costoprenotazione: 0,
                cambiaComponent: true
            }
        },

        methods: {
            filtraggio: function () {
                axios.post('/api/auth/users/' + this.filtro).then(
                    res => {
                        this.prelevati = res.data.data
                        //console.log(res.data)
                    }
                )
            }
        },

        created() {
            EventBus.$on('visualizzaPrenotazioniUtenteSelezionato', (socio, change) => {
                this.cambiaComponent = change;
                this.utenteSelezionato = socio;
                //console.log(this.utenteSelezionato)
                axios.get('/api/auth/prenotazioniUtenteSelezionato/'+this.utenteSelezionato.id
                    ).then( res => this.prenotazioni = res.data.data)
                }
            ),

            EventBus.$on('cancellaPren', (prenotazioneSelezionata, i) => {
//console.log(prenotazioneSelezionata.id + ' - '+ i)
                /* ----------- utente gratis ----------- */
                if(this.utenteSelezionato.stato == 'gratis'){

                    /* ----------- ha meno di 7 privilegi - ricarica privilegi ----------- */
                    if(this.utenteSelezionato.privilegi < 7){
                        this.utenteSelezionato.privilegi = this.utenteSelezionato.privilegi + 1
                    }

                } else {
                    /* ----------- utente standard ----------- */
                    if(this.utenteSelezionato.stato = 'normale'){
                        /* ------------ UNDER ---------------*/
                        if (this.utenteSelezionato.eta <= CostiPrenotazioni.etaUnder() ){
                            this.costoPrenotazione = CostiPrenotazioni.prezzoUnder()
                        } else
                        /* ------------ OVER ---------------*/
                        if (this.utenteSelezionato.eta >= CostiPrenotazioni.etaOver() ){
                            this.costoPrenotazione = CostiPrenotazioni.prezzoOver()
                        } else
                        /* ------------ SINGOLO ---------------*/
                        if (prenotazioneSelezionata.doppio == 'S'){
                            this.costoPrenotazione = CostiPrenotazioni.prezzoStandardSingolo()
                        } else
                        /* ------------ DOPPIO ---------------*/
                        if (prenotazioneSelezionata.doppio == 'D'){
                            this.costoPrenotazione = CostiPrenotazioni.prezzoStandardDoppio()
                        }
                        this.utenteSelezionato.credito = parseFloat(parseFloat(this.utenteSelezionato.credito) + parseFloat(this.costoPrenotazione)).toFixed(2)
                    }
                }
                axios.delete('/api/prenotazioni/' + prenotazioneSelezionata.id + '/' + this.utenteSelezionato.id + '/' + this.utenteSelezionato.credito + '/' + this.utenteSelezionato.privilegi)
                    .then((res) => {
                        /*if(res.data = 1){
                            this.prenotazioni.splice(i, 1)
                        } else {
                            location.reload()
                        }*/
                        axios.get('/api/auth/prenotazioniUtenteSelezionato/'+this.utenteSelezionato.id)
                            .then( res => {
                                alert('ora eliminata')
                                this.prenotazioni = res.data.data
                        })
                            .catch(error => alert('Errore'))

                    })
            })

        }


    }
</script>
 