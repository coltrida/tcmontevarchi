<template>
    <v-container class="grey lighten-5">
        <v-row>
            <v-col>Prenotazioni del giorno {{ gior }}</v-col>
        </v-row>
        <v-row
                class="mb-6"
                no-gutters
        >

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione titolo="Campo 1"></prenotazione>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione titolo="Campo 2"></prenotazione>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione titolo="Campo 3"></prenotazione>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione titolo="Campo 4"></prenotazione>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import Prenotazione from './Prenotazioni'
    export default {
        name: "PrenotazioniCampi",

        data(){
            return{
                gior:this.$route.params.giorno
            }
        },

        components:{Prenotazione}
    }
</script>

<style scoped>

</style>