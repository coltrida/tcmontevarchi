<template>
    <v-container>
        <v-row no-gutters>
            <template v-for="n in totSoci">
                <v-col :key="n">
                    <v-card
                            class="pa-2"
                            outlined
                            tile
                    >
                        <socio

                                :socio="soci[n-1]"

                        ></socio>
                    </v-card>
                </v-col>
<!--                <v-responsive
                        v-if="n === 2"
                        :key="`width-${n}`"
                        width="100%"
                ></v-responsive>-->
            </template>
        </v-row>
    </v-container>
</template>

<script>
    import Socio from './Socio'
    export default {
        components:{Socio},

        data(){
            return {
                soci: {},
                totSoci: 0
            }
        },

        created() {
            this.getSoci()
        },

        methods:{
            getSoci(){
                axios.get(`/api/soci`)
                    .then(res => {
                        this.soci = res.data.data
                        this.totSoci = res.data.data[0].totSoci
                        console.log(this.totSoci)
                    })
            }
        }

    }
</script>