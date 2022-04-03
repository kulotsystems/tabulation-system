import('./bootstrap');

import { createApp } from 'vue';
import App    from './App.vue';
import router from './plugins/vue-router/Router.js';
import store  from './plugins/vuex-store/Store.js';
import vuetify from './plugins/vuetify/Vuetify.js';

const app = createApp(App);
app.use(router);
app.use(store);
app.use(vuetify);

app.mount('#app');
