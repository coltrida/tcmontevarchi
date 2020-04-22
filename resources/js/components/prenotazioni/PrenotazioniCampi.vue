<template>
    <div class="ml-4 mr-4">
        <v-row style="margin: 50px 0">
            <v-col class="text-center">
                    <v-btn x-large @click="linkindietro" color="primary">
                        <v-icon dark left>mdi-arrow-left</v-icon>Indietro
                    </v-btn>
            </v-col>
            <v-col class="text-center"><h1>Prenotazioni del giorno</h1>
                <v-chip
                        class="mx-2 shadow-lg px-lg-5"
                        color="orange"
                        x-large
                        shadow
                >
                {{ reversedGiorno }}
                </v-chip>
            </v-col>
            <v-col class="text-center">
                    <v-btn x-large @click="linkavanti" color="primary">
                        <v-icon dark left>mdi-arrow-right</v-icon>Avanti
                    </v-btn>
            </v-col>
        </v-row>


        <v-row
                class="mb-6"
                no-gutters
        >

            <v-col>
                <v-card

                        tile
                        outlined
                >
                    <prenotazione1 titolo="Campo1" :giorno="gior" :possoPrenotare="possoPrenotare"></prenotazione1>
                </v-card>
            </v-col>

            <v-col>
                <v-card

                        tile
                        outlined
                >
                    <prenotazione2 titolo="Campo2" :giorno="gior" :possoPrenotare="possoPrenotare"></prenotazione2>
                </v-card>
            </v-col>

            <v-col>
                <v-card

                        tile
                        outlined
                >
                    <prenotazione3 titolo="Campo3" :giorno="gior" :possoPrenotare="possoPrenotare"></prenotazione3>
                </v-card>
            </v-col>

            <v-col>
                <v-card

                        tile
                        outlined
                >
                    <prenotazione4 titolo="Campo4" :giorno="gior" :possoPrenotare="possoPrenotare"></prenotazione4>
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
    import AppStorage from "../../Helpers/AppStorage";
    export default {
        name: "PrenotazioniCampi",

        data(){
            return{
                gior:this.$route.params.giorno,
                limite: AppStorage.getLimite(),
                avanti:'',
                indietro:'',
                possoPrenotare: true
            }
        },

        components:{Prenotazione1, Prenotazione2, Prenotazione3, Prenotazione4},

        computed: {
            reversedGiorno: function () {
                return this.gior.split('-').reverse().join('-')
            },

            giornoSelezionato: function () {
                return this.gior.split('-').join('')
            },

        },

        mounted(){
            if (this.limite - this.giornoSelezionato > 0){
                this.possoPrenotare = true
            } else {
                this.possoPrenotare = false
            }
        },

        created(){
            let domani = new Date(this.gior);
            domani.setDate(domani.getDate() + 1)
            let val1 = this.layoutgiorno(domani);
            this.avanti = '/prenotazioni/' + val1[2] + '-' + val1[1] + '-' + val1[0];

            let ieri = new Date(this.gior);
            ieri.setDate(ieri.getDate() - 1)
            let val2 = this.layoutgiorno(ieri);
            this.indietro = '/prenotazioni/' + val2[2] + '-' + val2[1] + '-' + val2[0];

        },

        methods:{
            linkindietro(){
                this.$router.push(this.indietro)
                this.$router.go()
            },

            linkavanti(){
                this.$router.push(this.avanti)
                this.$router.go()
            },

            layoutgiorno(giorno){
                let dd = String(giorno.getDate()).padStart(2, '0');
                let mm = String(giorno.getMonth() + 1).padStart(2, '0'); //January is 0!
                let yyyy = giorno.getFullYear();
                return [dd, mm, yyyy]
            }
        }
    }
</script>

<style scoped>

</style>