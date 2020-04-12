<template>
    <div>
        <v-list-item-subtitle >
            <div style="display: flex; justify-content: space-between">
                <div style="flex-grow:1">
                    <div style="display: flex; justify-content: space-between">
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
                              style="width: 138px"
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
                        <span v-if="prenotazione.username3">
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
                              style="width: 138px"
                      >
                        <v-avatar left>
                          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                        </v-avatar>
                        {{ prenotazione.username3 }}
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
                    <div style="display: flex; justify-content: space-between">
                <span v-if="prenotazione.username2">
                     <v-menu
                             v-model="menu3"
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
                        <span v-if="prenotazione.username4">
                    <v-menu
                            v-model="menu4"
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
                              style="width: 138px"
                      >
                        <v-avatar left>
                          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                        </v-avatar>
                        {{ prenotazione.username4 }}
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
                </div>
                <div>
                    <div>
                        <v-chip

                                color="lime accent-3"
                                class="ml-0 mb-2 black&#45;&#45;text"
                                label
                                large
                        >
                            {{prenotazione.doppio}}
                        </v-chip>


                    </div>
                </div>
            </div>




        </v-list-item-subtitle>
    </div>

</template>

<script>
    export default {
        name: "PrenotazioneDoppio",

        props: ['prenotazione'],

        data(){
            return {
                menu1: false,
                menu2: false,
                menu3: false,
                menu4: false,
            }
        }
    }
</script>

<style scoped>

</style>