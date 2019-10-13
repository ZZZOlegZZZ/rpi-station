<template lang="html">
  <a
      :href = "href"
      class = "card-footer-item"
      @click = "$emit('click')"
  >
    <icon
        v-if = "icon"
        :icon = "icon"
    ></icon>
    <slot></slot>
  </a>
</template>

<script>
export default {
  name: 'card-footer-item',

  props: {
    href: {
      type: String,
      default: null
    },
    icon:{
      type: String,
      default: null,
    }

  }
}
</script>

<style lang="css">
</style>
