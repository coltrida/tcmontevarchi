<template>
    <v-container>
        <v-row>
            <v-col cols="5">
                <v-form @submit.prevent="invia">
                    <!--<v-file-input
                            :rules="rules"
                            accept="image/png, image/jpeg, image/bmp"
                            placeholder="Seleziona un'immagine"
                            prepend-icon="mdi-camera"
                            label="Immagine"

                    ></v-file-input>-->
                    <v-file-input
                            label="Immagine"
                            v-model="nome"
                            prepend-icon="mdi-camera"
                            placeholder="Seleziona un'immagine"
                            accept="image/jpeg"
                            v-on:change="carica"
                    ></v-file-input>
                    <v-btn
                            color="green"
                            type="submit"
                    >
                        Invia
                    </v-btn>
                </v-form>
            </v-col>
            <v-col cols="5">
                <v-img v-if="caricato" src="https://picsum.photos/510/300?random" aspect-ratio="1.7"></v-img>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        data: () => ({
            nome:{},
            caricato:false
            /*rules: [
                value => !value || value.size < 2000000 || 'Avatar size should be less than 2 MB!',
            ],*/
        }),

        methods:{
            invia(){
                console.log(this.nome)
                //let formData = new FormData();
                //formData.append('nome', this.nome);
                //console.log(formData)
                let config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                axios.post('/api/auth/foto', this.nome)
                    .then(function(data){
                        //console.log(data.data);
                })
            },

            carica(){
                this.caricato=true
            }
        },
    }
</script>
