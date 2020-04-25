<template>
    <v-list-item>
        <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
            <v-col>
                {{passaggio.dataprenotazione}}
            </v-col>
            <v-col>
                {{passaggio.oraon}}
            </v-col>
            <v-col>
                {{passaggio.campo}}
            </v-col>
            <v-col>
                {{passaggio.username1}} {{passaggio.username2}}
                {{passaggio.username3}} {{passaggio.username4}}
            </v-col>
            <v-col>
                <v-card-actions>
                    <v-btn @click="cancella" color="red">
                        <v-icon>fas fa-trash</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-col>
        </v-row>
    </v-list-item>
</template>

<script>
    export default {
        props: ['passaggio', 'indice'],
        data: function () {
            return {}
        },

        methods: {
            cancella: function () {
                EventBus.$emit('cancellazioneOra', this.indice)
            }
        }
    }
</script>