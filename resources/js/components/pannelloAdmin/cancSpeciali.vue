<template>
<div>
    <v-form @submit.prevent="inviaForm">
        <div id="titolo">
           <v-row><h1>Cancellazioni Speciali</h1></v-row>
        </div>
        <label for="inizio">Da</label>
          <input type="date" id="inizio" v-model="calendInizio"
            min="2020-01-01" max="2020-12-31">
        <label for="fine">Da</label>
          <input type="date" id="fine" v-model="calendFine"
            min="2020-01-01" max="2020-12-31">
        <v-row align="center">
          <v-col class="d-flex" cols="12" sm="6">
            <v-select 
            v-model="selezionato"
            :items="campi"
            item-value="campo"
            item-text="campo"
            label="Seleziona campo"
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="1">
           <v-subheader>Orario inizio</v-subheader>
          </v-col>
          <v-col cols="2">
          <v-text-field
          v-model="oraIn"
          label="ora"
          type="time"
          suffix=""
          ></v-text-field>
        </v-col>
       </v-row>
       <v-row>
        <v-col cols="1">
        <v-subheader>Orario fine</v-subheader>
      </v-col>
      <v-col cols="2">
        <v-text-field
            v-model="oraOut"
          label="ora"
          type="time"
          suffix=""
        ></v-text-field>
      </v-col>
    </v-row>
      <v-btn color="warning" type="submit">Invia</v-btn>
    </v-form>
    
    <v-btn @click="prova"></v-btn>
    </div>

</template>

<script>
export default {
    data: () => ({
        selezionato: '',
        calendInizio:'',
        calendFine:'',
        oraIn:'',
        oraOut:'',
      campi: [  {
                
                campo: "campo1",
                 
              },
              {
                
                campo: "campo2",
                 
              },
              {
                
                campo: "campo3",
                 
              },
              {
                
                campo: "campo4",
                 
              },],
    }),
    methods: {
        prova (){
            console.log(this.oraIn);
        },
  inviaForm () {
      
    let data = { campo: this.selezionato, dataIn: this.calendInizio, dataOut: this.calendFine, 
                oraIn : this.oraIn, oraOut : this.oraOut }
    axios.post('api/admin/cancParticolare', data)
    .then(function (response) {
       //console.log(response);
    })
    .catch(function (error) {
       console.log(error);
    });
  }
}
}
</script>
<style  scoped>
#titolo{
    margin: 10px;
}
</style>