<template lang="html">
  <div class="field-label"
  :class="modifiers.get()"
  >
    <label class="label"><slot></slot></label>
  </div>
</template>

<script>
import typographyProps from '../../mixins/typographyProps.vue';


export default {
  name:'field-label',



  mixins:[
    typographyProps,
  ],




}
</script>

<style lang="css">
</style>
