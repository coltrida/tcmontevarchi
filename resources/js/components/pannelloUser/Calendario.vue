<template>
    <v-row>
        <v-col>
            <v-btn style="height: 70px" color="green" @click="visualizzaPrenotazioni">{{ dataOggi }}</v-btn>
            <v-btn style="height: 70px" color="green" @click="visualizzaPrenotazioni">{{ piuuno }}</v-btn>
        </v-col>
    </v-row>
</template>

<script>
    export default {
        data(){
            return{
                dataOggi: null,
                piuuno: null,
                piudue: null,
                piutre: null,
                piuquattro: null,
                piucinque: null,
            }
        },

        created() {
            let today = new Date();
            let tomorrow = new Date(today)
            tomorrow.setDate(tomorrow.getDate() + 1)

            /*let dd = String(today.getDate()).padStart(2, '0');
            let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            let yyyy = today.getFullYear();*/

            let val = this.layoutgiorno(today);
            let val2 = this.layoutgiorno(tomorrow);

            today = val[0] + '/' + val[1] + '/' + val[2];
            tomorrow = val2[0] + '/' + val2[1] + '/' + val2[2];

            this.dataOggi = today;
            this.piuuno = tomorrow;

        },

        methods:{
            visualizzaPrenotazioni(){

            },

            layoutgiorno(giorno){
                let dd = String(giorno.getDate()).padStart(2, '0');
                let mm = String(giorno.getMonth() + 1).padStart(2, '0'); //January is 0!
                let yyyy = giorno.getFullYear();
                return [dd, mm, yyyy]
            }
        }
    }
</script>

<style scoped>

</style>