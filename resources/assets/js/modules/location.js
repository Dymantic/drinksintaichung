import locationApi from "../api/location";
import geolib from "geolib";

export default {
    state: {
        latitude: null,
        longitude: null,
        permission: 'unchecked',
        last_known_region: 'unchecked',
        location_watcher_id: null,
    },

    getters: {
        location: state => ({latitude: state.latitude, longitude: state.longitude}),

        has_location: state => (state.latitude !== null) && (state.longitude !== null),

        user_region: state => state.last_known_region,

        is_watching_position: state => state.location_watcher_id !== null
    },

    mutations: {
        set_location(state, {latitude, longitude}) {
            const distance = geolib.getDistance({lat: latitude, lng: longitude}, {lat: 24.1333, lng: 120.6555});

            if(distance < 10000) {
                state.last_known_region = 'local';
                locationApi.setLastKnownRegion('local');
            } else {
                state.last_known_region = 'distant';
                locationApi.setLastKnownRegion('distant');
            }
            state.latitude = latitude;
            state.longitude = longitude;


        },

        set_location_permission_denied(state) {
            locationApi.rememberPermissionDenied();
            state.permission = "denied";
        },

        set_location_permission_granted(state) {
            locationApi.rememberPermissionGranted();
            state.permission = "granted";
        },

        set_permission_from_storage(state, permission) {
            state.permission = permission || 'not-set';
        },

        set_region_from_storage(state, region) {
            state.last_known_region = region  || 'not-set';
        },

        set_region_unavailable(state) {
            state.last_known_region = 'unavailable';
        },

        set_watch_id(state, watch_id) {
            state.location_watcher_id = watch_id;
        }
    },

    actions: {

        watchUserPosition({commit}) {
            const update_pos = (pos) => {
                commit('set_location', {latitude: pos.coords.latitude, longitude: pos.coords.longitude});
                commit('location_updated', {latitude: pos.coords.latitude, longitude: pos.coords.longitude});
                commit('set_location_permission_granted');
            };

            const watch_id = locationApi.watchUserPosition(update_pos, (err) => {
                if(err.code === 1) {
                   return commit('set_location_permission_denied');
                }
                commit('set_region_unavailable');
            });

            commit('set_watch_id', watch_id);
        },

        checkForPermissionStatus({commit}) {
            commit('set_permission_from_storage', locationApi.checkLocationPermission());
            commit('set_region_from_storage', locationApi.getLastKnowRegion());
        }
    }
}