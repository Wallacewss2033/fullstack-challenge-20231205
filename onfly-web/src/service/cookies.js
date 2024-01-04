import Cookies from "js-cookie";

export default {
    set(name, value) {
        Cookies.set(name, value);
    },

    get(name) {
        return Cookies.get(name);
    },

    remove(name) {
        return Cookies.remove(name);
    },
};