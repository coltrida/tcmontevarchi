<template>
    <v-container>
        <v-row>
            <v-col>
                <h2>Inserimento Socio</h2>
            </v-col>
        </v-row>
        <v-form @submit.prevent="inserisci">
            <v-col
                    cols="12"
                    md="6"
            >
                <v-text-field
                        v-model="Socio.nome"
                        label="Nome"
                        required
                ></v-text-field>
            </v-col>
            <v-col
                    cols="12"
                    md="6"
            >
                <v-text-field
                        v-model="Socio.cognome"
                        label="Cognome"
                        required
                ></v-text-field>
            </v-col>
            <v-col
                    cols="12"
                    md="6"
            >
                <v-text-field
                        v-model="Socio.anno"
                        label="Anno di nascita"
                        required
                ></v-text-field>
            </v-col>
            <v-col
                    cols="12"
                    md="6"
            >
                <v-select
                        v-model="Socio.stato"
                        :items="valori"
                        item-text="visualizza"
                        item-value="valore"
                        label="Tipo Socio"
                ></v-select>
            </v-col>

            <v-btn
                    color="green"
                    type="submit"
                    class="mt-3"
            >
                Inserisci
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                Socio: {
                    nome: '',
                    cognome: '',
                    anno: '',
                    stato: ''
                },

                valori: [
                    { visualizza: 'normale', valore: 0 },
                    { visualizza: 'special', valore: 2 },
                    { visualizza: 'gratis', valore: 3 },
                    { visualizza: 'illimitati', valore: 4 },
                ],
            }
        },

        methods: {
            inserisci() {
                axios.post('/api/admin/inserisciSocio', this.Socio)
                    .then(() => {
                        this.Socio = ''
                        alert('Socio inserito')
                    })
                    .catch((error) => alert('Errore'))
            }
        }
    }
</script>