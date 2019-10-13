<template lang="html">
  <field :hasAddons="hasAddons">
    <label
      v-if = "label && element !== 'checkbox' && element !== 'radio'"
      class="label">
        {{label}}
    </label>
    <control
      :element = "element"
      :type="type"
      :name="name"
      :placeholder="placeholder"
      :items="options"
      :left-icon="leftIcon"
      :right-icon="rightIcon"
      :label="label"
      :value="value"
      :autocomplete = "autocomplete"
      :disabled="disabled"
      :danger="callbacks.hasErrors(name)"
      @input="$emit('input', data=$event)"
    >
    </control>

    <slot name="addon"></slot>



    <help
      danger
      v-if="callbacks.hasErrors(name)"
      style="white-space: pre-line"
      v-html="callbacks.getErrors(name)">
    </help>
  </field>
</template>

<script>
import typographyProps from '../../mixins/typographyProps.vue';
import otherProps from '../../mixins/otherProps.vue';


export default {
  name: 'field-control',

  props: {
    label: {
      type: String,
      default: '',
    },

    element: {
      type: String,
      default: 'input',
    },

    type: {
      type: String,
      default: "text",
    },

    name: String,

    placeholder: {
      type: String,
      default: '',
    },

    leftIcon: {
      type: String,
      default: '',
    },

    rightIcon: {
      type: String,
      default: '',
    },

    value: null,

    options: {
      type: Array,
      default: null,
    },

    autocomplete:{
      type: String,
      default: 'on',
    },

    hasAddons: Boolean,

    disabled: Boolean,

    callbacks: Object,
  },

  mixins:[
    typographyProps,
    otherProps,
  ],

  model: {
    prop: 'value',
  },

  data(){
    return {
      data: this.value,
    }
  },

  computed:{
    classString: function() {
      let cs = 'field ';

      cs = cs + this.modifiers.get();

      if (this.hasAddons){
        cs += ' has-addons ';
      }

      return cs;
    }

  },
}
</script>

<style lang="css">
</style>
