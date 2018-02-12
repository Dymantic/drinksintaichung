export default {
    state: {
        latitude: null,
        longitude: null
    },

    getters: {
        location: state => ({latitude: state.latitude, longitude: state.longitude})
    },

    mutations: {
        set_location(state, {latitude, longitude}) {
            state.latitude = latitude;
            state.longitude = longitude;
        }
    },

    actions: {
        getUserLocation({commit}) {
            window.navigator.geolocation.getCurrentPosition(
                (pos) => {
                    commit('set_location', {latitude: pos.coords.latitude, longitude: pos.coords.longitude});
                    commit('location_updated', {latitude: pos.coords.latitude, longitude: pos.coords.longitude})
                },
                () => console.log('Failed to get location')
            );
            window.navigator.geolocation.watchPosition(
                (pos) => {
                    commit('set_location', {latitude: pos.coords.latitude, longitude: pos.coords.longitude});
                    commit('location_updated', {latitude: pos.coords.latitude, longitude: pos.coords.longitude})
                },
                () => console.log('Failed to get location')
            );
        }
    }
}