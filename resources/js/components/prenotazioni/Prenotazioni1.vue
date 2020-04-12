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
            axios.post('/api/prenotazionispecifiche', {
                dataprenotazione: this.giorno,
                campo: 'campo1'
            })
                .then(res => {
                    this.prenotazioni = JSON.parse(JSON.stringify(res.data.data))
                    //console.log(this.prenotazioni)
                })
        }
    }
</script>

<style scoped>

</style>