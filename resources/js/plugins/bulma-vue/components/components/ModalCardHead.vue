<template lang="html">
  <header
      class="modal-card-head"
      :class="modifiers.get()"
  >
    <p
      class="modal-card-title"
      :class="modifiers.get()"
    >
        <slot></slot>
    </p>

    <button
        v-if="close"
        @click="$emit('closeModal')"
        class="delete"
        aria-label="close"
    >
    </button>
  </header>
</template>

<script>
import colorProps from '../../mixins/colorProps.vue'

export default {
  name: 'modal-card-head',

  mixins: [
    colorProps,
  ],

  props: {
    close: {
      type: Boolean,
      default: false,
    }
  },


}
</script>

<style lang="css">
</style>
