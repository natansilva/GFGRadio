import Vue from 'vue';
import Router from 'vue-router';
import App from '../App'
import Player from '../components/Player'

Vue.use(Router);

const router = new Router({
    hashbang: false,
});

router.map({
    ':id': {
        name: 'homeMusic',
        component: Player
    }
});

export const baseUrl = 'http://10.10.31.232:9002';
export default router
