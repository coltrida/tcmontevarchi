<template>
    <v-container>
        <v-row>
            <v-col>
                <router-link to="prenSpeciali">
                    <v-btn width="250px" color="blue">Prenotazioni Speciali</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="cancSpeciali">
                    <v-btn width="250px" color="blue">Cancellazioni Speciali</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="cancellaOraSocio">
                    <v-btn width="250px" color="blue">Cancella Ora</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="inserisciSocio">
                    <v-btn width="250px" color="blue">Inserisci Socio</v-btn>
                </router-link>
            </v-col>
        </v-row>

        <v-row style="line-height: 30px !important">
            <v-col>
                <router-link to="sociAdmin">
                    <v-btn width="250px" color="blue">Calcetto</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="stornaCredito">
                    <v-btn width="250px" color="blue">Storna Credito</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="ricaricaCredito">
                    <v-btn width="250px" color="blue">Ricarica Credito</v-btn>
                </router-link>
            </v-col>
            <v-col>
                <router-link to="insNews">
                    <v-btn width="250px" color="blue">Inserimento News</v-btn>
                </router-link>
            </v-col>
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


        components: {Calendario},

        methods: {}
    }
</script>

<style scoped>

</style>