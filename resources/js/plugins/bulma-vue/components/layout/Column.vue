<template lang="html">
  <div :class="classString">
    <slot></slot>
  </div>
</template>

<script>
import typographyProps from '../../mixins/typographyProps.vue';
import colorProps from '../../mixins/colorProps.vue';
import otherProps from '../../mixins/otherProps.vue'

export default {
  name:'column',

  mixins:[
    typographyProps,
    colorProps,
    otherProps,
  ],

  props: {
    size: String,
    mobile: String,
    tablet: String,
    desktop: String,
    widescreen: String,
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
        7: ' is-7',
        8: ' is-8',
        9: ' is-9',
        10: ' is-10',
        11: ' is-11',
        12: ' is-12',
      },


      mobiles: {
        1: ' is-1-mobile',
        2: ' is-2-mobile',
        3: ' is-3-mobile',
        4: ' is-4-mobile',
        5: ' is-5-mobile',
        6: ' is-6-mobile',
        7: ' is-7-mobile',
        8: ' is-8-mobile',
        9: ' is-9-mobile',
        10: ' is-10-mobile',
        11: ' is-11-mobile',
        12: ' is-12-mobile',
      },


      tablets: {
        1: ' is-1-tablet',
        2: ' is-2-tablet',
        3: ' is-3-tablet',
        4: ' is-4-tablet',
        5: ' is-5-tablet',
        6: ' is-6-tablet',
        7: ' is-7-tablet',
        8: ' is-8-tablet',
        9: ' is-9-tablet',
        10: ' is-10-tablet',
        11: ' is-11-tablet',
        12: ' is-12-tablet',
      },


      desktops: {
        1: ' is-1-desktop',
        2: ' is-2-desktop',
        3: ' is-3-desktop',
        4: ' is-4-desktop',
        5: ' is-5-desktop',
        6: ' is-6-desktop',
        7: ' is-7-desktop',
        8: ' is-8-desktop',
        9: ' is-9-desktop',
        10: ' is-10-desktop',
        11: ' is-11-desktop',
        12: ' is-12-desktop',
      },

      widescreens: {
        1: ' is-1-widescreen',
        2: ' is-2-widescreen',
        3: ' is-3-widescreen',
        4: ' is-4-widescreen',
        5: ' is-5-widescreen',
        6: ' is-6-widescreen',
        7: ' is-7-widescreen',
        8: ' is-8-widescreen',
        9: ' is-9-widescreen',
        10: ' is-10-widescreen',
        11: ' is-11-widescreen',
        12: ' is-12-widescreen',
      }






    }
  },

  computed:{
    classString: function() {
      let cs = 'column ';

      cs = cs + this.modifiers.get();

      if (this.size){
        cs += this.sizes[this.size];
      }

      if (this.mobile){
        cs += this.mobiles[this.mobile];
      }

      if (this.tablet){
        cs += this.tablets[this.tablet];
      }

      if (this.desktop){
        cs += this.desktops[this.desktop];
      }

      if (this.widescreen){
        cs += this.widescreens[this.widescreen];
      }


      return cs;
    }

  },



}
</script>

<style lang="css">
</style>
