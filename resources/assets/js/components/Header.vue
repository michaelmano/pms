<template>
  <header class="header" v-if="user">
    <nav class="navigation">
      <ul class="navigation__list">
        <li class="navigation__list-item">
          <button class="button" @click="logout">Logout</button>
        </li>
      </ul>
    </nav>
  </header>
</template>
<script>
export default {
  props: ['user'],
  data() {
    return {};
  },
  computed: {},
  watch: {},
  beforeCreate() {},
  created() {},
  mounted() {
  },
  methods: {
    logout() {
      return axios
        .post('/logout')
        .then((data) => {
          return this.redirect('/');
        })
        .catch(console.error);
    }
  },
};
</script>
