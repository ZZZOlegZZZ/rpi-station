<template lang="html">
  <box style = "width: 100%">
    <p class = "title is-5">Предупреждения</p>
    <p class = "subtitle is-6">Опасные явления</p>
    <ul v-if="alerts">
      <li v-for = "alert in alerts" class = "has-text-danger">
        {{alert.title}}
      </li>
    </ul>

    <br>
    <p class = "subtitle is-6">Состояние станции</p>
    <ul>
      <li class = "has-text-danger is-5" v-if="doorStatus">
        Внимание! Открыта дверь шкафа станции!
      </li>
      <li class = "has-text-danger is-5" v-if="powerStatus">
        {{powerStatus}}
      </li>
    </ul>

  </box>
</template>

<script>
export default {
  name: "alert",

  props: {
    alerts: null,
    doorStatus: null,
    powerStatus: null,
  },

  mounted() {

  }

}
</script>

<style lang="css">
</style>
