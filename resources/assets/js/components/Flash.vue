<template>
  <section :class="['flash', 'flash--'+type]" v-if="show">
    {{ message }}
  </section>
</template>
<script>
export default {
  props: {
    message: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      default: 'success'
    }
  },
  data() {
    return {
      show: true,
    };
  },
  mounted() {
    setTimeout(() => {
      this.show = false;
    }, 5000);
  }
}
</script>
