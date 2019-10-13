<script>
export default {

  data() {
    return {

      form: {},

      errors: {},

      submited: false,

      loading:false,

      callbacks:{
        getErrors: this.getErrors,
        hasErrors: this.hasErrors,
      },

    }
  },

  methods:{

    hasErrors(field = null){
      if (field){
        return this.errors[field] ? true : false;
      }
      return Object.keys(this.errors).length===0 ? false : true
    },

    getErrors(field){
      let errors = '';
      for (var index in this.errors[field]){
        errors+=this.errors[field][index]+"\r\n";
      }
      return errors+'';
    },

    clearErrors(field){
      delete this.errors[field];
      this.submited = false;
    },

    clearControl(field=null){
      if (field){
        this.form[field]='';
      } else {
        for (let field in this.form) {
          this.form[field]='';
        }
      }
    },

    addEmptyOption(arr, label=''){
      arr.unshift({'value': null, 'label': label});
      return arr;
    }
  },
}
</script>
