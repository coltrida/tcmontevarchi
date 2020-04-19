<template>
  <!-- <v-app id="inspire"> -->
    <v-card>
      <v-card-title >
        Cerca un Socio
      </v-card-title>
      <v-card-text>
        Scrivi il nome o cognome nel campo di ricerca qui sotto
      </v-card-text>
      <v-card-text>
        <v-autocomplete
          v-model="model"
          :items="items"
          :loading="isLoading"
          :search-input.sync="search"
          color="white"
          hide-no-data
          hide-selected
          item-text="cognome" 
          item-value="cognome"
          placeholder="Inserisci nome/cognome"
          return-object
        ></v-autocomplete>
      </v-card-text>
        <v-divider></v-divider>
      <v-expand-transition-group>
        <v-list v-if="model" class="red lighten-3">
          <v-list-item
            v-for="(field, i) in valori"
            :key="i"
          >
          <socio>
            <v-list-item-content>
              <v-list-item-title v-text="field.nome"></v-list-item-title>
              <v-list-item-subtitle v-text="field.cognome"></v-list-item-subtitle>
            </v-list-item-content>
          </socio>
          </v-list-item>
        </v-list>
         
      </v-expand-transition-group>
     <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          :disabled="!model"
          color="grey darken-3"
          @click="model = null"
        >
          Clear
          <v-icon right>mdi-close-circle</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card> 
</template>

<script>
    import Socio from './listaSoci/Socio'

export default {
 data: () => ({
    descriptionLimit: 60,
    valori: [],
    isLoading: false,
    model: null,
    search: null,
    soci: {},
    totSoci: 0

  }),
  //nella computed si gestisce l'input dei caretteri
  computed: {
    fields () {
      if (!this.model) return []

      return Object.keys(this.model).map(key => {
        return {
          key,
          value: this.model[key] || 'n/a',
        }
      })
    },
    //dentro items si controlla l'input dell'utente
    items () {
      return this.valori.map(entry => {
        const cognome = entry.cognome.length > this.descriptionLimit
          ? entry.cognome.slice(0, this.descriptionLimit) + '...'
          : entry.cognome

        return Object.assign({}, entry, { cognome })
      })
    },
  },
 watch: {
    search (val) {
      
      // Items have already been loaded
      if (this.items.length > 0) return

      // Items have already been requested
      if (this.isLoading) return

      this.isLoading = true

      // Lazily load input items
      axios.get('/api/soci/visualizza'+this.search)
        //.then(res => {//res.json()
         //console.log(res)})
        .then(res => {
           
          //si catturano i dati e si mettono nell'array
          this.valori = res.data.data
          
          console.log(this.valori)
        })
        .catch(err => {
          console.log(err)
        })
        .finally(() => (this.isLoading = false))
    },
  },
   
         
}
</script>