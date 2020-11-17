import {http,uri} from '@/http'

const state = {
    all: []
}

const mutations = {
    SET_ALL(state, value) { state.all = value }
}

const actions = {
    loadLitigations({commit}){
        return new Promise((resolve, reject) => {
            http.get(`${uri}/api/litigation`)
                .then(res => {
                    if( res.status == 200 ){
                        resolve(res)
                        commit('SET_ALL', res.data)
                    }
                    else {
                        reject(res)
                    }
                })
                .catch(err => reject(err))
        })
    }
}

const getters = {
    getAll: (state) => state.all
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}