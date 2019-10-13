<template lang="html">
  <header class="card-header">
    <p class="card-header-title"
       :class = "modifiers.get()">
      <slot></slot>
    </p>
  </header>
</template>

<script>
import colorProps from '../../../mixins/colorProps.vue';

export default {
  name: 'card-header',

  mixins: [
    colorProps,
  ],
}
</script>

<style lang="css">
</style>
