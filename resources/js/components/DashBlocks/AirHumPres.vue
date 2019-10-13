<template lang="html">
  <box style = "width: 100%">
    <div class="columns">
      <div class="column">
        <p class="title is-5">
          {{lastData.data.t_air}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т возд.
        </p>
      </div>

      <div class="column">
        <p class="title is-5">
          {{lastData.data.humidity}}%
        </p>
        <p class="subtitle is-6">
          Влажн.
        </p>
      </div>

      <div class="column">
        <p class="title is-5">
          {{lastData.data.pressure}}
        </p>
        <p class="subtitle is-6">
          Давл.
        </p>
      </div>
    </div>
  </box>
</template>

<script>
export default {
  name: "air-hum-press",

  props: {
    data: Array,
    lastData: Object,
  },
}
</script>

<style lang="css">
</style>
