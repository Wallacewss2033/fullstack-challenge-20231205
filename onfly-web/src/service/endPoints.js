
import api from "./api";
import cookies from "../service/cookies";

export default {

    async get(endpoint, data = {}, isAuthorization = false) {

        this.addHeaders(isAuthorization);
        const response = await api.get(endpoint, data, {});
        return response.data;
    },

    async post(endpoint, data, isAuthorization = false) {

        this.addHeaders(isAuthorization);
        const response = await api.post(endpoint, data, {});
        return response.data;
    },

    async delete(endpoint, data, isAuthorization = false) {
        this.addHeaders(isAuthorization);
        const response = await api.delete(endpoint, data, {});
        return response.data;
    },

    addHeaders(isAuthorization) {
        api.defaults.headers.common.Accept = 'application/json';
        api.defaults.headers.common["Content-Type"] = 'application/json';
        if(isAuthorization){
            api.defaults.headers.common['Authorization'] = `Bearer ${cookies.get('auth-token')}`;
        }
    }
}