<template>
    <div class="ml-4 mr-4">
        <v-row>
            <v-col class="text-center"><v-btn @click="indietro" color="primary">freccia</v-btn></v-col>
            <v-col class="text-center">Prenotazioni del giorno {{ gior }}</v-col>
            <v-col class="text-center"><v-btn @click="avanti" color="primary">freccia</v-btn></v-col>
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
    </div>
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
                gior:'2020-04-13'
            }
        },

        components:{Prenotazione1, Prenotazione2, Prenotazione3, Prenotazione4},

        methods:{
            indietro(){
                this.$router.push('/prenotazioni/2020-04-12')
                location.reload()
                //this.gior = '2020-04-12'
            },

            avanti(){

            }
        }
    }
</script>

<style scoped>

</style>