<template>
    <v-container>
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
                    <v-col>Importo:</v-col>
                    <v-col>Azione:</v-col>
                </v-row>

                <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
                    <v-col >
                        <socio v-for="socio in soci"
                               :key="socio.id"
                               :socio="socio">
                        </socio>
                    </v-col>
                </v-row>
    </v-container>
</template>

<script>
    import Socio from "./Socio"
    export default {
        components:{Socio},

        data(){
            return{
                filtro: '',
                soci: {},
            }
        },

        methods:{
            filtraggio: function(){
                axios.post('/api/auth/users/'+this.filtro)
                    .then(res => {this.soci= res.data})
            }
        },

    }
</script>
