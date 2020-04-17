<template>
<v-list-item>
   
<v-row auto-grow>
         
         
    <v-col> 
           
    data: {{passaggio.dataprenotazione}}
      
    </v-col>
    <v-col>     
    ora: {{passaggio.oraon}}
    </v-col>
    <v-col> 
    campo: {{passaggio.campo}}
    </v-col>
    <v-col>
    utenti: {{passaggio.username2}}
          {{passaggio.username3}} {{passaggio.username4}}
          </v-col>
       <v-col>
          <v-card-actions >
      <v-btn @click="cancella">
          <v-icon>fas fa-trash</v-icon>
      </v-btn>
       
    </v-card-actions>
       </v-col>
          
         
</v-row>

</v-list-item>
<!-- <div>
  <div class="float-left">
  <v-card
    class="mx-auto"
    width="333"
    outlined
  >
  <v-list-item three-line >
      <v-list-item-content>
        <div class="title mb-4">Cancella</div>
        <v-list-item-title class="title mb-1">data: {{passaggio.dataprenotazione}}</v-list-item-title>
        <v-list-item-title class="title mb-1">ora: {{passaggio.oraon}}</v-list-item-title>
        <v-list-item-title class="title mb-1">campo: {{passaggio.campo}}</v-list-item-title>
        <v-list-item-title class="title mb-1">utenti: {{passaggio.username2}}
          {{passaggio.username3}} {{passaggio.username4}} </v-list-item-title>
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
      </div>
   </div> -->
    
</template>

<script>
export default {
  props:['passaggio','indice'],
  data:function(){
      return{
          
      }
      },
      created(){
        console.log(this.passaggio);
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