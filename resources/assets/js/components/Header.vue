<template>
  <header class="Header" v-if="user">
    <a href="/dashboard" title="Durian Project Management System">
      <vue-icon name="durian" fill="alpha"/>
    </a>
    <button @click="toggleSidebar">
      <vue-icon name="fa-solid-cog" fill="alpha"/>
    </button>
    <div class="Header__sidebar" v-show="showSidebar">
      <ul>
        <li><button aria-label="Logout" class="Header__sidebar-link" @click="logout">Logout</button></li>
      </ul>
    </div>
  </header>
</template>
<script>
export default {
  props: ['user'],
  data() {
    return {
      showSidebar: false,
    };
  },
  computed: {},
  watch: {},
  beforeCreate() {},
  created() {},
  mounted() {
  },
  methods: {
    toggleSidebar() {
      console.log('triggered');
      this.showSidebar = !this.showSidebar;
    },
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
