import { http, uri } from '@/http'

const state = {
  all: {},
  list: {}
}

const mutations = {

    SET_ALL(state, vl) {
      state.all = vl
    },
    SET_ALL_LIST(state, vl){
      state.list = vl
    }

}

const actions = {

  loadSodas( {commit}, page = 1 ) {
    return new Promise((resolve, reject) => {
      http.get(`${uri}/api/soda?page=${page}`)
        .then(res => {
          resolve(res)
          if( res.status === 200 ){
            commit('SET_ALL', res.data)
            commit('SET_ALL_LIST', res.data.data)
          }
          else {
            reject(res)
          }
          //console.log(res.data)
        })
        .catch(err => reject(err))
    })
  },

  create( {commit, dispatch}, dados ){
    return new Promise((resolve, reject) => {
      http.post(`${uri}/api/soda`, dados)
        .then(res => {
          resolve(res)
          if( res.status == 200 ){
            dispatch('loadSodas')
          }
        })
        .catch(err => reject(err))
    })
  }

}

const getters = {
  getList: (state) => state.list,
  getAll: (state) => state.all,
  nextPage: (state) => state.all.next_page_url,
  backPage: (state) => state.all.prev_page_url
}

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters
}
