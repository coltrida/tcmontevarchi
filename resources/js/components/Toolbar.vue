<template>
    <v-card
            color="grey lighten-2"
            flat
            tile
    >
        <v-toolbar color="red darken-4" dark>
            <v-toolbar-title>
                <router-link class="white--text" to="/">
                    <v-btn text>
                        TC MONTEVARCHI
                    </v-btn>
                </router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>

            <router-link
                    v-for="item in items"
                    :key="item.title"
                    :to="item.to"
                    v-if="item.show"
            >
                <v-btn text>
                    {{ item.title }}
                    <!--<v-icon>mdi-magnify</v-icon>-->
                </v-btn>
            </router-link>

            <login v-if="!loggedIn" class="mt-4"></login>
            <logout v-else></logout>

        </v-toolbar>
    </v-card>
</template>

<script>
    /*import AppNotification from './AppNotification'*/
    import Login from './login/Login'
    import Logout from './login/Logout'
    export default {
        name: "Toolbar",

        components: {Login, Logout},

        data() {
            return {
                loggedIn: User.loggedIn(),
                items:[
                    {title : 'Prenotazioni', to: '/prenotazioni', show: true},
                    {title : 'Storia', to: '/storia', show: true},
                    {title : 'Contatti', to: '/contatti', show: true},
                ]
            }
        },
        /*created() {
            EventBus.$on('logout', () => {
                User.logout()
            })
        }*/
    }
</script>

<style scoped>

</style>