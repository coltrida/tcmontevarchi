<template>
    <div>
        <v-list-item>
            <v-list-item-content style="height: 80px">
                <v-btn color="green">
                    <v-list-item-title>{{orario}} - {{orario+1}}</v-list-item-title>
                </v-btn>

                <div v-for="prenotazione in prenotazioni">
                    <div v-if="prenotazione.oraon == orario">
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
                                                class="ml-0 mb-2 black&#45;&#45;text"
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
</template>

<script>
    export default {
        name: "Prenotazione",

        props: ['prenotazioni', 'orario'],

        data(){
            return {
                esiste: false,
            }
        },
    }
</script>

<style scoped>

</style>