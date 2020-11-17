import {http, uri} from '@/http'

const state = {
    all: []
}

const mutations = {
    SET_ALL(state, value) { state.all = value }
}

const actions = {
    loadBrands({commit}){
        return new Promise((resolve, reject) => {
            http.get(`${uri}/api/brand`)
                .then(res => {
                    //console.log(res)
                    if( res.status == 200 ){
                        commit("SET_ALL", res.data)
                        resolve(res)
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