<template>
    <section
      v-show="isActive"
      :aria-hidden="! isActive"
      :aria-current="! isActive"
      :id="hash"
      :ref="hash"
      role="cell"
      class="tabs__panel"
    >
        <div class="tabs__content">
            <slot />
        </div>
    </section>
</template>

<script>
export default {
  props: {
    id: { default: null },
    name: { required: true },
    prefix: { default: '' },
    suffix: { default: '' },
  },
  data: () => ({
    isActive: false,
    isVisible: true,
  }),
  computed: {
    header() {
      return this.prefix + this.name + this.suffix;
    },
    hash() {
      return this.id
        ? '#' + this.id
        : '#' + this.name.toLowerCase().replace(/ /g, '-');
    },
  },
};
</script>
