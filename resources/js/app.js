/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Addpackages', require('./components/AddPackagesComponent.vue').default);
Vue.component('Packages', require('./components/PackagesComponent.vue').default);
Vue.component('Calculatepackagesrequired', require('./components/CalculatePackagesRequiredComponent.vue').default);

import Package from './classes/Package';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    props: {
        packages: Object,
    },
    created() {
        this.packages = [];
        packages.forEach((apackage) => {
            this.packages.push(new Package(apackage));
        });
    }
});
