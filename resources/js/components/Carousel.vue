<template>
    <v-carousel :show-arrows="false" cycle hide-delimiters height="700">
        <v-carousel-item
                v-for="(item,i) in items"
                :key="i"
                :src="item.src"
        ></v-carousel-item>
    </v-carousel>
</template>

<script>
    export default {
        data () {
            return {
                items: [
                    {
                        src: 'http://tcmontevarchi.altervista.org/img/01.jpg',
                    },
                    {
                        src: 'http://tcmontevarchi.altervista.org/img/02.jpg',
                    },
                    {
                        src: 'http://tcmontevarchi.altervista.org/img/03.jpg',
                    },
                    {
                        src: 'http://tcmontevarchi.altervista.org/img/04.jpg',
                    },
                ],
            }
        },
    }
</script>

<style scoped>

</style>