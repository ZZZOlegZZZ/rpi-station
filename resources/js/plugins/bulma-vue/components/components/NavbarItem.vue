<template lang="html">

    <a :href="href"
    :class="{
      'is-active': active,
      'navbar-item': true,
      }">

      <img
      v-if="src"
      :src="src"
      :width="width"
      :height="height"
      :alt="alt">


      <span v-if="icon" class="icon">
        <i :class="icon"></i>
      </span>


      <slot>

        <span>
          {{name}}
        </span>

      </slot>
    </a>







</template>



<script>
import mainColorProps from '../../mixins/mainColorProps.vue';
import otherProps from '../../mixins/otherProps.vue';



export default {
  name: 'navbar-item',


  mixins:[
    mainColorProps,
    otherProps,
  ],


  props: {
    name: String,
    href: String,
    active: Boolean,

    end:{
      type:Boolean,
      default:false
    },

    brand:{
      type:Boolean,
      default:false
    },

    icon:{
      type:String,
      default:''
    },

    src:{
      type:String,
      default:''
    },

    alt:{
      type:String,
      default:''
    },

    width:{
      type:Number,
      default:null
    },

    height:{
      type:Number,
      default:null
    },

    items:{
      type:Array,
      default:null
    },
  },





}
</script>

<style lang="css">
</style>
