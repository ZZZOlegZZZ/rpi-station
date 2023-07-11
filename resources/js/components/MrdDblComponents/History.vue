<template lang="html">
    <modal>
        <modal-card style="min-width: 80vw; min-height: 50vh">
            <modal-card-head
                close
                @closeModal="$emit('closeHistory')"
                textWhiteTer
            >
                <h4 class="subtitle">История наблюдений</h4>
            </modal-card-head>

            <modal-card-body>
                <columns>
                    <column class="is-3">
                        <bv-datepicker
                            name="start_date"
                            class="is-full-expanded"
                            placeholder="Начальная дата"
                            v-model="startDate"
                            :callbacks="callbacks"
                            @input="clearErrors('start_date')"
                            required
                        ></bv-datepicker>
                    </column>

                    <column class="is-3">
                        <bv-datepicker
                            name="end_date"
                            class="is-full-expanded"
                            placeholder="Конечная дата"
                            v-model="endDate"
                            :callbacks="callbacks"
                            @input="clearErrors('end_date')"
                            required
                        ></bv-datepicker>
                    </column>
                    <column class="is-3">
                        <a class="button is-info" @click="getHistory">
                            Составить отчет
                        </a>
                    </column>
                </columns>

                <table class="table" v-if="history">
                    <thead>
                        <tr>
                            <th rowspan="2">Дата/время</th>
                            <th colspan="6">Верхние датчики</th>
                            <th colspan="6">Нижние датчики</th>
                            <th rowspan="2">Давл.,<br />мм&nbsp;рт.ст.</th>
                            <th rowspan="2">Осадки</th>
                            <th rowspan="2">Инт. осад.,<br />мм/ч</th>
                        </tr>
                        <tr>
                            <th>Tв,<br />&deg;С</th>
                            <th>Влажн.,<br />%</th>
                            <th>Tтр,<br />&deg;С</th>
                            <th>Напр. ветра</th>
                            <th>Ск. ветра,<br />м/с</th>
                            <th>Пор. ветра,<br />м/с</th>
                            <th>Tв,<br />&deg;С</th>
                            <th>Влажн.,<br />%</th>
                            <th>Tтр,<br />&deg;С</th>
                            <th>Напр. ветра</th>
                            <th>Ск. ветра,<br />м/с</th>
                            <th>Пор. ветра,<br />м/с</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data_chunk in history">
                            <td>{{ formatDate(data_chunk.measured_at) }}</td>
                            <td>{{ data_chunk.data.t_air_h }}</td>
                            <td>{{ data_chunk.data.humidity_h }}</td>
                            <td>{{ data_chunk.data.dew_point_h }}</td>
                            <td>{{ data_chunk.data.wind_dir_h }}</td>
                            <td>{{ data_chunk.data.wind_speed_h }}</td>
                            <td>{{ data_chunk.data.wind_gusts_h }}</td>
                            <td>{{ data_chunk.data.t_air_l }}</td>
                            <td>{{ data_chunk.data.humidity_l }}</td>
                            <td>{{ data_chunk.data.dew_point_l }}</td>
                            <td>{{ data_chunk.data.wind_dir_l }}</td>
                            <td>{{ data_chunk.data.wind_speed_l }}</td>
                            <td>{{ data_chunk.data.wind_gusts_l }}</td>
                            <td>{{ data_chunk.data.pressure }}</td>
                            <td>{{ data_chunk.data.precipitation_type }}</td>
                            <td>
                                {{ data_chunk.data.precipitation_intensity }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </modal-card-body>
        </modal-card>
    </modal>
</template>

<script>
import Forms from "../mixins/Forms.vue";
export default {
    name: "history",

    mixins: [Forms],

    data() {
        return {
            history: null,
            startDate: null,
            endDate: null,
        };
    },

    methods: {
        formatDate(date) {
            return moment(date).format("DD MMMM hh:mm");
        },
        getHistory() {
            let props = {
                params: {
                    startDate: this.startDate
                        ? moment(this.startDate).format("YYYY-MM-DD")
                        : null,
                    endDate: this.endDate
                        ? moment(this.endDate).format("YYYY-MM-DD 23:59:59")
                        : null,
                },
            };

            axios
                .get("/api/history", props)
                .then((response) => {
                    this.history = response.data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

<style lang="css"></style>
