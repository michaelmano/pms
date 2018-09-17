<template>
  <header>
    <div class="container">
      {{ msg }}
      <nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__list-item" v-for="(link, index) in links" :key="index">
            <a class="navigation__list-link"
               :title="link.title"
               :href="link.href"
               v-text="link.text"
            />
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>
<script>
export default {
  beforeCreate() {},
  created() {},
  beforeMount() {},
  mounted() {},
  beforeUpdate() {},
  updated() {},
  activated() {},
  deactivated() {},
  beforeDestroy() {},
  destroyed() {},
  errorCaptured() {},
  data() {
    return {
      links: [
        { title: 'Navigate Home', href: '/', text: 'Home' },
        { title: 'About us', href: '/about', text: 'About' },
        { title: 'Contact us', href: '/contact', text: 'Contact' },
      ],
    };
  },
  props: {
    msg: {
      type: String,
      default: null,
    },
  },
  watch: {},
  methods: {},
  computed: {},
};
</script>
<style lang="sass" scoped>
  .navigation {
    background: #000;
  }
</style>
