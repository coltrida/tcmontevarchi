<template>
    <v-list-item>
       <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
            <v-col>{{pren.dataprenotazione}}</v-col>
            <v-col>{{pren.campo}}</v-col>
            <v-col>{{pren.oraon}}</v-col>
            <v-col>{{pren.doppio}}</v-col>
            <v-col>{{pren.username1}} {{pren.username2}}
                {{pren.username3}} {{pren.username4}}</v-col>
            <v-col>
                <v-card-actions >
                    <v-btn @click="cancella" color="red">cancella</v-btn>
                </v-card-actions>
           </v-col>
        </v-row> 
   </v-list-item> 
</template>

<script>
export default {
    props:['pren', 'indice'],
    created(){
        
    },
     methods:{
          cancella:function(){
              EventBus.$emit('cancellaPren', this.indice, this.pren.id )  
          }
     }
     }
</script>