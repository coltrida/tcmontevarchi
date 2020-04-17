<template>
  <v-container>
      <v-row>
      <pippo
           v-for="prenotazione in prenotazioni"
           :key="prenotazione.id"
           :passaggio="prenotazione">
        
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
        })

    },
    mounted(){
         console.log('ciao')
        EventBus.$on('cancellazione', (variabile) => {
            // this.prenotazioni = passaggio.splice(passaggio.id,1)})
            //console.log(variabile);
        })
    }
}
</script>