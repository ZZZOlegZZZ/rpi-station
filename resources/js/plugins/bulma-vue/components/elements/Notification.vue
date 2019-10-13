<template lang="html">
  <transition name="custom-classes-transition"
    enter-active-class="animated zoomInLeft faster"
    leave-active-class="animated zoomOutRight faster">
      <div class="notification" :class = "modifiers.get()">
        <button v-if="close" class="delete" @click = "$emit(eventClose)"></button>
          <slot></slot>
      </div>
  </transition>
</template>

<script>
import mainColorProps from '../../mixins/mainColorProps.vue';
import otherProps from '../../mixins/otherProps.vue';

export default {
  props:{
    close: Boolean,
    eventClose: String,
  },

  mixins:[
    mainColorProps,
    otherProps
  ],

}
</script>

<style lang="css">
</style>
