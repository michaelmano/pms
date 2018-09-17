<template>
  <header>
    <div class="container">
      {{ msg }}
      <nav class="navigation">
        <ul class="navigation__list">
          <li
            v-for="(link, index) in links"
            :key="index"
            class="navigation__list-item"
          >
            <a
              :title="link.title"
              :href="link.href"
              class="navigation__list-link"
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
  props: {
    msg: {
      type: String,
      default: null,
    },
  },
  data() {
    return {
      links: [
        { title: 'Navigate Home', href: '/', text: 'Home' },
        { title: 'About us', href: '/about', text: 'About' },
        { title: 'Contact us', href: '/contact', text: 'Contact' },
      ],
    };
  },
  computed: {},
  watch: {},
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
  methods: {},
};
</script>
<style lang="sass" scoped>
  .navigation {
    background: #000;
  }
</style>
