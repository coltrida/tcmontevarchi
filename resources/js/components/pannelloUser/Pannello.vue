<template>
    <v-container>
        <v-row>
            <v-col>
                <router-link to="modifica"><v-btn color="blue"  >Modifica Dati</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="caricaFoto"><v-btn color="blue"  >Carica Foto</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="cancellaOra"><v-btn color="blue"  >Cancella Ora</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="cercaAmico"><v-btn color="blue"  >Cerca un amico</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="soci"><v-btn color="blue" >Soci</v-btn></router-link>
            </v-col>
            <!--<v-col>
                <v-btn color="blue" @click="info">Info Utente</v-btn>
            </v-col>-->
        </v-row>

        <v-row>
            <v-col>
                <calendario></calendario>
            </v-col>
        </v-row>

    </v-container>
</template>

<script>
    import Calendario from './Calendario'
    export default {
        name: "pannello",

        components:{Calendario},

        methods:{
               
        }
    }
</script>

<style scoped>

</style>