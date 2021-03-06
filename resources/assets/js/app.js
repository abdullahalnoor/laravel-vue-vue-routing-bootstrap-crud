/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter)

const ExampleComponent = require('./components/ExampleComponent.vue');
const Tasks = require('./components/TaskComponent.vue');

const routes = [{
        path: '/',
        component: Tasks,
    },
    {
        path: '/example',
        component: ExampleComponent
    }
]

const router = new VueRouter({
    routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({

    router
}).$mount('#app')