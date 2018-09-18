<template>
  <header>
    <div class="container">
      {{ count }}
      <button @click="$store.commit('increment')">Increment counter</button>
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
import {mapState, mapMutations} from 'vuex';
export default {
  props: {},
  data() {
    return {
      links: [
        { title: 'Navigate Home', href: '/', text: 'Home' },
        { title: 'About us', href: '/about', text: 'About' },
        { title: 'Contact us', href: '/contact', text: 'Contact' },
      ],
    };
  },
  computed: {
    ...mapState(['count']),
  },
  watch: {},
  beforeCreate() {},
  created() {},
  beforeMount() {},
  mounted() {
    console.log(this.$store)
  },
  beforeUpdate() {},
  updated() {},
  activated() {},
  deactivated() {},
  beforeDestroy() {},
  destroyed() {},
  errorCaptured() {},
  methods: {
    ...mapMutations([
      'increment', // map `this.increment()` to `this.$store.commit('increment')`
    ]),
    ...mapMutations({
      add: 'increment' // map `this.add()` to `this.$store.commit('increment')`
    })
  },
};
</script>
<style lang="sass" scoped>
  .navigation {
    background: #000;
  }
</style>
