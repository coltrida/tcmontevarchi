<template>

<v-container>
    <v-card
    class="mx-auto"
    max-width="600"
    outlined
  >
    <v-list-item three-line>
      <v-list-item-content>
        <div class="overline mb-4">Cancella</div>
        <v-list-item-title class="headline mb-1">data: {{passaggio.dataprenotazione}}</v-list-item-title>
        <v-list-item-title class="headline mb-1">ora: {{passaggio.oraon}}</v-list-item-title>
        <v-list-item-title class="headline mb-1">campo: {{passaggio.campo}}</v-list-item-title>
         
      </v-list-item-content>

      <v-list-item-avatar
        tile
        size="80"
        color="grey"
      ></v-list-item-avatar>
    </v-list-item>

    <v-card-actions>
      <v-btn @click="cancella">
          <v-icon>fas fa-trash</v-icon>
      </v-btn>
       
    </v-card-actions>
  </v-card>
        
</v-container>
    
</template>

<script>
export default {
  props:['passaggio','indice'],
  data:function(){
      return{
          
      }
      },
      methods:{
          cancella:function(){
            console.log(this.indice)
              EventBus.$emit('cancellazione', this.indice 
               )
          
      }
  }  
}
</script>