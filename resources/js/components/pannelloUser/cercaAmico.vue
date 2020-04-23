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
              
</template>

<script>
import Socio from './listaSoci/Socio'
export default {
  components:{Socio},
  data: function(){
    return{
      filtro: '',
      prelevati: {}
    }
  },
  created(){
    this.filtraggio()
  },
  methods:{
    filtraggio: function(){
      axios.post('/api/soci/visualizza/'+this.filtro).then(
        res => {this.prelevati= res.data.data
        console.log(this.prelevati)
        }
      )
    }
  }
}
</script>