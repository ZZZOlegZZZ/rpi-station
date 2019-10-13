<template lang="html">
  <span class="tag"
        :class="modifiers.get()">
    <slot>{{value}}</slot>
  </span>
</template>

<script>
import colorProps from '../../mixins/colorProps.vue';
import typographyProps from '../../mixins/typographyProps.vue';
import otherProps from '../../mixins/otherProps.vue';

export default {
  name:'tag',

  mixins:[
    typographyProps,
    colorProps,
    otherProps,
  ],

  props:{
    value: '',
  },



}
</script>

<style lang="css">
</style>
