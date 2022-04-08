export default {
    namespaced: true,

    state: {
        opened : false,
        title  : 'Error',
        reload : false,
        message: '',
        errors : {}
    },

    getters: {
        state: (state) => {
            return state
        }
    },

    mutations: {
        show(state, payload) {
            state.opened  = true;
            state.title   = 'Error';
            state.reload  = false;
            state.message = '';
            state.errors  = {};

            if(payload) {
                if(payload.title)
                    state.title  = payload.title;
                if(payload.reload)
                    state.reload = payload.reload;
                if(payload.response) {
                    if(payload.response.data) {
                        if(payload.response.data.message)
                            state.message = payload.response.data.message === 'Unauthenticated.' ? 'Current session has expired.' : payload.response.data.message;
                        if(payload.response.data.errors)
                            state.errors  = payload.response.data.errors;
                    }
                }
                else
                    state.opened  = false;
            }
        },

        hide(state) {
            state.opened = false;
        },
    }
}
