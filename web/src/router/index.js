import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'

Vue.use(Router)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HelloWorld
  }
]

const router = new Router({
  mode: 'history',
  routes
})

export default router
