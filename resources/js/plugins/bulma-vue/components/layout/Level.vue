<template lang="html">
  <nav class="level">
    <slot></slot>
  </nav>
</template>

<script>
import mainColorProps from '../../mixins/mainColorProps.vue';

export default {
  name:'level',

  mixins:[
    mainColorProps,
  ],

  created(){
    this.classString = "level " + this.modifiers.get();
  }
}
</script>

<style lang="css">
</style>
