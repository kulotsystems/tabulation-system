import api from './api.js';
const  url = '/api/judge';

export default {

    index(eventID) {
        return api.get(url, { params: { event: eventID } })
    },

    store(request) {
        return api.post(url, request);
    }

}
