export default {
    namespaced: true,

    state: {
        opened: false,
        title : 'Confirm',
        prompt: '',
        no: {
            btn: {
                icon     : 'close',
                label    : 'No',
                className: '',
                loading  : false
            },
            callback: {
                async : false,
                action: null
            }
        },
        yes: {
            btn: {
                icon     : 'check',
                label    : 'Yes',
                className: 'primary',
                loading  : false
            },
            callback: {
                async : false,
                action: null,
            }
        },
        errors    : null,
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
            state.title  = 'Confirm';
            state.prompt = '';

            state.no.btn.icon  = 'close';
            state.no.btn.label = 'No';
            state.no.btn.className = '';
            state.no.btn.loading   = false;

            state.yes.btn.icon  = 'check';
            state.yes.btn.label = 'Yes';
            state.yes.btn.className = 'primary';
            state.yes.btn.loading   = false;

            state.errors     = null;
            state.persistent = false;

            if(payload) {
                if(payload.title)
                    state.title = payload.title;
                if(payload.prompt)
                    state.prompt = payload.prompt;

                if(payload.noIcon)
                    state.no.btn.icon = payload.noIcon;
                if(payload.noLabel)
                    state.no.btn.label = payload.noLabel;
                if(payload.noClass)
                    state.no.btn.className = payload.noClass;
                if(payload.noCallback) {
                    if(payload.noCallback.async)
                        state.no.callback.async = payload.noCallback.async;
                    if(payload.noCallback.action)
                        state.no.callback.action = payload.noCallback.action;
                }
                if(payload.yesIcon)
                    state.yes.btn.icon = payload.yesIcon;
                if(payload.yesLabel)
                    state.yes.btn.label = payload.yesLabel;
                if(payload.yesClass)
                    state.yes.btn.className = payload.yesClass;
                if(payload.yesCallback) {
                    if(payload.yesCallback.async)
                        state.yes.callback.async = payload.yesCallback.async;
                    if(payload.yesCallback.action)
                        state.yes.callback.action = payload.yesCallback.action;
                }
                if(payload.persistent)
                    state.persistent = payload.persistent;
            }
        },

        hide(state) {
            state.opened = false;
        },

        callback(state, option) {
            if(!state.no.btn.loading && !state.yes.btn.loading) {
                state.errors = null;

                if(state[option].callback.action != null) {
                    if(state[option].callback.async) {
                        state[option].btn.loading = true;
                        state[option].callback.action();
                    }
                    else {
                        state[option].callback.action();
                        state[option].btn.loading = false;
                        state.opened = false;
                    }
                }
                else {
                    state[option].btn.loading = false;
                    state.opened = false;
                }
            }
        },

        errors(state, errors) {
            state.no.btn.loading  = false;
            state.yes.btn.loading = false;
            if(errors)
                state.errors = errors;
        }
    }
}
