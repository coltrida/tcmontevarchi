<template>
  <v-container>
      <v-row>
      <pippo
           v-for="prenotazione in prenotazioni" :key="prenotazione.id"
              :passaggio = "prenotazione">
        
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
      username1: '',
      username2: '',
      username3: '',
      username4: '',
      campo: '',
      dataprenotazione: '',
      oraon: '',
      full: '',
      doppio: ''
        }  }
    },
    created(){
        axios.get('/api/auth/prenotazioni').then(res =>{
            this.prenotazioni = res.data
            
        })
    },

    mounted() {
        EventBus.$on('cancellazione', (passaggio) => {
            console.log(passaggio)
        })
    }
}
</script>