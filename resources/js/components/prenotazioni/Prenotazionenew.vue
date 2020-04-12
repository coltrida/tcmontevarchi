<template>
    <div>
        <v-list-item>
            <v-list-item-content style="height: 130px">
                <v-btn :disabled="pieno" color="green" @click="prenota" style="height: 50px">
                    <v-list-item-title>{{orario}} - {{orario+1}}</v-list-item-title>
                </v-btn>
                <div v-if="prenotazione">
                    <prenotazione-singolo
                            v-if="prenotazione.doppio == 'S'"
                            :prenotazione="prenotazione"
                    ></prenotazione-singolo>
                    <prenotazione-doppio
                            v-else
                            :prenotazione="prenotazione"
                    ></prenotazione-doppio>
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

        props: ['orario', 'campo', 'giorno'],

        data(){
            return {
                pieno: false,
                prenotazione : {}
            }
        },

        created(){
            axios.post('/api/prenotazionispecifiche2', {
                dataprenotazione: this.giorno,
                campo: 'campo1',
                oraon: this.orario
            })
                .then(res => {
                    //console.log(res.data)
                    //this.prenotazioni = JSON.parse(JSON.stringify(res.data.data))
                    this.prenotazione = res.data.data
                    if(res.data){
                            //console.log(res.data.data.full)
                            this.pieno = res.data.data.full
                        }

                })
        },

        methods:{
            prenota(){
                /*   axios.post('/api/prenotazioni',{
                       username: User.name(),
                       campo: this.campo,
                       dataprenotazione: this.giorno,
                       oraon: this.orario,
                       doppio: 0,
                   })
                       .then(res => location.reload()) */
               },

            possoPrenotare(){
                //this.prenotazioni.forEach(prenot => console.log(prenot))
            }
        }
    }
</script>

<style scoped>

</style>