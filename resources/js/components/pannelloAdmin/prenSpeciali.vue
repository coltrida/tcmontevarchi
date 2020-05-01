<template>
    <div>
        <v-form @submit.prevent="inviaForm">
            <div id="titolo">
                <v-row><h1>Prenotazioni Speciali</h1></v-row>
            </div>
            <label for="inizio">Da</label>
            <input type="date" ref="inizio" v-model="calendInizio"
                   min="2020-01-01" max="2020-12-31" value="2020-06-01">
            <label for="fine">A</label>
            <input type="date" id="fine" v-model="calendFine"
                   min="2020-01-01" max="2020-12-31">
            <v-row align="center">
                <v-col class="d-flex" cols="12" sm="6">
                    <v-select
                            @change="visulOra"
                            v-model="selezionato"
                            :items="campi"
                            item-value="campo"
                            item-text="campo"
                            label="Seleziona campo"
                    ></v-select>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="1">
                    <v-subheader>Orario inizio</v-subheader>
                </v-col>
                <v-col cols="2">
                    <v-text-field
                            value="09:00"
                            v-model="oraIn"
                            label="ora"
                            type="time"
                            :step='minute'
                            min='09:00'
                            max='22:00'
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="1">
                    <v-subheader>Orario fine</v-subheader>
                </v-col>
                <v-col cols="2">
                    <v-text-field
                            ref="blocca"
                            v-model="oraOut"
                            value="09:00"
                            label="ora"
                            type="time"
                            :step='minute'
                            min='09:00'
                            max='22:00'
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-btn color="warning" type="submit">Invia</v-btn>
        </v-form>

        <!-- <v-btn @click="prova"></v-btn> -->
    </div>

</template>

<script>
    export default {
        data: () => ({
            id: User.id(),
            minute: 0,
            selezionato: '',
            calendInizio: '',
            calendFine: '',
            oraIn: '',
            oraOut: '',
            campi: [{

                campo: "campo1",

            },
                {

                    campo: "campo2",

                },
                {

                    campo: "campo3",

                },
                {

                    campo: "campo4",

                },],
        }),
        methods: {
            prova() {
                $refs.inizio.value = '2020-06-01'
            },
            visulOra() {
                if (this.selezionato == 'campo1' || this.selezionato == 'campo2') {
                    this.minute = 3600
                } else {
                    this.minute = 1800
                }
            },
            inviaForm() {
                let formData = {
                    campo: this.selezionato, dataIn: this.calendInizio, dataOut: this.calendFine,
                    oraIn: this.oraIn, oraOut: this.oraOut, id: this.id
                }
                axios.post('/api/admin/prenParticolare', formData)
                    .then(function (response) {
                        //console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
<style scoped>
    #titolo {
        margin: 10px;
    }
</style>