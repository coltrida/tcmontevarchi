<template>
    <v-container>
        <v-row>
            <v-col>
                <router-link to="prenSpeciali"><v-btn color="blue"  >Prenotazioni Speciali</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="cancSpeciali"><v-btn color="blue"  >Cancellazioni Speciali</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="cancOraSocio"><v-btn color="blue"  >Cancella Ora</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="inserisciSocio"><v-btn color="blue"  >Inserisci Socio</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="sociAdmin"><v-btn color="blue" >Soci</v-btn></router-link>
            </v-col>
             <v-col>
                <router-link to="stornaCredito"><v-btn color="blue" >Storna Credito</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="ricaricaCredito"><v-btn color="blue" >Ricarica Credito</v-btn></router-link>
            </v-col>
            <v-col>
                <router-link to="insNews"><v-btn color="blue" >Inserimento News</v-btn></router-link>
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
    import Calendario from '../pannelloUser/Calendario'
    export default {
         

        components:{Calendario},

        methods:{
               
        }
    }
</script>

<style scoped>

</style>