<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import toolbar from './Toolbar'
    import AppFooter from './AppFooter'
    export default {
        components: {toolbar, AppFooter},
        /*created() {
            document.addEventListener('beforeunload', this.handler)
        },
        methods: {
            handler: function handler(event) {
                alert('ciao')
                User.logout()
            }
        }*/
    }
</script>
