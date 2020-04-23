<template>
    <div>
        <carousel v-if="!loggedIn"></carousel>
        <parallax v-else></parallax>
        <schede></schede>
    </div>
</template>

<script>
    import Carousel from './Carousel'
    import Parallax from './parallax'
    import Schede from './Schede'
    export default {
        name: "HomePage",

        components: {Carousel, Schede, Parallax},

        data(){
            return {
                loggedIn: User.loggedIn(),
                
            }
        }
    }
</script>

<style scoped>

</style>