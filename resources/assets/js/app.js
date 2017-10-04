import Vue from 'vue';
import VueRouter from 'vue-router';

/**
 * Components
 */
import WrapperInviteCode from './components/splash/wrapper_invite_code.vue';

Vue.use(VueRouter)

const routes = [
    { path: '/', component: WrapperInviteCode },
    { path: '/invite/:inviteCode', component: WrapperInviteCode },

]

const router = new VueRouter({
    routes: routes,
    mode: 'history',
})

const app = new Vue({
    router
}).$mount('#app')



