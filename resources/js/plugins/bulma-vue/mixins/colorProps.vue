<script>
import Props from './Props.vue'

export default {
  mixins:[
    Props
  ],

  props:{
    'textwhite': Boolean,
    'textblack': Boolean,
    'textlight': Boolean,
    'textdark': Boolean,
    'textprimary': Boolean,
    'textinfo': Boolean,
    'textlink': Boolean,
    'textsuccess': Boolean,
    'textwarning': Boolean,
    'textdanger': Boolean,
    'textblackbis': Boolean,
    'textblackter': Boolean,
    'textgreydarker': Boolean,
    'textgreygark': Boolean,
    'textgrey': Boolean,
    'textgreylight': Boolean,
    'textgreylighter': Boolean,
    'textwhiteter': Boolean,
    'textwhitebis': Boolean,


    'backgroundwhite': Boolean,
    'backgroundblack': Boolean,
    'backgroundlight': Boolean,
    'backgrounddark': Boolean,
    'backgroundprimary': Boolean,
    'backgroundinfo': Boolean,
    'backgroundlink': Boolean,
    'backgroundsuccess': Boolean,
    'backgroundwarning': Boolean,
    'backgrounddanger': Boolean,
    'backgroundblackbis': Boolean,
    'backgroundblackter': Boolean,
    'backgroundgreydarker': Boolean,
    'backgroundgreydark': Boolean,
    'backgroundgrey': Boolean,
    'backgroundgreylight': Boolean,
    'backgroundgreylighter': Boolean,
    'backgroundwhitetter': Boolean,
    'backgroundwhitebis': Boolean,
  },


  created(){
    this.modifiers.check(this);
  },


}
</script>
