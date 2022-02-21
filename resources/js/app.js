require('./bootstrap');

window.Vue = require('vue').default;
import router from './router.js';

import User from './Helper/User.js';
window.User=User;

import Notify from './Helper/Noty.js';
window.Notify=Notify;

import Swal from 'sweetalert2'
window.Swal=Swal;
window.Reload=new Vue();
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });

window.Toast=Toast;

const app = new Vue({
    router,
    mode: 'history',
    el: '#app',
});
