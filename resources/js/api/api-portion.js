import api from './api.js';
const  url = '/api/portion';

export default {

    store(request) {
        return api.post(url, request);
    }

}
