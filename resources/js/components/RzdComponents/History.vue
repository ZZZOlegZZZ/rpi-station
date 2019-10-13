<template lang="html">
  <modal>
    <modal-card style="min-width: 80vw; min-height: 50vh">
      <modal-card-head
          close
          @closeModal="$emit('closeHistory')"
          textWhiteTer
      >
        <h4 class="subtitle">
          История наблюдений
        </h4>
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

          <column  class="is-3">
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
          <column  class="is-3">
            <a class="button is-info" @click="getHistory">
              Составить отчет
            </a>
          </column>
        </columns>


        <table class="table" v-if = "history">
          <thead>
            <tr>
              <th rowspan="2">Дата/время</th>
              <th rowspan="2">Tв,<br>&deg;С</th>
              <th rowspan="2">Влажн.,<br>%</th>
              <th rowspan="2">Давл.,<br>мм&nbsp;рт.ст.</th>
              <th rowspan="2">Осадки</th>
              <th rowspan="2">Инт. осад.,<br>мм/ч</th>
              <th rowspan="2">Напр. ветра</th>
              <th rowspan="2">Ск. ветра,<br>м/с</th>
              <th rowspan="2">Трельса,<br>&deg;С</th>
              <th colspan="5">Т балластной призмы, &deg;С</th>
            </tr>
            <tr>
              <th>5 см</th>
              <th>10 см</th>
              <th>15 см</th>
              <th>20 см</th>
              <th>40 см</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for = "data_chunk in history">
              <td>{{formatDate(data_chunk.measured_at)}}</td>
              <td>{{data_chunk.data.t_air}}</td>
              <td>{{data_chunk.data.humidity}}</td>
              <td>{{data_chunk.data.humidity}}</td>
              <td>{{data_chunk.data.precipitation_type}}</td>
              <td>{{data_chunk.data.precipitation_intensity}}</td>
              <td>{{data_chunk.data.wind_rhumb}}</td>
              <td>{{data_chunk.data.wind_speed}}</td>
              <td>{{data_chunk.data.t_rail}}</td>
              <td>{{data_chunk.data.t_prism_1}}</td>
              <td>{{data_chunk.data.t_prism_2}}</td>
              <td>{{data_chunk.data.t_prism_3}}</td>
              <td>{{data_chunk.data.t_prism_4}}</td>
              <td>{{data_chunk.data.t_prism_5}}</td>
            </tr>
          </tbody>
        </table>
      </modal-card-body>
    </modal-card>
  </modal>
</template>

<script>
import Forms from '../mixins/Forms.vue';
export default {
  name: "history",

  mixins: [
    Forms,
  ],

  data() {
    return {
      history: null,
      startDate: null,
      endDate: null,
    }
  },

  methods: {
    formatDate(date) {
      return moment(date).format('DD MMMM hh:mm');
    },
    getHistory() {
      let props = {
        params: {
          startDate: this.startDate?moment(this.startDate).format('YYYY-MM-DD'):null,
          endDate: this.endDate?moment(this.endDate).format('YYYY-MM-DD 23:59:59'):null,
        }
      };

      axios.get('/api/history', props)
      .then((response) => {
        this.history = response.data;
      })
      .catch((error) => {
        this.errors = error.response.data.errors;
      })

    },
  },
}
</script>

<style lang="css">
</style>
