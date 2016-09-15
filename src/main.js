import Vue from 'vue';
import Router from './router/router';
import Vuex from 'vuex';
import VueMdl from 'vue-mdl';
import App from './App';

Vue.use(VueMdl);

const app = Vue.extend(App);

Router.start(app, '#app')
