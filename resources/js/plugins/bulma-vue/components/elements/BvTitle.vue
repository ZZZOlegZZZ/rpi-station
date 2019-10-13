<template lang="html">
  <p :class="classString">
    <slot></slot>
  </p>
</template>

<script>
import colorProps from '../../mixins/colorProps.vue';


export default {
  name: 'bv-title',

  mixins: [
    colorProps,
  ],

  props:{
    spaced: Boolean,
    size: String,
  },

  data(){
    return {
      sizes: {
        1: ' is-1',
        2: ' is-2',
        3: ' is-3',
        4: ' is-4',
        5: ' is-5',
        6: ' is-6',
      },
    }
  },

  computed:{
    classString: function() {
      let cs = 'title ';
      cs = cs + this.modifiers.get();
      if (this.spaced){
        cs = cs + ' is-spaced';
      }
      if (this.size){
        cs += this.sizes[this.size];
      }

      return cs;
    }

  },
}
</script>

<style lang="css">
</style>
