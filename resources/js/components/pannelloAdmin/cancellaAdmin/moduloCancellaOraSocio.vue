<template>
<v-form >
    
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
          @keyup="filtraggio"
            v-model="filtro"
            label="Nome/Cognome"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
        <template>
                <v-col >
                    <v-card
                            class="pa-2"
                            outlined
                            tile
                    >
            
         <socio v-for="socio in prelevati" :key="socio.nome"
         :socio="socio"
        ></socio>
        </v-card>
                </v-col>
        </template>
    </v-row>
    
</v-form>

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
import Pippo from "./cancellaOraAdmin"
export default {
     components:{Pippo},
    data: function(){
        return{
      prenotazioni:{} 
          }
          filtro: '',
          prelevati: {},
    },
    methods:{
    filtraggio: function(){
      axios.post('/api/auth/users/'+this.filtro).then(
        res => {this.prelevati= res.data.data
        console.log(this.prelevati)
        }
      )
    }
  },
    created(){
        axios.post('/api/auth/users/'+'').then(res =>{
            this.prenotazioni = res.data.data
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
 