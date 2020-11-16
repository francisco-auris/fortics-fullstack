import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

const http = Vue.http

const uri = 'http://localhost:1234'

export { http, uri }
