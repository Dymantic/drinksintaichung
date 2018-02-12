import places from "../api/places";

export default {
    state: {
        all: []
    },

    getters: {
        allPlaces: state => state.all,

        filteredPlaces: (state, getters, rootState) => state.all.filter(place => place.matchesFilterList(getters.trueFilters)),

        placeById: state => (id) => {
            return state.all.find(place => place.id == id);
        }
    },

    mutations: {
        receive_places(state, {places}) {
            state.all = places;
        },

        location_updated(state, location) {
            state.all.forEach(place => place.setDistance(location));
        }
    },

    actions: {
        getAllPlaces({commit}) {
            places.getPlaces((places) => {
                commit('receive_places', {places});
            });
        }
    }
}