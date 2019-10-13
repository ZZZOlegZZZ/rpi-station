<template lang="html">
  <rzd-template v-if="template=='rzd' && dataReady" :data="data" :alerts="alerts">
  </rzd-template>
</template>

<script>
import RzdTemplate from './RzdTemplate.vue';
export default {
  name: "base-template",

  components: {
    RzdTemplate,
  },

  props: {
    template: String
  },

  data() {
    return {
      data: null,
      alerts: null,
      dataReady: false,
    };
  },

  mounted() {
    this.loadAll()
    .then(() => {
      this.dataReady = true;
    })
    .catch((e) => {
      console.log(e)
    })
  },

  methods: {
    async getLastData() {
      let response;

      try {
        response = await axios.get('/api/lastdata/10')
      } catch(e) {
        return (e)
      }

      this.data = response.data;
    },

    async getAlerts() {
      let response;

      try {
        response = await axios.get('/api/alerts')
      } catch(e) {
        return (e);
      }

      this.alerts = response.data;
    },

    async loadAll(){
      try {
        await Promise.all([
          this.getLastData(),
          this.getAlerts(),
        ]);
      } catch (e) {
        return e;
      }
      return true;
    },
  },

}
</script>

<style lang="css">
</style>
