import Vue from 'vue';
import VueRouter from 'vue-router';


console.log(process.env.NODE_ENV)

/**
 * Components
 */
import WrapperInviteCode from './components/splash/invite_view.vue';
import SteamLogin from './components/splash/steam_view.vue';
import DownloadView from './components/splash/download_view.vue';

Vue.use(VueRouter)

const routes = [
    { path: '/', component: WrapperInviteCode },
    { path: '/invite/:inviteCode', component: SteamLogin },
    { path: '/welcome/', component: DownloadView },

]

const router = new VueRouter({
    routes: routes,
    mode: 'history',
})

const app = new Vue({
    router
}).$mount('#app')



