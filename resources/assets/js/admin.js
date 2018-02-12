window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import Vue from "vue";
import { VueForm, Form } from "@dymantic/vue-forms";
import { Modal, DeleteModal } from "@dymantic/vuetilities";

window.Vue = Vue;
window.eventHub = new Vue();



Vue.component('vue-form', VueForm);
Vue.component('modal', Modal);
Vue.component('delete-modal', DeleteModal);
Vue.component('establishment-form', require('./components/EstablishmentForm'));
Vue.component('location-search', require('./components/LocationSearch'));
Vue.component('establishment-finder', require('./components/EstablishmentFinder'));
Vue.component('establishment-page', require('./components/EstablishmentAdminPage'));
Vue.component('features-index', require('./components/FeaturesIndexPage'));
Vue.component('feature-form', require('./components/FeatureForm'));
Vue.component('feature-page', require('./components/FeaturePage'));

new Vue({el: '#app'});

window.initMaps = () => eventHub.$emit('maps-loaded');