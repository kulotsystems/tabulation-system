import { createStore } from 'vuex';

const store = createStore({
    state: {
        counter: 0
    },

    getters: {
        getCounter: (state) => {
            return state.counter;
        }
    },

    mutations: {
        setCounter: (state, payload) => {
            state.counter = payload;
        },
        decrementCounter: (state) => {
            state.counter -= 1;
        },
        incrementCounter: (state) => {
            state.counter += 1;
        }
    }
});

export default store;
