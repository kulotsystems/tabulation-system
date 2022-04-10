import { createStore } from 'vuex';

// --- MODULES ------------------------------------------------------------
import auth   from './modules/store-auth.js';
import dialog from './modules/store-dialog.js';

const store = createStore({
    state: {

    },

    getters: {

    },

    mutations: {

    },

    actions: {

    },

    modules: {
        auth,
        dialog
    }
});

export default store;
