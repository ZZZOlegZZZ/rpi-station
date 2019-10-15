<template lang="html">
  <div>
    <rzd-template v-if="ui=='rzd' && dataReady" :data="data" :alerts="alerts">
    </rzd-template>
  </div>
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
      ui: null,
      data: null,
      alerts: null,
      dataReady: false,
      updating: null,
    };
  },

  mounted() {
    this.getUI()
    .then(() => {
      this.loadAll()
      .then(() => {
        this.dataReady = true;
      })
      .catch((e) => {
        console.log(e)
      })

      this.updating = setInterval(() => {
            this.getLastData();

        }, 5000);
    })
    .catch((e) => {
      console.log(e);
    })

  },

  watch: {
    data: function(newData, oldData) {
      if (oldData && newData[newData.length - 1].measured_at != oldData[oldData.length - 1].measured_at) {


        axios.get('/api/alerts')
        .then((response) => {
          let alerts = response.data;
          for (let alert in alerts){
            if (!(alert in this.alerts)){
              let alertSound = new Audio('audio/sound.wav');
              alertSound.play();
              this.alerts = alerts;
              return true;
            }
          }
          this.alerts = alerts;

        })
        .catch((error) => {
          console.log(error)
        })
      }
    },
  },

  methods: {
    async getUI() {
      let response;

      try {
        response = await axios.get('/api/ui')
      } catch(e) {
        return (e)
      }

      this.ui = response.data;
    },

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
