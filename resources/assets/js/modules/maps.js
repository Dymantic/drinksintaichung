export default {

    state: {
        has_loaded: false
    },

    getters: {
        is_loaded: (state) => state.has_loaded
    },

    mutations: {
        set_loaded_state(state, status) {
            state.has_loaded = status;
        }
    }
}