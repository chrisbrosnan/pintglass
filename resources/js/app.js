/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'

Vue.prototype.$http = axios
// require('./jquery');
// require('./bootstrap');

Vue.use(Vue);

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('footer-block', require('./components/FooterBlock.vue'));
// Vue.component('header-menu', require('./components/HeaderMenu.vue'));
//Vue.component('header-bar', require('./components/HeaderBar.vue'));
// Vue.component('in-app-menu', require('./components/InAppMenu.vue'));
// Vue.component('home-slider', require('./components/HomeSlider.vue'));
// Vue.component('website-carbon', require('./components/WebsiteCarbon.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import HeaderMenu from './components/HeaderMenu'
// import HeaderBar from './components/HeaderBar'
// import InAppMenu from './components/InAppMenu'
// import FooterBlock from './components/FooterBlock'
// import HomeSlider from './components/HomeSlider'
// import WebsiteCarbon from './components/WebsiteCarbon'
// import ExampleComponent from './components/ExampleComponent'

Vue.component('comment', require('./components/Comments.vue'));

import comment from './components/Comments'

const app = new Vue({
    el: '#app',
	components: {
    	comment
	}
});
