<template>
    <v-container>
        <v-form @submit.prevent="invia">
            <v-file-input
                    :rules="rules"
                    v-model="name"
                    accept="image/png, image/jpeg, image/bmp"
                    placeholder="Pick an avatar"
                    prepend-icon="mdi-camera"
                    label="Avatar"
            ></v-file-input>
        </v-form>
    </v-container>
</template>

<script>
    export default {
        data: () => ({
            name: '',
            rules: [
                value => !value || value.size < 2000000 || 'Avatar size should be less than 2 MB!',
            ],
        }),

        methods:{
            invia(){
                axios.post('/api/auth/foto', this.name)
                    .then(res => this.$router.push('/'))
            }
        },
    }
</script>
