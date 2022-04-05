import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.min.css';
import 'pace-js/themes/blue/pace-theme-minimal.css';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives
});

export default vuetify;
