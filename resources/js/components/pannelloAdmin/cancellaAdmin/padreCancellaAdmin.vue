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
import CostiPrenotazioni from '../../../Helpers/Prenotazioni'
import AppStorage from "../../../Helpers/AppStorage";

export default {
     components:{CancVisualizzazioni, CancPrenotazioni},
    data: function(){
        return{
      prenotazioni:{}, 
      filtro: '',
      prelevati: {},
      cambiaComponent: true,
      idUtente: '',
      credito: User.credito(),
      eta: User.eta(),
      stato: User.stato(),
      privilegi: User.privilegi(),
      id: User.id()
        }
    },
    methods:{
    filtraggio: function(){
      axios.post('/api/auth/users/'+this.filtro).then(
        res => {this.prelevati= res.data.data
        //console.log(res.data.data)
        }
      )
    }
  },
    created(){

      EventBus.$on('cancellazione',(idsel,change) =>{
        this.cambiaComponent = change;
        this.idUtente= idsel;
        console.log(idsel)
        axios.get('/api/auth/prenotazioniUtenteSelezionato/'+idsel ).then(
              res => this.prenotazioni = res.data.data,
              //console.log(this.prenotazioni)
         )}
      ),
    EventBus.$on('cancellaPren', (i, id) => {
             let costoPrenotazione = 0
            if(this.stato == 'gratis'){
                /* ------------ RICARICA  I PRIVILEGI ---------------*/
                if (this.privilegi < 7){
                    this.privilegi++
                    AppStorage.storePrivilegi(this.privilegi)
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
                if (this.prenotazioni[passaggio].doppio == 'S'){
                    costoPrenotazione = CostiPrenotazioni.prezzoStandardSingolo()
                } else
                if (this.prenotazioni[passaggio].doppio == 'D'){
                    costoPrenotazione = CostiPrenotazioni.prezzoStandardDoppio()
                }
                    //alert(this.credito+' + '+costoPrenotazione)
                    this.credito = parseFloat(parseFloat(this.credito) + parseFloat(costoPrenotazione)).toFixed(2)
                    AppStorage.storeCredito(this.credito)
            }

            axios.delete('/api/prenotazioni/'+id+'/'+this.idUtente+'/'+this.credito+'/'+this.privilegi).then(
                () => {
                    location.reload()
                })
        })
        
    }
    


    }
</script>
 