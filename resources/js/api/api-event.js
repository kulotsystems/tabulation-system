import api from './api.js';
const  url = '/api/event';

export default {

    store(request) {
        return api.post(url, request);
    }

}
