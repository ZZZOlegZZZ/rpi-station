<template lang="en">
  <div
    class="dropdown"
    :class="[
      isActive?'is-active':'',
      isUp?'is-up':''
    ]">
    <div class="dropdown-trigger">
      <div class="field has-addons has-addons-right">
        <p class="control">
          <input
            class="input"
            type="text"
            style="width:2.3em; cursor: pointer"
            :style="{background: color.hex}"
            @click="isActive = !isActive"
            :disabled="disabled"
            readonly>
        </p>
        <p class="control">
          <a
            class="button"
            @click="isActive = !isActive"
            :disabled="disabled"
            >
            <span class="icon has-text-grey">
              <i class="fas fa-eye-dropper" aria-hidden="true"></i>
            </span>
          </a>
        </p>
      </div>
    </div>
    <div class="dropdown-menu" role="menu">
      <div class="dropdown-content">
        <div class="dropdown-item" >
          <Swatches
            v-model="color"
            style = "
              width: 320px;
              overflow-y: visible;
              background-color: #fff;
              box-shadow: none;
             "
            :palette="defaultColors"
            @input="setColor"

            />
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import {Swatches} from 'vue-color';
import {getPositionThreshold} from '../srv/srvfunc';
import material from 'material-colors'

export default {
  name: 'swatches-picker',

  components: {
    Swatches,
  },

  props: {
    value: {
      type: Object,
      default: null,
    },
    disabled: false,
  },

  data() {

    return {
      colorSetter: null,

      palette: Array,

      isUp: false,

      isActive:false,
    }
  },



  methods:{
    setColor(){
      this.isActive = false;
      this.$emit('input', this.color);
    },
  },

  mounted(){
    this.isUp = getPositionThreshold(this.$el, 65);
  },

  // updated(){
  //   this.color = {
  //     hex: this.value.hex
  //   };
  // },

  computed: {
    color: {
      get: function(){
        return this.colorSetter===null?{hex: this.value.hex}:{hex: this.colorSetter.hex}
      },
      set: function(val){
        this.colorSetter = val;

      }
    },

    defaultColors: (() => {
      let colorMap = [
        'red', 'pink', 'purple', 'deepPurple',
        'indigo', 'blue', 'lightBlue', 'cyan',
        'teal', 'green', 'lightGreen', 'lime',
        'yellow', 'amber', 'orange', 'deepOrange',
        'brown', 'blueGrey'
      ];

      let colorLevel = ['900', '700', '500', '300', '200', '100'];

      let colors = [];

      colorMap.forEach((type) => {
        let typeColor = []
        if (type.toLowerCase() === 'black' || type.toLowerCase() === 'white') {
          typeColor = typeColor.concat(['#000000', '#FFFFFF'])
        } else {
          colorLevel.forEach((level) => {
            const color = material[type][level]
            typeColor.push(color.toUpperCase())
          })
        }
        colors.push(typeColor)
      })
      return colors;
    }),


  },
}
</script>

<style lang="css">
</style>
