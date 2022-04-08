export default {
    namespaced: true,

    state: {
        opened: false,
        title : 'Notice',
        prompt: '',
        btnOk : {
            icon     : 'done',
            label    : 'Okay',
            className: 'primary',
            loading  : false
        },
        callback: {
            async : false,
            action: null,
            errors: null
        },
        persistent: false
    },

    getters: {
        state: (state) => {
            return state
        }
    },

    mutations: {
        show(state, payload) {
            state.opened = true;
            state.title  = 'Notice';
            state.prompt = '';
            state.btnOk.icon  = 'done';
            state.btnOk.label = 'Okay';
            state.btnOk.className = 'primary';
            state.btnOk.loading   = false;
            state.callback.async  = false;
            state.callback.action = null;
            state.callback.errors = null;
            state.persistent      = false;

            if(payload) {
                if(payload.title)
                    state.title = payload.title;
                if(payload.prompt)
                    state.prompt = payload.prompt;
                if(payload.okIcon)
                    state.btnOk.icon = payload.okIcon;
                if(payload.okLabel)
                    state.btnOk.label = payload.okLabel;
                if(payload.okClass)
                    state.btnOk.className = payload.okClass;
                if(payload.callback) {
                    if(payload.callback.async)
                        state.callback.async = payload.callback.async;
                    if(payload.callback.action)
                        state.callback.action = payload.callback.action;
                }
                if(payload.persistent)
                    state.persistent = payload.persistent;
            }
        },

        hide(state) {
            state.btnOk.loading = false;
            state.opened = false;
        },

        callback(state) {
            if(!state.btnOk.loading) {
                state.callback.errors = null;

                if(state.callback.action != null) {
                    if(state.callback.async) {
                        state.btnOk.loading   = true;
                        state.callback.action();
                    }
                    else {
                        state.callback.action();
                        state.btnOk.loading = false;
                        state.opened = false;
                    }
                }
                else {
                    state.btnOk.loading = false;
                    state.opened = false;
                }
            }
        },

        errors(state, errors) {
            state.btnOk.loading = false;
            if(errors)
                state.callback.errors = errors;
        },
    }
}
