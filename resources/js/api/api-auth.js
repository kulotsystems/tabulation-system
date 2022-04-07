import api from './api.js';
const  url = '/api/auth';

export default {

    signIn: {
        post(request) {
            return api.post(`${url}/sign-in`, request);
        },

        get() {
            return api.get(`${url}/sign-in/user`);
        }
    },

    signOut() {
        return api.delete(`${url}/sign-out`);
    }

}
