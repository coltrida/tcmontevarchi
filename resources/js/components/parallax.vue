<template>
    <v-parallax
            dark
            src="http://tcmontevarchi.altervista.org/img/01.jpg"
            height="700"
    >
        <v-row
                justify="center"
        >
            <v-col class="text-center" cols="12">
                <h1 class="display-4 mb-4">
                    <pannello-admin v-if="prova === 'admin'"></pannello-admin>
                    <pannello v-else></pannello>

                </h1>
            </v-col>
        </v-row>
    </v-parallax>
</template>

<script>

    import Pannello from './pannelloUser/Pannello'
    import PannelloAdmin from './pannelloAdmin/PannelloAdmin'

    export default {
        name: "parallax",

        components: {Pannello, PannelloAdmin},
        data(){
            return {
                prova: User.stato()
            }
        },        
        // created(){
        //     console.log(this.prova);
        // }
    }
</script>

<style scoped>

</style>