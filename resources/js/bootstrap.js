import Datepicker from 'flowbite-datepicker/Datepicker';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const datepickerEl = document.getElementById('dob');
new Datepicker(datepickerEl, {
    // options
});
