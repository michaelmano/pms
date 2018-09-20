<template>
  <aside class="Sidebar" v-if="user">
    <section class="Sidebar__widget">
      <p>You have been assigned a new ticket <a href="#">QUT223</a></p>
    </section>
    <footer class="Sidebar__footer">
      <button><vue-icon name="fa-solid-cog" fill="delta" /></button>
    </footer>
  </aside>
</template>
<script>
export default {
  props: ['user'],
  data() {
    return {};
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
