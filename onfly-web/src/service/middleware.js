import endPoints from "./endPoints";

const auth = (to, from, next) => {
    
    endPoints.get('/check-token', '', true).then(() => {
        console.log('auth-mid');
        next();
    }).catch(() => {
        next('/')
    })
};

export default auth;