<script>
import Props from './Props.vue'

export default {
  mixins:[
    Props
  ],


  props:{
    shadow: Boolean,
    horizontal: Boolean,
    narrow: Boolean,
    left:  Boolean,
    right: Boolean,
    centered: Boolean,



  },


  created(){
    this.modifiers.check(this);
  },
}
</script>
