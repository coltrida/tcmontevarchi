<template>
    <v-card
            max-width="475"
            class="mx-auto"
    >
        <v-toolbar color="teal" dark>
            <v-toolbar-title>{{titolo}}</v-toolbar-title>
        </v-toolbar>

        <v-list two-line subheader>

            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>Profile photo</v-list-item-title>
                    <v-list-item-subtitle>Change your Google+ profile photo</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>

            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>Show your status</v-list-item-title>
                    <v-list-item-subtitle>Your status is visible to everyone</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>

        <v-divider></v-divider>

    </v-card>
</template>

<script>
    export default {
        props: ['titolo'],

        data: () => ({
            settings: [],
        }),
    }
</script>

<style scoped>

</style>