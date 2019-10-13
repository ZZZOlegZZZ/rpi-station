<template lang="html">
  <transition name="custom-classes-transition"
    leave-active-class="animated fadeOut faster">
    <div class="modal is-active">
      <div class="modal-background"></div>
      <transition name="custom-classes-transition"
        enter-active-class="animated zoomIn faster">
          <div
            v-if="showCard">
            <slot></slot>
          </div>
        </transition>
    </div>
  </transition>


</template>

<script>
export default {
  name: 'modal',

  data(){
    return {
      showCard:false,
    }
  },


  mounted(){
    this.showCard = true;
  },


}
</script>

<style lang="css">
</style>
