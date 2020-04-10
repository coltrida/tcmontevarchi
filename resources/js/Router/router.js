import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PrenotazioniCampi from '../Components/prenotazioni/PrenotazioniCampi'
import HomePage from '../Components/HomePage'
import Storia from '../components/storia/Storia'
import Logout from '../components/login/Logout'

const routes = [
     { path: '/', component: HomePage },
     { path: '/storia', component: Storia },
     { path: '/logout', component: Logout },
     { path: '/prenotazioni/:giorno', component: PrenotazioniCampi },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hasbang : false,
    mode: 'history'
})

export default router