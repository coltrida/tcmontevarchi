import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PrenotazioniCampi from '../Components/prenotazioni/PrenotazioniCampi'
import HomePage from '../Components/HomePage'
import Storia from '../components/storia/Storia'
import Logout from '../components/login/Logout'
import Registrati from '../components/login/Registrati'

import Modifica from '../components/pannelloUser/modificaUser'
import CaricaFoto from '../components/pannelloUser/caricaFoto'
import CancellaOra from '../components/cancella/moduloCancella'
import CercaAmico from '../components/pannelloUser/cercaAmico'
import Soci from '../components/pannelloUser/listaSoci/listaSoci'
import PrenSpeciali from '../components/pannelloAdmin/prenSpeciali'
import CancSpeciali from '../components/pannelloAdmin/cancSpeciali'
import CancellaOraSocio from '../components/pannelloAdmin/cancellaOraSocio'
import InserisciSocio from '../components/pannelloAdmin/inserisciSocio'
import SociAdmin from '../components/pannelloAdmin/sociAdmin'
import StornaCredito from '../components/pannelloAdmin/stornaCredito'
import RicaricaCredito from '../components/pannelloAdmin/ricaricaCredito'
import InsNews from '../components/pannelloAdmin/news/insNews'


const routes = [
     { path: '/', component: HomePage, name: 'home' },
     { path: '/storia', component: Storia },
     { path: '/registrati', component: Registrati },
     { path: '/logout', component: Logout },
     { path: '/prenotazioni/:giorno', component: PrenotazioniCampi, meta: {requiresAuth: true} },

     { path: '/modifica', component: Modifica, meta: {requiresAuth: true} },
     { path: '/caricaFoto', component: CaricaFoto, meta: {requiresAuth: true} },
     { path: '/cancellaOra', component: CancellaOra, meta: {requiresAuth: true} },
     { path: '/cercaAmico', component: CercaAmico, meta: {requiresAuth: true} },
     { path: '/soci', component: Soci, meta: {requiresAuth: true} },
     { path: '/contatti', component: Soci, meta: {requiresAuth: true} },
     { path: '/prenSpeciali', component: PrenSpeciali, meta: {requiresAuth: true} },
     { path: '/cancSpeciali', component: CancSpeciali, meta: {requiresAuth: true} },
     { path: '/cancellaOraSocio', component: CancellaOraSocio, meta: {requiresAuth: true}},
     { path: '/inserisciSocio', component: InserisciSocio, meta: {requiresAuth: true} },
     { path: '/sociAdmin', component: SociAdmin, meta: {requiresAuth: true} },
     { path: '/stornaCredito', component: StornaCredito, meta: {requiresAuth: true} },
     { path: '/ricaricaCredito', component: RicaricaCredito, meta: {requiresAuth: true} },
     { path: '/insNews', component: InsNews },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hasbang : false,
    mode: 'history'
})

router.beforeEach((to, from, next) => {
    if(to.matched.some(r => r.meta.requiresAuth) && !User.loggedIn()) {
        window.location = '/'
        return
    }
    next()
})

export default router