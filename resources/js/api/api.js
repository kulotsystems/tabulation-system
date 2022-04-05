import axios from 'axios';
import pace  from 'pace-js';

// create and configure an axios instance
let api = axios.create({
    withCredentials: false,
});
api.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// intercept request
api.interceptors.request.use(
     (config) => {
         pace.restart();
         return config;
    },
    (errors) => {
         pace.stop();
         return Promise.reject(errors);
    }
);

// intercept response
api.interceptors.response.use(
    (response) => {
        pace.stop();
        return response;
    },
    (errors) => {
        pace.stop();
        return Promise.reject(errors);
    }
);

export default api;
