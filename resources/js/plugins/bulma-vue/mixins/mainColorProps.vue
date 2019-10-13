<script>
import Props from './Props.vue'

export default {
  mixins:[
    Props
  ],

  props:{
    primary:{
      type: Boolean,
      default:false,
    },
    link:{
      type: Boolean,
      default:false,
    },
    info:{
      type: Boolean,
      default:false,
    },
    success:{
      type: Boolean,
      default:false,
    },
    warning:{
      type: Boolean,
      default:false,
    },
    danger:{
      type: Boolean,
      default:false,
    },
  },


}
</script>
