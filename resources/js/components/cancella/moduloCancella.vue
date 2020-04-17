<template>
  <v-container>
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
            
        })
    },
    mounted(){
        EventBus.$on('cancellazione', (passaggio) => {
            console.log('/api/prenotazioni/'+this.prenotazioni[passaggio].id)
             axios.delete('/api/prenotazioni/'+this.prenotazioni[passaggio].id).then(() => 
 //this.prenotazioni = this.prenotazioni.splice(passaggio,1)
            axios.get('/api/auth/prenotazioni').then(res =>{
            this.prenotazioni = res.data
            
        })

        )}
        )
        }
     
    
}
</script>