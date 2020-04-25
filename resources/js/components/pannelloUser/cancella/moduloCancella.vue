<template>
  <v-container>
      <v-row auto-grow >

          <v-col>

              data:

          </v-col>
          <v-col>
              ora:
          </v-col>
          <v-col>
              campo:
          </v-col>
          <v-col>
              utenti:
          </v-col>
          <v-col>
              Azione
          </v-col>


      </v-row>
      <v-row>
      <pippo
           v-for="(prenotazione,i) in prenotazioni" :key="prenotazione.id"
              :passaggio = "prenotazione"
              :indice = i >
        
      </pippo>
      </v-row>
   </v-container>  
</template>

<script>
import Pippo from "./singolaOra"
import CostiPrenotazioni from '../../../Helpers/Prenotazioni'
import AppStorage from "../../../Helpers/AppStorage";
export default {
     components:{Pippo},
    data: function(){
        return{
            credito: User.credito(),
            eta: User.eta(),
            stato: User.stato(),
            privilegi: User.privilegi(),
            id: User.id(),
            prenotazioni:{}
        }
    },
    created(){
        axios.get('/api/auth/prenotazioni').then(res =>{
            this.prenotazioni = res.data.data
            //console.log(res.data.data)
            console.log(this.stato)
            
        })

        EventBus.$on('cancellazioneOra', (passaggio) => {
            //alert(this.prenotazioni[passaggio].doppio)
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

            //console.log('/api/prenotazioni/'+this.prenotazioni[passaggio].id)
            axios.delete('/api/prenotazioni/'+this.prenotazioni[passaggio].id+'/'+User.id()+'/'+this.credito+'/'+this.privilegi).then(
                (res) => {
                    //location.reload()
                    this.prenotazioni.splice(passaggio, 1)
                    EventBus.$emit('cancellazioneOraRicarica', this.credito, this.privilegi)
                })
        })
        
    },
}
</script>