import  Vue from 'vue';
// import Vuex from 'vuex';
import axios from 'axios';
import moment from 'moment';
import Plotly from 'plotly.js/dist/plotly';


import bulmaVue from './plugins/bulma-vue/bulma-vue.js';


window.Vue = Vue;
window.axios = axios;
window.moment = moment;

moment.locale('ru');


window.Plotly = Plotly;



window.axios.defaults.headers.common={
  'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").getAttribute("content"),
  'X-Requested-With': 'XMLHttpRequest',
  //'Access-Control-Allow-Credentials': 'true'
};



Vue.use(bulmaVue);


import '../sass/app.scss';
