<template lang="html">
  <div class="field-body"
  :class="modifiers.get()"
  >
    <slot></slot>
  </div>
</template>

<script>
import typographyProps from '../../mixins/typographyProps.vue';


export default {
  name:'field-body',



  mixins:[
    typographyProps,
  ],




}
</script>

<style lang="css">
</style>
