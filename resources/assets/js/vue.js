import Vue from 'vue';
import VueNavigation from './components/Navigation.vue';

const APP = new Vue({
  el: '#app',
  components: {
    'vue-navigation': VueNavigation,
  },
});
