<template>
    <v-card
            max-width="475"
            class="mx-auto"
    >
        <v-toolbar color="red" dark>
            <v-toolbar-title>{{titolo}}</v-toolbar-title>
        </v-toolbar>

        <v-list two-line subheader>
            <div v-for="n in 15">
                <v-list-item>
                    <v-list-item-content style="height: 80px">
                        <v-btn color="green">
                            <v-list-item-title>{{n+8}} - {{n+8+1}}</v-list-item-title>
                        </v-btn>

                        <div v-for="prenotazione in prenotazioni">
                            <div v-if="prenotazione.oraon == n+8">
                                <!--<v-list-item-title>{{prenotazione.oraon}} - {{prenotazione.oraon+1}}</v-list-item-title>-->
                                <v-list-item-subtitle style="display: flex; justify-content: space-between">
                                    <div>
                                        <span v-if="prenotazione.username1">{{ prenotazione.username1 }}</span>
                                        <span v-if="prenotazione.username2">{{ prenotazione.username2 }}</span>
                                        <span v-if="prenotazione.username3">{{ prenotazione.username3 }}</span>
                                        <span v-if="prenotazione.username4">{{ prenotazione.username4 }}</span>
                                    </div>
                                    <div>
                                        <span v-if="prenotazione.username1
                                        || prenotazione.username2
                                        || prenotazione.username3
                                        || prenotazione.username4"
                                        >
                                        <v-chip

                                                color="red"
                                                class="ml-0 mb-2 black--text"
                                                label
                                                small
                                        >
                                              {{prenotazione.doppio}}
                                        </v-chip>

                                    </span>
                                    </div>

                                </v-list-item-subtitle>
                            </div>
                        </div>

                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>
            </div>

        </v-list>

    </v-card>
</template>

<script>
    export default {
        props: ['titolo', 'giorno'],

        data() {
            return {
                prenotazioni: {}
            }
        },

        created() {
            axios.post('/api/prenotazionispecifiche', {
                dataprenotazione: this.giorno,
                campo: 'campo1'
            })
                .then(res => {
                    this.prenotazioni = res.data.data
                 //   console.log(this.prenotazioni)
                })
        }
    }
</script>

<style scoped>

</style>