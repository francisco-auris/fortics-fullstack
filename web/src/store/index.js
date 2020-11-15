import Vue from 'vue'
import Vuex from 'vuex'

//modules
import soda from './modules/soda'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    soda
  }
})
