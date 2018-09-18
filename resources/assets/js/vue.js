import Vue from 'vue';
import store from './store';
import VueHeader from './components/Header.vue';
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
 * Setup the main Vue application.
 */
const APP = new Vue({
  el: '#app',
  components: {
    'vue-header': VueHeader,
  },
});
