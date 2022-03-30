import('./bootstrap');

import { createApp } from 'vue';
import App    from './App.vue';
import router from './plugins/vue-router/Router.js';
import store  from './plugins/vuex-store/Store.js';

const app = createApp(App);
app.use(router);
app.use(store);

app.mount('#app');
