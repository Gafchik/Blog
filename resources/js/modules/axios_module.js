import axios from 'axios';

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'CSRF': document.querySelector('meta[name="csrf-token"]').content,
};

export default axios;
