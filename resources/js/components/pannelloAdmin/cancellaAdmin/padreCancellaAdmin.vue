<template>
<v-container>
    <div v-if="cambiaComponent">   
      <v-form >
    
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
        
             <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center" >

                  <v-col>Nome:</v-col>
                  <v-col>Cognome:</v-col>
                  <v-col>Credito:</v-col>
                  <v-col>Anno:</v-col>
                  <v-col>Azione:</v-col>
              </v-row>

            <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
        
                <v-col >
                     <canc-visualizzazioni v-for="socio in prelevati" :key="socio.id"
                        :socio="socio">
                      </canc-visualizzazioni>
                </v-col>
            </v-row>
    
      </v-form>
    </div>

    <div v-else> 
      <v-row>
        <v-col>
      <canc-prenotazioni
           v-for="(prenotazione,i) in prenotazioni" :key="prenotazione.id"
              :pren = "prenotazione"
              :indice = 'i' >
        
      </canc-prenotazioni>
        </v-col>
      </v-row>
    </div>
</v-container>
</template>

<script>
import CancVisualizzazioni from "./cancellaVisualizzaAdmin"
import CancPrenotazioni from "./cancellaPrenAdmin"
export default {
     components:{CancVisualizzazioni, CancPrenotazioni},
    data: function(){
        return{
      prenotazioni:{}, 
      filtro: '',
      prelevati: {},
      cambiaComponent: true
        }
    },
    methods:{
    filtraggio: function(){
      axios.post('/api/auth/users/'+this.filtro).then(
        res => {this.prelevati= res.data
        //console.log(res.data)
        }
      )
    }
  },
    created(){

      EventBus.$on('cancellazione',(id,change) =>{
        this.cambiaComponent = change;
        
        axios.post('/api/auth/prenotazioniUtenteSelezionato/', {utente: id} ).then(
              res => this.prenotazioni = res.data.data,
              console.log(this.prenotazioni)
         )}
      ),
    EventBus.$on('cancellaPren', (id, i) => {
             
            axios.delete('/api/prenotazioni/'+id).then(
                (i) => {
                    this.prenotazioni.splice(i ,1)
                })
        })
        
    }
    

             
    
}
</script>
 