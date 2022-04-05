import api from './api.js';
const  url = '/api/auth';

export default {

    test() {
        return api.get(`${url}/test`);
    }

}
