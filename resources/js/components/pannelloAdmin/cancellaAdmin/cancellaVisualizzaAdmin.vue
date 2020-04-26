<template>
    <v-list-item>
        <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
            <v-col>
                {{socio.nome}}
            </v-col>
            <v-col>
                {{socio.cognome}}
            </v-col>
            <v-col>
                {{socio.credito}}
            </v-col>
            <v-col>
                {{socio.anno}}
            </v-col>
            <v-col>
                <v-card-actions>
                    <v-btn @click="listaOre" color="red">
                        Lista
                    </v-btn>
                </v-card-actions>
            </v-col>
        </v-row>
    </v-list-item>
</template>

<script>
    export default {
        props: ['socio'],

        methods: {
            listaOre: function () {
                EventBus.$emit('visualizzaPrenotazioniUtenteSelezionato', this.socio, false)
            }
        }
    }
</script>