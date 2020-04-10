<template>
    <div>
        <v-list-item-subtitle style="display: flex; justify-content: space-between">
            <div>
                <span v-if="prenotazione.username1">
                     <v-menu
                             v-model="menu1"
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
                      >
                        <v-avatar left>
                          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                        </v-avatar>
                        {{ prenotazione.username1 }}
                      </v-chip>
                    </template>
                    <v-card width="300">
                      <v-list dark>
                        <v-list-item>
                          <v-list-item-avatar>
                            <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                          </v-list-item-avatar>
                          <v-list-item-content>
                            <v-list-item-title>John Leider</v-list-item-title>
                            <v-list-item-subtitle>john@vuetifyjs.com</v-list-item-subtitle>
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
                        <v-list-item @click="() => {}">
                          <v-list-item-action>
                            <v-icon>mdi-briefcase</v-icon>
                          </v-list-item-action>
                          <v-list-item-subtitle>john@gmail.com</v-list-item-subtitle>
                        </v-list-item>
                      </v-list>
                    </v-card>
                  </v-menu>

                </span>
                <span v-if="prenotazione.username2">
                    <v-menu
                            v-model="menu2"
                            bottom
                            right
                            transition="scale-transition"
                            origin="top left"
                    >
                    <template v-slot:activator="{ on }">
                      <v-chip
                              color="red"
                              label
                              v-on="on"
                      >
                        <v-avatar left>
                          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                        </v-avatar>
                        {{ prenotazione.username2 }}
                      </v-chip>
                    </template>
                    <v-card width="300">
                      <v-list dark>
                        <v-list-item>
                          <v-list-item-avatar>
                            <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                          </v-list-item-avatar>
                          <v-list-item-content>
                            <v-list-item-title>John Leider</v-list-item-title>
                            <v-list-item-subtitle>john@vuetifyjs.com</v-list-item-subtitle>
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
                        <v-list-item @click="() => {}">
                          <v-list-item-action>
                            <v-icon>mdi-briefcase</v-icon>
                          </v-list-item-action>
                          <v-list-item-subtitle>john@gmail.com</v-list-item-subtitle>
                        </v-list-item>
                      </v-list>
                    </v-card>
                  </v-menu>
                </span>
            </div>
            <div>
                <v-chip

                        color="lime accent-3"
                        class="ml-0 mb-2 black&#45;&#45;text"
                        label
                        small
                >
                      {{prenotazione.doppio}}
                </v-chip>


            </div>

        </v-list-item-subtitle>
    </div>

</template>

<script>
    export default {
        name: "PrenotazioneSingolo",

        props: ['prenotazione'],

        data(){
            return {
                menu1: false,
                menu2: false,
            }
        }

    }
</script>

<style scoped>

</style>