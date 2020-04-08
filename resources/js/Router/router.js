import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//import Parallax from '../Components/parallax'
import HomePage from '../Components/HomePage'

import Storia from '../components/storia/Storia'
import Logout from '../components/login/Logout'
/*import Signup from '../components/login/signup'
import Forum from '../components/forum/Forum'

import Read from '../components/forum/read'
import Create from '../components/forum/create'
import CreateCategory from '../Components/category/CreateCategory'*/

const routes = [
     //{ path: '/', component: Parallax },
     { path: '/', component: HomePage },
     { path: '/storia', component: Storia },
     { path: '/logout', component: Logout },
    /* { path: '/signup', component: Signup },
     { path: '/forum', component: Forum, name: 'forum' },
     { path: '/ask', component: Create },
     { path: '/question/:slug', component: Read, name: 'read' },
     { path: '/category', component: CreateCategory },*/
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hasbang : false,
    mode: 'history'
})

export default router