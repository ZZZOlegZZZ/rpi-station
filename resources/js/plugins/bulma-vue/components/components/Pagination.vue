<template lang="html">
  <nav
      v-if="paginate"
      class="pagination is-right"
      role="navigation"
      aria-label="pagination"
  >
    <ul class="pagination-list">
      <li>
        <a
          class="pagination-link"
          :class="{'is-current': data.current_page == 1 }"
          @click="setPage(urls.first_page_url)"
        >
          1
        </a>
      </li>

      <li v-if="data.current_page > 3">
        <span class="pagination-ellipsis">&hellip;</span>
      </li>

      <li v-if="data.current_page > 2">
        <a class="pagination-link"
           @click="setPage(urls.prev_page_url)"
        >
          {{data.current_page-1}}
        </a>
      </li>


      <li v-if="(data.current_page >= 2)
                &&
                (data.last_page - data.current_page >= 1)"
      >
        <a
          class="pagination-link is-current"
        >
          {{data.current_page}}
        </a>
      </li>



      <li v-if="data.last_page - data.current_page > 1">
        <a class="pagination-link"
           @click="setPage(urls.next_page_url)"
        >
          {{data.current_page+1}}
        </a>
      </li>


      <li v-if="data.last_page - data.current_page > 2">
        <span class="pagination-ellipsis">&hellip;</span>
      </li>

      <li>
        <a
          class="pagination-link"
          :class="{'is-current': data.current_page == data.last_page }"
          @click="setPage(urls.last_page_url)"
        >
          {{data.last_page}}
        </a>
      </li>
    </ul>
  </nav>

</template>

<script>
export default {

props:{
  data:{
    required: true,
  },

  getData:{
    type: Function,
    required: true,
  },
},


methods:{
  setPage(url){
    this.getData(url);
    //this.$emit('updatePage', url)
  }
},





computed:{
  urls: function(){
    return {
      first_page_url: this.data.path,
      prev_page_url: this.data.path+'?page='+(this.data.current_page-1),
      next_page_url: this.data.path+'?page='+(this.data.current_page+1),
      last_page_url: this.data.path+'?page='+this.data.last_page,
    }
  },

  paginate: function(){
    if (this.data){
      if (this.data.last_page>1){
        return true;
      }
    }
    return false;
  }

},



}
</script>

<style lang="css">
</style>
