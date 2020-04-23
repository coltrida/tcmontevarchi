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
export default {
     components:{Pippo},
    data: function(){
        return{
      prenotazioni:{
         }  }
    },
    created(){
        axios.get('/api/auth/prenotazioni').then(res =>{
            this.prenotazioni = res.data
            console.log(this.prenotazioni)
            
        })

        EventBus.$on('cancellazione', (passaggio) => {
            //console.log('/api/prenotazioni/'+this.prenotazioni[passaggio].id)
            axios.delete('/api/prenotazioni/'+this.prenotazioni[passaggio].id).then(
                () => {
                    this.prenotazioni.splice(passaggio,1)
                })
        })
        
    },
}
</script>