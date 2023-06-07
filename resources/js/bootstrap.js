import _ from 'lodash';
window._ = _;

import axios from 'axios';
window.axios = axios;

import router from './routes/router'

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
window.axios.defaults.withCredentials = true;
axios.defaults.withCredentials = true;

window.axios.interceptors.response.use({},err => {
    if(err.response.status === 401 || err.response.status === 419){
        const token = localStorage.getItem('x_xsrf_token');
        if(token){
            localStorage.removeItem('x_xsrf_token');
        }
        // router.push({
        //     name: 'home'
        // })
    }
})
