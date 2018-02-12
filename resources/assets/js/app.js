
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from "vue-router";

Vue.use(Vuex);
Vue.use(VueRouter);

window.Vue = Vue;

import PlaceList from "./components/PlaceList.vue";
import Filters from "./components/Filters.vue";
import SplashScreen from "./components/SplashScreen.vue";
import PlaceMap from "./components/PlaceMap.vue";
import Establishment from "./components/Establishment.vue";
import RequestEstablishment from "./components/RequestEstablishment";
import AboutPage from "./components/AboutPage";
import ThankYou from "./components/ThankYou";
import places from "./modules/places";
import filter from "./modules/filters";
import location from "./modules/location";
import maps from "./modules/maps";

const routes = [
    {path: '/', component: SplashScreen},
    {path: '/about', component: AboutPage},
    {path: '/filters', component: Filters},
    {path: '/list', component: PlaceList},
    {path: '/map', component: PlaceMap},
    {path: '/places/:id', component: Establishment, props: true},
    {path: '/request-establishment', component: RequestEstablishment},
    {path: '/thanks', component: ThankYou}
];

const router = new VueRouter({routes});

const store = new Vuex.Store({

    modules: {
        filter,
        places,
        location,
        maps
    }
});

window.eventHub = new Vue();

const app = new Vue({
    el: '#app',

    data: {
        menuOpen: false
    },

    computed: {
        is_home() {
            return this.$route.path === '/';
        }
    },

    store,

    router,

    mounted() {
        store.dispatch('getAllPlaces');
        store.dispatch('getAllFeatures');
        store.dispatch('getUserLocation');
    }

});


window.initMap = () => app.$store.commit('set_loaded_state', true);
