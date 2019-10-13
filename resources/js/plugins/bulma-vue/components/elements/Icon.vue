<template lang="html">
  <span class="icon"
        :class="modifiers.get()">
    <i :class="icon"></i>
  </span>
</template>

<script>
import colorProps from '../../mixins/colorProps.vue';
import typographyProps from '../../mixins/typographyProps.vue';
import otherProps from '../../mixins/otherProps.vue';

export default {
  name:'icon',

  mixins:[
    typographyProps,
    colorProps,
    otherProps,
  ],

  props: {
    icon: {
      type: String,
      default: '',
    }
  },

}
</script>

<style lang="css">
</style>
