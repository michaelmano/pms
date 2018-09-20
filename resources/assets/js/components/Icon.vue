<template>
  <i :class="classList" v-html="icon(name)"/>
</template>
<script>
export default {
  name: "vue-icon",
  props: {
    name: {
      type: String,
      required: true,
    },
    size: {
      type: String,
      default: 'sm'
    },
    fill: {
      type: String,
      default: 'bravo'
    }
  },
  computed: {
    classList() {
      return [
        'Icon',
        'Icon--'+this.size,
        'Icon--fill-'+this.fill,
      ];
    }
  }
}
</script>
