<template lang="html">
  <div :class="classString"
  >
    <slot></slot>
  </div>
</template>

<script>

import typographyProps from '../../mixins/typographyProps.vue';
import otherProps from '../../mixins/otherProps.vue';


export default {
  name:'field',

  props: {
    hasAddons: Boolean,
  },



  mixins:[
    typographyProps,
    otherProps,
  ],

  computed:{
    classString: function() {
      let cs = 'field ';

      cs = cs + this.modifiers.get();

      if (this.hasAddons){
        cs += ' has-addons ';
      }

      return cs;
    }

  },



}
</script>

<style lang="css">
</style>
