import Vue from 'vue';
import VueRouter from 'vue-router';
import SteamLogin from './components/splash/steam_view.vue';

console.log(process.env.NODE_ENV)

/**
 * Components
 */
import WrapperInviteCode from './components/splash/invite_view.vue';

Vue.use(VueRouter)

const routes = [
    { path: '/', component: WrapperInviteCode },
    { path: '/invite/:inviteCode', component: SteamLogin },

]

const router = new VueRouter({
    routes: routes,
    mode: 'history',
})

const app = new Vue({
    router
}).$mount('#app')



