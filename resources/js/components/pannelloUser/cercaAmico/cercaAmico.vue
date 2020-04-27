<template>
    <v-container>
        <v-row>
            <v-col
                    cols="12"
                    md="4"
            >
                <v-text-field
                        @keyup="filtraggio"
                        v-model="filtro"
                        label="Nome/Cognome"
                        required
                ></v-text-field>
            </v-col>
        </v-row>

        <v-row auto-grow style="display: flex; justify-content: start">
            <socio v-for="socio in prelevati" :key="socio.nome"
                   :socio="socio"
            ></socio>
        </v-row>
    </v-container>
</template>

<script>
    import Socio from './Socio'

    export default {
        components: {Socio},

        data(){
            return {
                filtro: '',
                prelevati: {}
            }
        },

        created() {
            this.filtraggio()
        },

        methods: {
            filtraggio: function () {
                axios.get('/api/soci/visualizzaDinamica/' + this.filtro).then(
                    res => {
                        this.prelevati = res.data.data
                        //console.log(this.prelevati)
                    }
                )
            }
        }
    }
</script>