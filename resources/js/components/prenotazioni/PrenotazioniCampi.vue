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
                    <prenotazione1 titolo="Campo1" :giorno="gior"></prenotazione1>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione2 titolo="Campo2" :giorno="gior"></prenotazione2>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione3 titolo="Campo3" :giorno="gior"></prenotazione3>
                </v-card>
            </v-col>

            <v-col>
                <v-card
                        class="pa-2"
                        tile
                        outlined
                >
                    <prenotazione4 titolo="Campo4" :giorno="gior"></prenotazione4>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import Prenotazione1 from './Prenotazioni1'
    import Prenotazione2 from './Prenotazioni2'
    import Prenotazione3 from './Prenotazioni3'
    import Prenotazione4 from './Prenotazioni4'
    export default {
        name: "PrenotazioniCampi",

        data(){
            return{
                gior:this.$route.params.giorno
            }
        },

        components:{Prenotazione1, Prenotazione2, Prenotazione3, Prenotazione4}
    }
</script>

<style scoped>

</style>