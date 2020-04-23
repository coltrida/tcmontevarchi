<template>
    <v-card
            class="mx-auto"
            max-width="544"
    >
        <v-img
                :src="socio.foto"
                height="400px"
        ></v-img>

        <v-card-title>
            {{ socio.nome }} {{ socio.cognome }}
        </v-card-title>

        <v-card-subtitle>
            Anno di nascita: {{ socio.anno }}
        </v-card-subtitle>

        <v-card-actions>
            <v-btn text>Contatta</v-btn>

            <v-btn
                    color="purple"
                    text
            >
                Invita
            </v-btn>

            <v-spacer></v-spacer>

            <v-btn
                    icon
                    @click="show = !show"
            >
                <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
            </v-btn>
        </v-card-actions>

        <v-expand-transition>
            <div v-show="show">
                <v-divider></v-divider>

                <v-card-text>
                    I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
                </v-card-text>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
    export default {
        name: "Socio",

        props: ['socio'],

        data: () => ({
            show: false,
        }),
        created(){
            console.log(this.socio);
        }
    }
</script>

<style scoped>

</style>