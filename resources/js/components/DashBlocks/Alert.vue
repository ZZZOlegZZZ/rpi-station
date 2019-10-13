<template lang="html">
  <box style = "width: 100%">
    <p class = "title is-5">Предупреждения</p>
    <ul v-if="alerts">
      <li v-for = "alert in alerts" class = "has-text-danger">
        {{alert.title}}
      </li>
    </ul>
  </box>
</template>

<script>
export default {
  name: "alert",

  props: {
    alerts: Object,
  },

  mounted() {
    console.log(this.alerts);

  }

}
</script>

<style lang="css">
</style>
