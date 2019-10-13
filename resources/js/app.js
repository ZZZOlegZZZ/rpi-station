require('./bootstrap');


 import BaseTemplate from './components/Templates/BaseTemplate.vue';

 // import {store} from './store';


 const app = new Vue({
     el: '#app',
     // store,
     components:{
       BaseTemplate,
     }
 });
