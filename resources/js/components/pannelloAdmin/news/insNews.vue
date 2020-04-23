<template>
    <v-container>
        <v-form @submit.prevent="inviaNews">
            <v-text-field
                    v-model="testo"
                    label="testo messaggio"
                    required
            ></v-text-field>

            <v-btn
                    color="green"
                    type="submit"
                    class="mt-3"
            >
                Invia
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
export default {
    data(){
        return {
            testo: ''
        }
    },

    methods:{
        inviaNews(){
            axios.post('/api/auth/inviaNews', {testo: this.testo,})
                .then(() => {
                    this.testo = ''
                    alert('messaggio inviato')
                })
                .catch((error) => console.log(error))
        }
    }
}
</script>