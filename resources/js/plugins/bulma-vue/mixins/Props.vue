<script>
import Modifiers from '../core/modifiers.js';


export default {
  created(){
    this.modifiers.check(this);
  },

  data(){
    return {
      modifiers: new Modifiers,
    }
  },
}
</script>

<style lang="css">
</style>
