<template lang="html">
  <div
      class="navbar-dropdown"
      :class="{'is-right': right}"
      ref="dropdown"
  >
    <slot></slot>
  </div>
</template>

<script>
export default {
  name:'navbar-dropdown',

  props:{
    'right':
    {
      type:Boolean,
      default:false,
    }
  },

  methods: {
    dropdown(event){
      let dropdown = this.$refs.dropdown;
      let target = event.target;


      console.log(target);

      if (dropdown !== target && !dropdown.contains(target)){
        this.$emit('closeDropdown');
      }

    }
  },

  mounted(){
      setTimeout(window.addEventListener('click', this.dropdown), 1000);
  },

  destroyed(){
      window.removeEventListener('click', this.dropdown);
  }

}
</script>

<style lang="css">
</style>
