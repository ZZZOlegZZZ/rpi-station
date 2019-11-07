<template lang="html">
  <box style = "width: 100%">
    <div class="columns">
      <div class="column">
        <p class="title is-5">
          {{lastData.data.input_voltage}} В
        </p>
        <p class="subtitle is-6">
          Напр. сети
        </p>
      </div>

      <div class="column">
        <p class="title is-5">
          {{lastData.data.input_current}} А
        </p>
        <p class="subtitle is-6">
          Ток
        </p>
      </div>

      <div class="column">
        <p class="title is-5">
          {{lastData.data.input_power}} Вт
        </p>
        <p class="subtitle is-6">
          Мощн.
        </p>
      </div>
    </div>
    <div class="columns">
      <div class="column">
        <p class="title is-5">
          {{lastData.data.battery_voltage}} В
        </p>
        <p class="subtitle is-6">
          Напр. акк.
        </p>
      </div>
    </div>
  </box>
</template>

<script>
export default {
  name: "telemetry",

  props: {
    data: Array,
    lastData: Object,
  },
}
</script>

<style lang="css">
</style>
