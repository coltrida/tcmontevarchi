import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PrenotazioniCampi from '../Components/prenotazioni/PrenotazioniCampi'
import HomePage from '../Components/HomePage'
import Storia from '../components/storia/Storia'
import Logout from '../components/login/Logout'

import Modifica from '../components/pannelloUser/modificaUser'
import CaricaFoto from '../components/pannelloUser/caricaFoto'
import CancellaOra from '../components/pannelloUser/cancellaOra'
import CercaAmico from '../components/pannelloUser/cercaAmico'
import Soci from '../components/pannelloUser/listaSoci/listaSoci'


const routes = [
     { path: '/', component: HomePage },
     { path: '/storia', component: Storia },
     { path: '/logout', component: Logout },
     { path: '/prenotazioni/:giorno', component: PrenotazioniCampi },

     { path: '/modifica', component: Modifica },
     { path: '/caricaFoto', component: CaricaFoto },
     { path: '/cancellaOra', component: CancellaOra },
     { path: '/cercaAmico', component: CercaAmico },
     { path: '/soci', component: Soci },
     { path: '/contatti', component: Soci },

]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hasbang : false,
    mode: 'history'
})

export default router