import Vue from 'vue';
import Router from './router/router';
import Vuex from 'vuex';
import App from './App';

const app = Vue.extend(App);

Router.start(app, '#app')
