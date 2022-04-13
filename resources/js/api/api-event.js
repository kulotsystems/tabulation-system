import api from './api.js';
const  url = '/api/event';

export default {

    index() {
        return api.get(url);
    },

    store(request) {
        return api.post(url, request);
    },

    show(eventID) {
        return api.get(`${url}/${eventID}`);
    }

}
