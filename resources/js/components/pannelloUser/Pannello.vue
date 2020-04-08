<template>
    <v-container>
        <v-row>
            <v-col>
                <v-btn color="blue" @click="modificaDati">Modifica Dati</v-btn>
            </v-col>
            <v-col>
                <v-btn color="blue" @click="caricaFoto">Carica Foto</v-btn>
            </v-col>
            <v-col>
                <v-btn color="blue" @click="cancellaOra">Cancella Ora</v-btn>
            </v-col>
            <v-col>
                <v-btn color="blue" @click="cercaAmico">Cerca un amico</v-btn>
            </v-col>
            <v-col>
                <v-btn color="blue" @click="listaSoci">Soci</v-btn>
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
            modificaDati(){

            },

            caricaFoto(){

            },

            cancellaOra(){

            },

            cercaAmico(){

            },

            listaSoci(){

            }
        }
    }
</script>

<style scoped>

</style>