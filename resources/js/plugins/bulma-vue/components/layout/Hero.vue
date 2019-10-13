<template lang="html">
  <section
      :class="classString"
      >
    <slot>
    </slot>
  </section>
</template>

<script>
import mainColorProps from '../../mixins/mainColorProps.vue';


export default {
  name:'hero',

  mixins:[
    mainColorProps,
  ],

  props:{
    'fullheight':{
      type:Boolean,
      default:false,
    }
  },


  created(){
    this.classString = "hero " + this.modifiers.get();
    this.classString += (this.fullheight ? ' is-fullheight': '')
  }

}
</script>

<style lang="css">
</style>
