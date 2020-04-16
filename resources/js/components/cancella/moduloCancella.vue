<template>
  <v-container>
      <v-row>
      <singola-ora>
          <div v-for="prenotazione in prenotazioni" :key="prenotazione.id"
              :passaggio = "prenotazione">
          </div>

      </singola-ora>
      </v-row>
   </v-container>  
</template>

<script>
import SingolaOra from "./singolaOra"
export default {
     components:{SingolaOra},
    data:{
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
        }  
    },
    created(){
        axios.get('/api/auth/prenotazioni').then(res =>{
            
            this.prenotazioni = res.data
            
        })
    },
}
</script>