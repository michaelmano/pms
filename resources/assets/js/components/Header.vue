<template>
  <header class="Header" v-if="user">
    <nav class="Navigation">
      <ul class="Navigation__list">
        <li class="Navigation__list-item">
          <button class="Button" @click="logout">Logout</button>
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
        .post('/auth/logout')
        .then((data) => {
          return this.redirect('/');
        })
        .catch(console.error);
    }
  },
};
</script>
