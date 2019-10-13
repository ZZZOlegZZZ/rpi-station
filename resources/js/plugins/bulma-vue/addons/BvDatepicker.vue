<template lang="html">
  <div>
    <div class="field has-addons">
      <p class="control">
        <datepicker
            :input-class="callbacks.hasErrors(name)?'input is-danger':'input'"
            :name="name"
            :format = "format"
            :placeholder = "placeholder"
            :highlighted="highlighted"
            :monday-first="true"
            :language="ru"
            :value="value"
            :required="required"
            @selected = "$emit('input', data = $event)"
        ></datepicker>
      </p>

      <p class="control" @click="openDatepicker">
        <a class="button is-outlined" :class="callbacks.hasErrors(name)?'is-danger':''">
          <span class="icon is-right is-large">
            <i class="far fa-calendar-alt"></i>
          </span>
        </a>
      </p>



    </div>

    <help
      danger
      v-if="callbacks.hasErrors(name)"
      style="white-space: pre-line"
      v-html="callbacks.getErrors(name)">
    </help>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import {en, ru} from 'vuejs-datepicker/dist/locale'
export default {
  name: 'bv-datepicker',

  components:{
    Datepicker,
  },

  model:{
    prop:'value'
  },

  props:{
    placeholder:{
      type:String,
      default: null,
    },

    value:null,
    format: null,
    name: String,
    callbacks: Object,
    required: {
      type:Boolean,
      default:false,
    }

  },



  data(){
    return{
      ru: ru,
      highlighted: {
        dates: [
          new Date(),
        ]
      },
      data: this.value,
    }
  },


  methods: {
    openDatepicker(){
      this.$el.querySelector('input').click();
      this.$el.querySelector('input').focus();
    }
  }
}
</script>

<style lang="css">
</style>
