<template>
    <v-card
            color="grey lighten-2"
            flat
            tile
    >
        <v-toolbar color="red darken-4" dark class="pt-4" style="height: 100px">
            <v-toolbar-title>
                <router-link class="white--text" to="/">
                    <v-btn text>
                        TC MONTEVARCHI
                    </v-btn>
                </router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>

            <div v-if="loggedIn">

                <v-menu
                        v-model="menu"
                        bottom
                        right
                        transition="scale-transition"
                        origin="top left"
                >
                    <template v-slot:activator="{ on }">
                        <v-chip
                                color="primary"
                                label
                                v-on="on"
                                style="width: 138px"
                        >
                            <!--<v-avatar left>
                                <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                            </v-avatar>-->
                            <v-icon left>mdi-account-circle-outline</v-icon>
                            {{ nome }}
                        </v-chip>
                    </template>
                    <v-card width="300">
                        <v-list dark>
                            <v-list-item>
                                <v-list-item-avatar>
                                    <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title>{{nome}} {{cognome}}</v-list-item-title>
                                    <v-list-item-subtitle>{{email}}</v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-action>
                                    <v-btn
                                            icon
                                            @click="menu = false"
                                    >
                                        <v-icon>mdi-close-circle</v-icon>
                                    </v-btn>
                                </v-list-item-action>
                            </v-list-item>
                        </v-list>
                        <v-list>
                            <v-list-item>
                                <!--<v-list-item-action>
                                    <v-icon>mdi-briefcase</v-icon>
                                </v-list-item-action>-->
                                <v-list-item-subtitle v-if="stato=='gratis'">Ore gratis: {{privilegi}}</v-list-item-subtitle>
                                <v-list-item-subtitle v-else-if="stato=='illimitati'">Ore gratis: illimitate</v-list-item-subtitle>
                                <v-list-item-subtitle>Credito: € {{credito}}</v-list-item-subtitle>
                            </v-list-item>
                        </v-list>
                    </v-card>
                </v-menu>

            </div>

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
                menu: false,
                loggedIn: User.loggedIn(),
                username: User.name(),
                nome: User.nome(),
                cognome: User.cognome(),
                email: User.email(),
                credito: User.credito(),
                privilegi: User.privilegi(),
                stato:User.stato(),
                items:[
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