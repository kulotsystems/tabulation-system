export default {
    namespaced: true,

    state: {
        opened: false
    },

    getters: {
        state: (state) => {
            return state
        }
    },

    mutations: {
        show(state, payload) {
            state.opened = true;
        },

        hide(state) {
            state.opened = false;
        },
    }
}
