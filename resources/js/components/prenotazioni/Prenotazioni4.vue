<template>
    <v-card
            max-width="475"
            class="mx-auto"
    >
        <v-toolbar style="background: linear-gradient(90deg, rgb(21,27,189) 0%, rgb(122,130,209) 25%, rgba(255,255,255,1) 100%);" dark>
            <v-toolbar-title>{{titolo}}</v-toolbar-title>
        </v-toolbar>

        <v-list two-line subheader>
            <prenotazione
                    v-for="n in 15"
                    :orario='n+8'
                    :prenotazioni="prenotazioni"
                    :prenotazioneremota="prenotazioneremota"
                    campo="campo4"
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
                prenotazioni: {},
                prenotazioneremota:{}
            }
        },

        created() {
            axios.post('/api/prenotazionispecifiche', {
                dataprenotazione: this.giorno,
                campo: 'campo4'
            })
                .then(res => {
                    this.prenotazioni = res.data.data
                    //console.log(this.prenotazioni)
                })

            Echo.channel('prenotazioneChannel')
                .listen('PrenotazioneEvent', (e) => {
                    //console.log(e.dataprenotazione)
                    let esiste = 0
                    //console.log(e)
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
                        //console.log('nuovo')
                        if (this.giorno == e.prenotazione.datapren && e.prenotazione.campo == 'campo4') {
                            this.prenotazioni.push(e.prenotazione)
                            this.prenotazioneremota = e.prenotazione
                        }
                    }
                });
        }
    }
</script>

<style scoped>

</style>