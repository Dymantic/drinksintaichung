import featuresApi from "../api/features";

export default {
    state: {
        all: []

    },

    getters: {
        filterList: state => state.all,

        trueFilters: state => state.all.filter(attribute => attribute.selected),

        filterById: state => id => {
            return state.all.find(filter => filter.id === id);
        }
    },

    mutations: {
        toggle_filter(state, filter_id) {
            let feature = state.all.find(attr => attr.id === filter_id);
            feature.selected = ! feature.selected;
        },

        receive_features(state, {features}) {
            state.all = features;
        }
    },

    actions: {
        getAllFeatures({commit}) {
            featuresApi.getFeatures((features) => {
                commit('receive_features', {features});
            });
        }
    }
}