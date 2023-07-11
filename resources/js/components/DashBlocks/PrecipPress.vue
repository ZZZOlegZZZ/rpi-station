<template lang="html">
    <box style="width: 100%">
        <div class="columns">
            <div class="column is-4">
                <p class="title is-5">
                    {{ lastData.data.precipitation_intensity }} мм/ч
                </p>
                <p class="subtitle is-6">Инт. осадков</p>
            </div>

            <div class="column is-4">
                <p class="title is-5">{{ lastData.data.pressure }} мм.рт.ст</p>
                <p class="subtitle is-6">Атм. давл.</p>
            </div>

            <div class="column is-4">
                <div class="w_icon is-pulled-right" :class="precipIcon"></div>
            </div>
        </div>
    </box>
</template>

<script>
export default {
    name: "precip-press",

    props: {
        data: Array,
        lastData: Object,
    },

    data() {
        return {
            icons: {
                0: "no_precip",
                1: "precip_rain",
                2: "precip_snow",
                3: "precip_snow_rain",
                4: "precip_undef",
                5: "precip_freezing_rain",
                6: "precip_undef",
                7: "precip_hail",
            },
        };
    },

    computed: {
        precipIcon: function () {
            return this.icons[this.lastData.data.precipitation_type];
        },
    },
};
</script>

<style lang="css"></style>
