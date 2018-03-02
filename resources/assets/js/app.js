
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

import { Modal } from "@dymantic/vuetilities";

Vue.component('modal', Modal);

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
        menuOpen: false,
        notification:{
            title: '',
            body: ''
        },
        showNotificationModal: false
    },

    computed: {
        is_home() {
            return this.$route.path === '/';
        },

        location_permission() {
            return this.$store.state.location.permission;
        },

        user_region() {
            return this.$store.getters.user_region;
        },

        has_location() {
            return this.$store.getters.has_location;
        }
    },

    watch: {
        location_permission(newPermission, oldPermission) {
            if(newPermission === 'granted' && ! this.has_location) {
                this.$store.dispatch('watchUserPosition');
            }

            if(newPermission === 'denied' && oldPermission !== 'unchecked') {
                this.showNotification('Message Received!', 'You don\'t want to share your location. We get it, no skin off our backs. If you change your mind you can just head over to the settings page.');
            }

        },

        user_region(newRegion, oldRegion) {
            const dont_report_old = ['unchecked', 'unavailable'];
            if(dont_report_old.indexOf(oldRegion) === -1) {
                switch (newRegion) {
                    case 'local':
                        this.showNotification('Welcome to the Chungle!', 'You my good friend, are in the right place at the right time. We will center the map on you, because you are awesome. Have a look around to see what this fine city has to offer.');
                        break;
                    case 'distant':
                        this.showNotification('Welcome Distant Friend', 'You seem to be a bit far out to be having a tipple in Taichung in the extremely near future. So we are just going to center the map n the center of our world for now. Hope to see you soon.');
                        break;
                    case 'unavailable':
                        this.showNotification('You\'ve gone dark soldier', 'For some reason we are not getting your location. Don\'t worry about it, we\'ll continue to use your last known location until we get an update.');
                        break;
                    default:
                        break;
                }
            }
        }
    },

    store,

    router,

    mounted() {
        store.dispatch('getAllPlaces');
        store.dispatch('getAllFeatures');
        store.dispatch('checkForPermissionStatus');
    },

    methods: {
        showNotification(title, body) {
            this.notification.title = title;
            this.notification.body = body;
            this.showNotificationModal = true;
        }
    }

});


window.initMap = () => app.$store.commit('set_loaded_state', true);
