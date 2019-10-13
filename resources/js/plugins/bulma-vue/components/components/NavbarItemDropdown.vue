<template lang="html">
  <div class="navbar-item has-dropdown"
    :class="{'is-active': isOpened}">
    <a
    :class="{
      'is-active': active,
      'navbar-link': true
      }"
      @click="toggle">

      <img
      v-if="src"
      :src="src"
      :width="width"
      :height="height"
      :alt="alt">


      <span v-if="icon" class="icon is-big">
        <i :class="icon"></i>
      </span>


      <slot>


        <span>
          {{name}}
        </span>

        <navbar-dropdown
          :right="end"
          v-if="isOpened"
          @closeDropdown = "isOpened = !isOpened">
          <navbar-item
          v-for="item in items"
          v-if="!item.end && !item.brand"
          :name="item.name"
          :href="item.href"
          :src="item.src"
          :alt="item.alt"
          :width="item.width"
          :height="item.height"
          :icon="item.icon"
          :items="item.items"

          :key="item.id"
          >
          </navbar-item>
        </navbar-dropdown>

      </slot>
    </a>

  </div>





</template>



<script>
import mainColorProps from '../../mixins/mainColorProps.vue';
import otherProps from '../../mixins/otherProps.vue';



export default {
  name: 'navbar-item-dropdown',

  mixins:[
    mainColorProps,
    otherProps
  ],


  data(){
    return {
      isOpened:false,
    }
  },

  methods:{
    toggle(){

      this.isOpened=!this.isOpened;
    }
  },




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
