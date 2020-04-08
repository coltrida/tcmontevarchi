<template>
    <v-parallax
            dark
            src="http://tcmontevarchi2.local/img/01.jpg"
            height="700"
    >
        <v-row
                justify="center"
        >
            <v-col class="text-center" cols="8">
                <h1 class="display-4 mb-4">
                    <pannello></pannello>
                </h1>
            </v-col>
        </v-row>
    </v-parallax>
</template>

<script>

    import Pannello from './pannelloUser/Pannello'
    export default {
        name: "parallax",

        components: {Pannello},

    }
</script>

<style scoped>

</style>