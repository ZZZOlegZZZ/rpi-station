<template lang="html">
  <div :class="classString">
    <slot></slot>
  </div>
</template>

<script>
import otherProps from '../../mixins/otherProps.vue'
import colorProps from '../../mixins/colorProps.vue'

export default {
  name:'columns',

  mixins: {
    otherProps,
    colorProps,
  },


  props: {
    multiline: Boolean,
    gap: String,
  },


  data (){
    return {
      gaps: {
        1: ' is-1 ',
        2: ' is-2 ',
        3: ' is-3 ',
        4: ' is-4 ',
        5: ' is-5 ',
        6: ' is-6 ',
      }
    }
  },



  mixins: [
    otherProps,
  ],


  computed:{
    classString: function() {
      let cs = 'columns ';

      cs = cs + this.modifiers.get();

      if (this.multiline){
        cs += ' is-multiline ';
      }

      if (this.gap){
        cs += this.gap[this.gaps];
      }

      return cs;
    }

  },


}
</script>

<style lang="css">
</style>
