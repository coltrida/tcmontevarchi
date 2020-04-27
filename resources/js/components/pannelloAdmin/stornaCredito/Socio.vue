<template>
    <v-form @submit.prevent="ricarica">
        <v-list-item>
            <v-row auto-grow style="border: 1px solid gray; display: flex; align-items: center">
                <v-col> {{socio.nome}} </v-col>
                <v-col> {{socio.cognome}} </v-col>
                <v-col> {{socio.credito}} </v-col>
                <v-col> {{socio.anno}} </v-col>
                <v-col>
                    <v-select
                            v-model="select"
                            :items="importo"
                            label="importi"
                    ></v-select>
                </v-col>
                <v-col>
                    <v-btn
                            color="green"
                            type="submit"
                            class="mt-3"
                    >
                        Storna
                    </v-btn>
                </v-col>
            </v-row>
        </v-list-item>
    </v-form>
</template>

<script>
    import ImportiRicaricaStorno from "../../../Helpers/ImportiRicaricaStorno";
    export default {
        props:['socio'],

        data(){
            return{
                select:0,
                importo:ImportiRicaricaStorno.importi(),
                utente: []
            }
        },

        methods:{
            ricarica(){
                axios.post(`/api/admin/stornaCredito/${this.socio.id}`, {importo : this.select})
                    .then(() => {
                        this.socio.credito = parseFloat(parseFloat(this.socio.credito) - parseFloat(this.select)).toFixed(2)
                        this.select = 0
                        alert('Socio Stornato')
                    })
                    .catch((error) => console.log(error))
            }
        }
    }
</script>