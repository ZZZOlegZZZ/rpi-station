<template lang="html">
  <div>
    <div
      class="dropdown"
      :class="[
        is_active?'is-active':'',
        isUp?'is-up':''
      ]">
      <div class="dropdown-trigger is-full-expanded">
        <div class="field has-addons">
          <p
          class="control"

          @click="toggleDropDown">
             <a
             class="button is-static is-outlined"
             :class="callbacks.hasErrors(name)?'is-danger':''">
                 <i class="fas fa-chevron-down"></i>
             </a>
         </p>
          <p class="control has-icons-left is-expanded">

              <input class="input"

              :class="callbacks.hasErrors(name)?'is-danger':''"
              type="text"
              :placeholder="placeholder"
               aria-haspopup="true" aria-controls="dropdown-menu"
               @input = "checkInput($event.target.value)"
               v-model = "value_title"
               :title = "value_title"
               >

              <span class="icon is-small is-left">
                <i class="fas fa-search" aria-hidden="true"></i>
              </span>
          </p>
          <p class="control is-clickable"
             @click="resetField">
             <a class="button is-static is-outlined"
             :class="callbacks.hasErrors(name)?'is-danger':''"
                >
                 <i class="fas fa-sync"></i>
             </a>
         </p>



        </div>
      </div>
      <div class="dropdown-menu" role="menu">
        <div class="dropdown-content">
          <div v-if="!data_ready">
            <p class="dropdown-item has-text-grey is-size-6">
              {{status_text}}
            </p>
          </div>
          <div
            v-for="(category, key) in dd_items"
            :key="key"
            v-if="hasCategories && data_ready">
            <p class="dropdown-item has-text-grey is-size-6">
              {{key}}
            </p>
            <a class="dropdown-item"
               v-for="item in category" :key="item.id"
               @click = "selectOption(item)"
            >
              &nbsp;&nbsp;&nbsp;&nbsp;{{ item.title }}
            </a>
          </div>


          <div v-if = "!hasCategories && data_ready">
              <a class="dropdown-item"
                 v-for="item in dd_items"
                 @click = "selectOption(item)"
              >
                {{ item.title }}
              </a>
          </div>



        </div>
      </div>
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
import {getPositionThreshold} from '../srv/srvfunc';

export default {
  name: 'search-input',


  props: {
    value:null,
    category_alias:null,
    name:String,
    callbacks:Object,
    title:'',
    getItemsUrl: String,
    getItemParams:{},
    setTitle: Function,
    placeholder: null,
    hasCategories: {
      type: Boolean,
      dafault: false,
    }
  },

  data(){
    return {
        is_active: false,
        isUp: false,
        data_ready: false,
        status_text: '',
        search_string: '',
        dd_items: {},
        all_items: {},
        value_title: this.title,
        reset: {
          value: this.value,
          title: this.title,
        },
    }
  },

  mounted(){
    this.isUp = getPositionThreshold(this.$el, 65);
    this.getData()
  },

  methods:{
    checkInput(value){
      this.search_string = value;
      if (value && value.length>0){
          this.is_active = true;
      } else {
          this.is_active = false;
      }

      if (value && value.length<3){
          this.status_text = 'Введите не менее 3-х символов';
      } else {
          this.getData(value)
      }
    },


    selectOption(item){
        this.value_title = this.setTitle(item);
        this.is_active = false;
        if (this.category_alias){
          this.$emit('input', {
            id: item.id,
            category: item[this.category_alias]
          });
        } else {
          this.$emit('input', item.id);
        }


    },

    resetField(){
        this.data_ready = false;
        this.value_title = this.reset.title;
        this.search_string = '';
        this.$emit('input', this.reset.value);
    },

    toggleDropDown(){
      this.is_active = !this.is_active;

      if(this.is_active){

          this.getData();
      }
    },




    getData(value = ''){
      this.data_ready = false;

      // if (value){
      //
      // }

      let params = this.getItemParams;
      params.params.search = this.search_string;



      this.status_text='Идет загрузка...';


      axios.get(this.getItemsUrl, params)
        .then((response) => {
          if (Object.keys(response.data).length){
              this.data_ready = true;
              this.dd_items = response.data;
          } else {
              this.status_text = 'Ничего не найдено';
          }


        })
        .catch(errors => this.errors=errors.response.data.errors)
    }
  },
}
</script>

<style lang="css">
</style>
