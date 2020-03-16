<template lang="html">
  <box style = "width: 100%">
    <div class="columns">
      <div class="column is-12">
        <p class="title is-5">
          {{lastData.data.t_rail}}&deg;C
        </p>
        <p class="subtitle is-6">
          Температура рельса
        </p>
      </div>
    </div>

    <div class="columns">
      <div class="column is-4">
        <p class="title is-5">
          {{lastData.data.t_prism_1}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т 5см
        </p>
      </div>

      <div class="column is-4">
        <p class="title is-5">
          {{lastData.data.t_prism_2}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т 10см
        </p>
      </div>

      <div class="column is-4">
        <p class="title is-5">
          {{lastData.data.t_prism_3}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т 15см
        </p>
      </div>
    </div>

    <div class="columns">
      <div class="column is-4">
        <p class="title is-5">
          {{lastData.data.t_prism_4}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т 20см
        </p>
      </div>

      <div class="column is-4">
        <p class="title is-5">
          {{lastData.data.t_prism_5}}&deg;C
        </p>
        <p class="subtitle is-6">
          Т 40см
        </p>
      </div>

    </div>
  </box>
</template>

<script>
export default {
  name: "rail-prism",

  props: {
    data: Array,
    lastData: Object,
  },
}
</script>

<style lang="css">
</style>
