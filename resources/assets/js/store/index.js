import Vuex from 'vuex';

export default new Vuex.Store({
  state: {},
  mutations: {
    setProperty(state, payload) {
      state[payload.property] = payload.value;
    },
  },
});
