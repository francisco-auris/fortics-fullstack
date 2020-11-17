import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

const http = Vue.http

const uri = 'http://api'

http.options.root = uri

export { http, uri }
