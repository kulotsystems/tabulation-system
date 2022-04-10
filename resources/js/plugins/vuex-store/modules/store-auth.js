/*
|--------------------------------------------------------------------------
| VUEX STORE MODULE: auth
|--------------------------------------------------------------------------
| Front-end user authentication helper
|
*/

import router from '../../vue-router/Router.js';

export default {

    namespaced: true,

    state: {
        user: null,
        loaded   : false,
        signedIn : false,
        signedOut: false
    },

    getters: {
        user: (state) => {
            return state.user;
        },
        loaded: (state) => {
            return state.loaded
        },
        signedIn: (state) => {

        },
        signedOut: (state) => {
            return state.loaded && (router.history.current.meta.rules.user.accept && !router.history.current.meta.rules.guest.accept) && state.signedOut;
        },
    },

    mutations: {
        setUser(state, user) {
            state.user = user;

            if(user == null) {
                state.signedIn  = false;
                state.signedOut = true;
            }
            else {
                state.signedOut = false;
                if(user)
                    state.signedIn = true;
            }
        },
        load(state) {
            state.loaded = true;
        }
    },

    modules: {

    }
}
