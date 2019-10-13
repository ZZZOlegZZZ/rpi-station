<template lang="html">
  <p class="help"
     :class="modifiers.get()"
  >
    <slot></slot>
  </p>
</template>

<script>
import mainColorProps from '../../mixins/mainColorProps.vue';

export default {
  name:'help',

  mixins: [
    mainColorProps,
  ],

}
</script>

<style lang="css">
</style>
