<template lang="html">
  <div>
    <div
        class="control"
        :class="{'has-icons-left': leftIcon || iconsLeft,
                 'has-icons-right': rightIcon || iconsRight}"
        >
      <slot>
        <input
            v-if="element==='input'"
            class="input"
            :class="{
              'is-primary': primary,
              'is-link': link,
              'is-info': info,
              'is-success': success,
              'is-warning': warning,
              'is-danger': danger,
            }"

            :type="type"
            :id="name"
            :name="name"
            :placeholder="placeholder"
            :required="required"
            :autocomplete = "autocomplete"
            :disabled="disabled"

            :value="value"
            @input="$emit('input', data=$event.target.value)"
        >
        </input>

        <textarea
            v-if="element === 'textarea'"
            class="textarea"
            :class="{
              'is-primary': primary,
              'is-link': link,
              'is-info': info,
              'is-success': success,
              'is-warning': warning,
              'is-danger': danger,
            }"
            :id="name"
            :name="name"
            :placeholder="placeholder"
            :required="required"
            :disabled="disabled"

            :value="value"
            @input="$emit('input', data=$event.target.value)"
        >
        </textarea>

        <div
            v-if="element === 'select'"
            class="select"
            :class="{
              'is-primary': primary,
              'is-link': link,
              'is-info': info,
              'is-success': success,
              'is-warning': warning,
              'is-danger': danger,
            }"
        >
          <select

              :id="name"
              :name="name"
              :multiple="multiple"
              :required="required"
              :disabled="disabled"
              :value="value ? value: items[0].value"
              @change="$emit('input', data=$event.target.value)"
          >
            <option
                v-for="(item, index) in items"
                :selected="item.value == value || (!item.value && index===0)"
                :disabled="item.disabled"
                :value="item.value"
                :key="index"
            >
              {{item.label}}
            </option>
          </select>
        </div>

        <label
            v-if="element === 'checkbox' || type==='checkbox'"
            class="checkbox"
            :class="{
              'is-primary': primary,
              'is-link': link,
              'is-info': info,
              'is-success': success,
              'is-warning': warning,
              'is-danger': danger,
            }"

            >
          <input
            type="checkbox"
            :id="name"
            :name="name"
            :checked="value"
            :required="required"
            :disabled="disabled"

            @change="$emit('input', data=$event.target.checked)">
          {{label}}
        </label>

        <label
            v-if="element==='radio' || type==='radio'"
            v-for = "(item, index) in items"
            class="radio"
            :class="{
              'is-primary': primary,
              'is-link': link,
              'is-info': info,
              'is-success': success,
              'is-warning': warning,
              'is-danger': danger,
            }"
            >
          <input
              type="radio"
              :id="name"
              :name="name"
              :disabled="disabled"
              :value="item.value"
              :checked="item.value === value || index===0"
              :required="required"
              @change="$emit('input', data=$event.target.value)"
          >
          {{item.label}}
        </label>





        <icon
            v-if="leftIcon
                  && element != 'texarea'
                  && element != 'checkbox'
                  && type !='checkbox'
                  && element != 'radio'
                  && type !='radio'"
            :icon="leftIcon"
            small
            left
        ></icon>

        <icon
            v-if="rightIcon
            && element != 'texarea'
            && element != 'checkbox'
            && type !='checkbox'
            && element != 'radio'
            && type !='radio'"
            :icon="rightIcon"
            small
            right></icon>
      </slot>

    </div>

    <slot name="addon"></slot>
  </div>

</template>

<script>


import mainColorProps from '../../mixins/mainColorProps.vue';


export default {
  name: 'control',

  mixins:[
    mainColorProps,
  ],

  props: {
    iconsLeft: {
      type: Boolean,
      default: false,
    },

    iconsRight: {
      type: Boolean,
      default: false,
    },
    leftIcon: {
      type: String,
      default: '',
    },

    rightIcon: {
      type: String,
      default: '',
    },

    element: {
      type: String,
      default: 'input',
    },

    type: {
      type: String,
      default: 'input',
    },

    placeholder: {
      type: String,
      default: '',
    },

    label:{
      type: String,
      default: '',
    },

    multiple:{
      type: Boolean,
      default: false,
    },

    required:{
      type: Boolean,
      default: false,
    },

    name: {
      type:String,
      default:'',
    },


    items:{
      type:Array,
      default:null,
    },

    autocomplete:{
      type: String,
      default: 'on',
    },

    value:null,

    hasErrors:{
      type: Boolean,
      default: false,
    },

    disabled:{
      default: false,
    }

  },


  model:{
    prop:'value'
  },



 //Fixes Undefined Value on clear select input
  watch:{
    value(newVal){
      if (!newVal){
        this.data="";
        if (!this.data && this.items){
          this.$emit('input', this.items[0].value);
        }
      }
    }
  },


  data(){
    return {
      data: this.value,
    }
  },

  created(){
    if (!this.data && this.items){
      this.$emit('input', this.items[0].value);
    }
    else if(!this.data){
      this.$emit('input', this.value);
    }
  },




}
</script>

<style lang="css">
</style>
