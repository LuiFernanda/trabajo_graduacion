/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueAlertify from 'vue-alertify';
import VueHasErrorLaravel from 'vue-has-error-laravel';

Vue.use(VueAlertify);
Vue.use(VueHasErrorLaravel,{
    className:'is-invalid',
    tagName:'div',
    tagClassName:'invalid-feedback',
    showErrorMessage:true
});
Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('form-persona', require('./components/formPersona.vue').default);
Vue.component('edit-persona', require('./components/editPersona.vue').default);
Vue.component('show-persona', require('./components/showPersona.vue').default);
Vue.component('perfil', require('./components/perfil.vue').default);
Vue.component('show-estado', require('./components/showEstado.vue').default);
Vue.component('persona-component', require('./components/PersonaComponent.vue').default);
Vue.component('estado-component', require('./components/EstadoComponent.vue').default);
Vue.component('buscador-component', require('./components/BuscarComponent.vue').default);
Vue.component('reporte-component', require('./components/ReporteComponent.vue').default);
Vue.component('info-component', require('./components/estados.vue').default);
Vue.component('user-component', require('./components/registroUser.vue').default);
Vue.component('users-component', require('./components/verUser.vue').default);

Vue.component('restado-component', require('./components/reportes/estado.vue').default);
Vue.component('rtodo-component', require('./components/reportes/todos.vue').default);
Vue.component('rcuarentena-component', require('./components/reportes/cuarentena.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});