<template>
  <header class="Header" v-if="user">
    <a href="/dashboard" title="Durian Project Management System">
      <vue-icon name="durian" fill="alpha"/>
    </a>
    <a href="/dashboard" title="Durian Project Management System">
      <vue-icon name="fa-solid-cog" fill="alpha"/>
    </a>
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
        .post('/auth/logout')
        .then((data) => {
          return this.redirect('/');
        })
        .catch(console.error);
    }
  },
};
</script>
