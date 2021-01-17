require('./bootstrap');
 
window.Vue = require('vue');

 
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import VueSweetalert2 from 'vue-sweetalert2'; 
import Vue from 'vue/dist/vue';
 
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
 
import CustomerIndex from './components/CustomerIndex.vue';
import CustomerCreate from './components/CustomerCreate.vue';
import CustomerShow from './components/CustomerShow.vue';
import CustomerEdit from './components/CustomerEdit.vue';
 
const routes = [
{
    name: 'home',
    path: '/',
    component: CustomerIndex
},
{
    name: 'create',
    path: '/customers/create',
    component: CustomerCreate
},
{
    name: 'edit',
    path: '/customers/edit/:id',
    component: CustomerEdit
},
{
    name: 'show',
    path: '/customers/show/:id',
    component: CustomerShow
},
{
    name: 'delete',
    path: '/customers/delete/:id',
    component: CustomerIndex
}
];
 
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');