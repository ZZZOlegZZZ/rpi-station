<template lang="html">
  <nav
  class="navbar"
  :class="modifiers.get()"
  role="navigation"
  aria-label="main navigation"
  >
    <container>
      <div class="navbar-brand">
        <slot name="brand">
          <navbar-item
          :class="modifiers.get()"
          v-for="item in items"
          v-if="item.brand"
          :name="item.name"
          :href="item.href"
          :src="item.src"
          :alt="item.alt"
          :width="item.width"
          :height="item.height"
          :icon="item.icon"
          :items="item.items"

          :key="item.id"
          >
          </navbar-item>


        </slot>

        <a role="button"
        class="navbar-burger"
        @click="toggle"
        :class="{'is-active': isActive}"
        aria-label="menu"
        aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu" :class="{'is-active': isActive}">

            <slot>

              <navbar-start>


                <navbar-item
                :class="modifiers.get()"
                v-for="item in items"
                v-if="!item.items && !item.end && !item.brand"
                :name="item.name"
                :href="item.href"
                :src="item.src"
                :alt="item.alt"
                :width="item.width"
                :height="item.height"
                :icon="item.icon"
                :items="item.items"

                :key="item.id"
                >
                </navbar-item>

                <navbar-item-dropdown
                :class="modifiers.get()"
                v-for="item in items"
                v-if="item.items && !item.end && !item.brand"
                :name="item.name"
                :href="item.href"
                :src="item.src"
                :alt="item.alt"
                :width="item.width"
                :height="item.height"
                :icon="item.icon"
                :items="item.items"


                :key="item.id"
                >
              </navbar-item-dropdown>

              </navbar-start>


              <navbar-end>

                <navbar-item
                :class="modifiers.get()"
                v-for="item in items"
                v-if="!item.items && item.end && !item.brand"
                :name="item.name"
                :href="item.href"
                :src="item.src"
                :alt="item.alt"
                :width="item.width"
                :height="item.height"
                :icon="item.icon"
                :items="item.items"


                :key="item.id"
                >
                </navbar-item>

                <navbar-item-dropdown
                :class="modifiers.get()"
                v-for="(item, index) in items"
                v-if="item.items && item.end && !item.brand"
                :name="item.name"
                :href="item.href"
                :src="item.src"
                :alt="item.alt"
                :width="item.width"
                :height="item.height"
                :icon="item.icon"
                :items="item.items"

                :end="true"

                :key="index"
                >
              </navbar-item-dropdown>


              </navbar-end>

            </slot>


      </div>
    </container>
  </nav>
</template>


<script>

import mainColorProps from '../../mixins/mainColorProps.vue';
import colorProps from '../../mixins/colorProps.vue';
import otherProps from '../../mixins/otherProps.vue';

export default {
  name: 'navbar',

  mixins:[
    mainColorProps,
    colorProps,
    otherProps
  ],

  props: {
    items:{
      type: Array,
      default: null,
    },
  },


  data(){
    return {
      isActive: false,
      item: [],
    }
  },



  methods:{
    toggle(){
      this.isActive =! this.isActive;
    },
  },



}
</script>

<style lang="css">
</style>
