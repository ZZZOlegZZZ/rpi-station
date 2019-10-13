<script>
import Props from './Props.vue'

export default {
  mixins:[
    Props
  ],

  props:{

    clearfix: Boolean,
    pulledleft: Boolean,
    pulledright: Boolean,

    marginless: Boolean,
    paddingless: Boolean,

    overlay: Boolean,
    clipped: Boolean,
    radiusless: Boolean,
    shadowless: Boolean,
    unselectable: Boolean,
    invisible: Boolean,
    srOnly: Boolean,


  },
}
</script>
