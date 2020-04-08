<template>
    <v-btn color="blue" @click="logout">Logout</v-btn>
</template>

<script>
    export default {
        name: "Logout",
        methods:{
            logout(){
                User.logout()
            }
        }
    }
</script>

<style scoped>

</style>