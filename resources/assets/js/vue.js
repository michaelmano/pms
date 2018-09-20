import Vue from 'vue';
import store from './store';
import components from './components';
import mixins from './lib';

/**
 * Setup some default global functions and
 * data available to the vue instance.
 */
Vue.mixin(mixins);

/**
 * Initializing the store as a global object here
 * as Vuex has been implemented in bootstrap.js
 */
Vue.use({
  store,
  install(Vue, options) {
    Vue.prototype.$store = store;
  },
});

/**
 * Globally register all components
 */
for (const name in components) {
  Vue.component(name, components[name])
}

/**
 * Setup the main Vue application.
 */

const APP = new Vue({
  el: '#app',
});
