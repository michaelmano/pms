<template>
    <div class="Tabs" role="gridcell">
        <ul role="tablist" class="Tabs__list">
            <li
              v-for="(tab, index) in tabs"
              :key="index"
              v-show="tab.isVisible"
              class="Tabs__list-item"
              role="presentation"
            >
                <a
                  v-html="tab.header"
                  :aria-controls="tab.hash"
                  :aria-selected="tab.isActive"
                  @click="selectTab(tab.hash, $event)"
                  :href="tab.hash"
                  :class="['Tabs__list-link', tab.isActive ? 'is-active' : '']"
                  role="button"
                />
            </li>
        </ul>
        <div class="Tabs__panels">
            <slot/>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      tabs: [],
    };
  },
  mounted() {
    this.tabs = this.$children;
    this.mountTab();
  },
  methods: {
    mountTab() {
      if (window.location.hash) {
        const refs = this.tabs.filter(
          tab => tab.$refs[window.location.hash],
        )[0];
        if (refs) return (refs.isActive = true);
      }
      return (this.tabs[0].isActive = true);
    },
    selectTab(hash) {
      this.tabs.forEach(tab => {
        if (tab.hash === hash) {
          tab.isActive = true;
        } else {
          tab.isActive = false;
        }
      });
    },
  },
};
</script>
