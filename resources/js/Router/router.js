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
import InsNews from '../components/pannelloAdmin/insNews'


const routes = [
     { path: '/', component: HomePage },
     { path: '/storia', component: Storia },
     { path: '/registrati', component: Registrati },
     { path: '/logout', component: Logout },
     { path: '/prenotazioni/:giorno', component: PrenotazioniCampi },

     { path: '/modifica', component: Modifica },
     { path: '/caricaFoto', component: CaricaFoto },
     { path: '/cancellaOra', component: CancellaOra },
     { path: '/cercaAmico', component: CercaAmico },
     { path: '/soci', component: Soci },
     { path: '/contatti', component: Soci },
     { path: '/prenSpeciali', component: PrenSpeciali },
     { path: '/cancSpeciali', component: CancSpeciali },
     { path: '/cancOraSocio', component: CancellaOraSocio },
     { path: '/inserisciSocio', component: InserisciSocio },
     { path: '/sociAdmin', component: SociAdmin },
     { path: '/stornaCredito', component: StornaCredito },
     { path: '/ricaricaCredito', component: RicaricaCredito },
     { path: '/insNews', component: InsNews },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hasbang : false,
    mode: 'history'
})

export default router