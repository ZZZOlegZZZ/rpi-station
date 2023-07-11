<template lang="html">
    <box style="width: 100%">
        <div class="columns">
            <div class="column">
                <p class="title is-5">{{ lastData.data.wind_speed_h }} м/с</p>
                <p class="subtitle is-6">Ветер</p>
            </div>

            <div class="column">
                <p class="title is-5">{{ lastData.data.wind_gusts_h }} м/с</p>
                <p class="subtitle is-6">Порывы</p>
            </div>

            <div class="column">
                <div class="w_icon is-pulled-right" :class="windIcon"></div>
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
    name: "wind-h",

    props: {
        data: Array,
        lastData: Object,
    },

    data() {
        return {
            icons: {
                1: "wind_n",
                2: "wind_ne",
                3: "wind_e",
                4: "wind_se",
                5: "wind_s",
                6: "wind_sw",
                7: "wind_w",
                8: "wind_nw",
            },
        };
    },

    computed: {
        windIcon: function () {
            return this.icons[this.lastData.data.wind_rhumb_h];
        },
    },
};
</script>

<style lang="css"></style>
