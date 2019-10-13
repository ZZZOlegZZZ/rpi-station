<script>
import Props from './Props.vue'

export default {
  mixins:[
    Props
  ],



  props:{

    'textleft':{
      type: Boolean,
      default:false,
    },

    'textcentered':{
      type: Boolean,
      default:false,
    },

    'textright':{
      type: Boolean,
      default:false,
    },

    'small':{
      type: Boolean,
      default:false,
    },

    'normal':{
      type: Boolean,
      default:false,
    },

    'large':{
      type: Boolean,
      default:false,
    },

  },

  created(){
    this.modifiers.check(this);
  },



}
</script>
