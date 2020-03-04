/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
require('./materialize');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this direnctory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('simple-select', require('./components/SimpleSelectComponent.vue').default);
Vue.component('multiple-select', require('./components/MultipleSelectComponent.vue').default);
Vue.component('resource-form', require('./components/ResourceFormComponent.vue').default);
Vue.component('special-line', require('./components/LineComponent.vue').default);

Vue.directive('focus', {
    inserted: function (element) {
      element.focus()
    }
});

window.onload = function(){
    const app = new Vue({
        el: '#app'
    });
};