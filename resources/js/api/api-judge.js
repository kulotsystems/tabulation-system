import api from './api.js';
const  url = '/api/judge';

export default {

    store(request) {
        return api.post(url, request);
    }

}
