import Vue from 'vue';
import Router from 'vue-router';
import App from '../App'
import Player from '../components/Player'

Vue.use(Router);

const basePort = 9002;
const router = new Router({
    hashbang: false,
    history: true,
});

router.map({
    '/radio': {
        name: 'home',
        component: Player
    },
    '/radio/:id': {
        name: 'homeMusic',
        component: Player
    },
});

export const baseUrl = window.location.href.toString().substring(0, window.location.href.toString().indexOf(':8')+1);
export default router
