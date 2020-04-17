<template>
    <v-card
            max-width="475"
            class="mx-auto"
    >
        <v-toolbar color="red" dark>
            <v-toolbar-title>{{titolo}}</v-toolbar-title>
        </v-toolbar>

        <v-list two-line subheader>
            <prenotazione
                v-for="n in 15"
                :orario='n+8'
                :prenotazioni="prenotazioni"
                campo="campo1"
                :giorno="giorno"
                :key="n"
            ></prenotazione>

        </v-list>

    </v-card>
</template>

<script>
    import Prenotazione from './Prenotazione'
    export default {
        props: ['titolo', 'giorno'],

        components:{Prenotazione},

        data() {
            return {
                prenotazioni:{}
            }
        },

        created() {
            //console.log('ciao')
            axios.post('/api/prenotazionispecifiche', {
                dataprenotazione: this.giorno,
                campo: 'campo1'
            })
                .then(res => {
                    this.prenotazioni = JSON.parse(JSON.stringify(res.data.data))
                    //console.log(this.prenotazioni.forEach(element => console.log(element)))
                })

            /*Echo.channel('prenotazioneChannel')
                .listen('PrenotazioneEvent', (e) => {
                    //console.log(e.dataprenotazione)
                    let esiste = 0
                    console.log(e)
                    this.prenotazioni.forEach(element => {
                        if(element.id == e.prenotazione.id){
                            esiste = 1
                            element.username1 = e.prenotazione.username1
                            element.username2 = e.prenotazione.username2
                            element.username3 = e.prenotazione.username3
                            element.username4 = e.prenotazione.username4
                            element.full = e.prenotazione.full
                        }
                    });
                    if(esiste == 0) {
                        console.log('nuovo')
                        if (this.giorno == e.prenotazione.datapren && e.prenotazione.campo == 'campo1') {
                            this.prenotazioni.push(e.prenotazione)
                        }
                    }
                });*/
        }
    }
</script>

<style scoped>

</style>