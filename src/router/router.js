import Vue from 'vue';
import Router from 'vue-router';
import App from '../App'
import Player from '../components/Player'

Vue.use(Router);

const router = new Router({
    hashbang: false,
});

router.map({
    '/': {
        name: 'home',
        component: Player
    },

    ':id': {
        name: 'homeMusic',
        component: Player
    }
});

export const baseUrl = window.location.href.toString().substring(0, window.location.href.toString().indexOf('/#') - 1) + 2;
export default router
