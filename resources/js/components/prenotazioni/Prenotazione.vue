<template>
    <div>
        <v-list-item>
            <v-list-item-content style="height: 130px">
                <v-btn :disabled="!esiste" color="green" @click="prenota" style="height: 50px">
                    <v-list-item-title>{{orario}} - {{orario+1}}</v-list-item-title>
                </v-btn>

                <div v-for="prenotazione in prenotazioni" :key="prenotazione.id">
                    <div v-if="prenotazione.oraon == orario">
                        <prenotazione-singolo
                                v-if="prenotazione.doppio == 'S'"
                                :prenotazione="prenotazione"
                        ></prenotazione-singolo>
                        <prenotazione-doppio
                                v-else
                                :prenotazione="prenotazione"
                        ></prenotazione-doppio>
                    </div>
                </div>

            </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>
    </div>
</template>

<script>
    import PrenotazioneSingolo from './PrenotazioneSingolo'
    import PrenotazioneDoppio from './PrenotazioneDoppio'
    export default {
        name: "Prenotazione",

        components:{PrenotazioneSingolo, PrenotazioneDoppio},

        props: ['prenotazioni', 'orario', 'campo', 'giorno'],

        data(){
            return {
                esiste: false,
            }
        },

        created(){
            EventBus.$on('prenotazioneFull', (pieno) => {
                this.esiste = pieno
            })
        },

        methods:{
            prenota(){
                axios.post('/api/prenotazioni',{
                    username: User.name(),
                    campo: this.campo,
                    dataprenotazione: this.giorno,
                    oraon: this.orario,
                    doppio: 0,
                })
                    .then(res => location.reload())
            },

            possoPrenotare(){
                //this.prenotazioni.forEach(prenot => console.log(prenot))
            }
        }
    }
</script>

<style scoped>

</style>