<template lang="html">
  <div>
    <a @click="toggle">
      <p
        class="panel-heading is-collapsed-border"
        :class="is_active?'':'has-background-white'">
        {{title}}
        <span class="icon is-pulled-right">
          <i v-if="!is_active" class="fas fa-chevron-down"></i>
          <i v-if="is_active" class="fas fa-chevron-right"></i>
        </span>
      </p>
    </a>
    <div class="panel-acordion-block" v-if = "is_active">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'panel-accordion-item',

  props: {
    title: String,
    alias: String,
    value: String,
  },


  methods:{
    toggle() {
      if (!this.is_active){
        this.$store.commit('setActiveItem', this.alias);
      } else {
        this.$store.commit('setActiveItem', null);
      }
    },
  },

  computed:{
    is_active: function(){
      return this.value === this.alias;
    }
  }
}
</script>

<style lang="css">
</style>
