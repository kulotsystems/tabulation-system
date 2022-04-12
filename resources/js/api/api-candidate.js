import api from './api.js';
const  url = '/api/candidate';

export default {

    store(request) {
        return api.post(url, request);
    }

}
