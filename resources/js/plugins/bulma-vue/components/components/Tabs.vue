<template lang="html">
  <div :class = "classString">
    <ul>
      <li v-for = "(tab, index) in tabs" :key="index"
          :class= "{'is-active': tab.name === activeTab}"
      >
        <a @click = "changeTab(tab.name)">{{tab.label}}</a>
      </li>
    </ul>
  </div>
</template>

<script>
import otherProps from '../../mixins/otherProps.vue';


export default {
  name: 'tabs',

  mixins: [
    otherProps,
  ],

  props: {
    tabs: Array,
    boxed: Boolean,
    toggle: Boolean,
    fullwidth: Boolean,
    toggleRounded: Boolean,
    small: Boolean,
    medium: Boolean,
    large: Boolean,
  },

  data() {
    return {
      activeTab: Object,
    }
  },

  created() {
    this.activeTab = this.tabs[0].name;
  },

  methods: {
    changeTab(name) {
      this.activeTab = name;
      this.$emit('changeTab', name);
    }
  },

  computed:{
    classString: function() {
      let cs = 'tabs ';

      cs = cs + this.modifiers.get();

      if (this.boxed){
        cs += ' is-boxed ';
      }

      if (this.toggle){
        cs += ' is-toggle ';
      }

      if (this.fullwidth){
        cs += ' is-fullwidth ';
      }

      if (this.toggleRounded){
        cs += ' is-toggle is-toggle-rounded ';
      }

      if (this.small){
        cs += ' is-small ';
      }

      if (this.medium){
        cs += ' is-medium ';
      }

      if (this.large){
        cs += ' is-large ';
      }


      return cs;
    }

  },

}
</script>

<style lang="css">
</style>
