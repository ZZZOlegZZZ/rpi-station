<template lang="html">
    <box style="width: 100%">
        <div class="columns">
            <div class="column">
                <p class="title is-5">{{ lastData.data.t_air_h }}&deg;C</p>
                <p class="subtitle is-6">Т возд.</p>
            </div>

            <div class="column">
                <p class="title is-5">{{ lastData.data.humidity_h }}%</p>
                <p class="subtitle is-6">Влажн.</p>
            </div>

            <div class="column">
                <p class="title is-5">{{ lastData.data.dew_point_h }}&deg;C</p>
                <p class="subtitle is-6">Т т.росы</p>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <p class="subtitle is-6">Верхний датчик</p>
            </div>
        </div>
    </box>
</template>

<script>
export default {
    name: "air-hum-dewp-h",

    props: {
        data: Array,
        lastData: Object,
    },
};
</script>

<style lang="css"></style>
