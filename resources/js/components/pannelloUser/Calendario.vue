<template>
    <v-row>
        <v-col>
            <router-link
                    :to="linkdata"
            >
                <v-btn style="height: 70px" color="green">{{ dataOggi }}</v-btn>
            </router-link>

            <router-link
                    :to="linkuno"
            >
                <v-btn style="height: 70px" color="green">{{ piuuno }}</v-btn>
            </router-link>

            <router-link
                    :to="linkdue"
            >
                <v-btn style="height: 70px" color="green">{{ piudue }}</v-btn>
            </router-link>

            <router-link
                    :to="linktre"
            >
                <v-btn style="height: 70px" color="green">{{ piutre }}</v-btn>
            </router-link>

            <router-link
                    :to="linkquattro"
            >
                <v-btn style="height: 70px" color="green">{{ piuquattro }}</v-btn>
            </router-link>

            <router-link
                    :to="linkcinque"
            >
                <v-btn style="height: 70px" color="green">{{ piucinque }}</v-btn>
            </router-link>

            <router-link
                    :to="linksei"
            >
                <v-btn style="height: 70px" color="green">{{ piusei }}</v-btn>
            </router-link>

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
                piusei: null,

                linkdata: null,
                linkuno: null,
                linkdue: null,
                linktre: null,
                linkquattro: null,
                linkcinque: null,
                linksei: null,
            }
        },

        created() {
            let today = new Date();
            let tomorrow = new Date(today)
            let tomorrow3 = new Date(today)
            let tomorrow4 = new Date(today)
            let tomorrow5 = new Date(today)
            let tomorrow6 = new Date(today)
            let tomorrow7 = new Date(today)

            tomorrow.setDate(tomorrow.getDate() + 1)
            tomorrow3.setDate(tomorrow.getDate() + 1)
            tomorrow4.setDate(tomorrow.getDate() + 2)
            tomorrow5.setDate(tomorrow.getDate() + 3)
            tomorrow6.setDate(tomorrow.getDate() + 4)
            tomorrow7.setDate(tomorrow.getDate() + 5)

            /*let dd = String(today.getDate()).padStart(2, '0');
            let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            let yyyy = today.getFullYear();*/

            let val = this.layoutgiorno(today);
            let val2 = this.layoutgiorno(tomorrow);
            let val3 = this.layoutgiorno(tomorrow3);
            let val4 = this.layoutgiorno(tomorrow4);
            let val5 = this.layoutgiorno(tomorrow5);
            let val6 = this.layoutgiorno(tomorrow6);
            let val7 = this.layoutgiorno(tomorrow7);
           // console.log(val6)

            today = val[2] + '-' + val[1] + '-' + val[0];
            tomorrow = val2[2] + '-' + val2[1] + '-' + val2[0];
            tomorrow3 = val3[2] + '-' + val3[1] + '-' + val3[0];
            tomorrow4 = val4[2] + '-' + val4[1] + '-' + val4[0];
            tomorrow5 = val5[2] + '-' + val5[1] + '-' + val5[0];
            tomorrow6 = val6[2] + '-' + val6[1] + '-' + val6[0];
            tomorrow7 = val7[2] + '-' + val7[1] + '-' + val7[0];

            this.dataOggi = val[0] + '-' + val[1] + '-' + val[2];
            this.piuuno = val2[0] + '-' + val2[1] + '-' + val2[2];
            this.piudue = val3[0] + '-' + val3[1] + '-' + val3[2];
            this.piutre = val4[0] + '-' + val4[1] + '-' + val4[2];
            this.piuquattro = val5[0] + '-' + val5[1] + '-' + val5[2];
            this.piucinque = val6[0] + '-' + val6[1] + '-' + val6[2];
            this.piusei = val7[0] + '-' + val7[1] + '-' + val7[2];

            this.linkdata = "/prenotazioni/"+today
            this.linkuno = "/prenotazioni/"+tomorrow
            this.linkdue = "/prenotazioni/"+tomorrow3
            this.linktre = "/prenotazioni/"+tomorrow4
            this.linkquattro = "/prenotazioni/"+tomorrow5
            this.linkcinque = "/prenotazioni/"+tomorrow6
            this.linksei = "/prenotazioni/"+tomorrow7

        },

        methods:{
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