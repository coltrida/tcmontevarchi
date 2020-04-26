<template>
    <v-container>
        <v-row>
            <v-col cols="5">
                <v-form @submit.prevent="invia">

                    <input type="file" @change="onFileSelected">
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
            id: User.id(),
            selectedFile: null,
            caricato:false
        }),

        methods:{
            invia(){
                const fd = new FormData();
                fd.append('image', this.selectedFile, this.selectedFile.name)

                axios.post(`/api/auth/foto/${this.id}`, fd)
                    .then((res) => {
                        alert('foto caricata')
                })
            },

            carica(){
                this.caricato=true
            },

            onFileSelected(event){
                this.selectedFile = event.target.files[0]
            }
        },
    }
</script>
