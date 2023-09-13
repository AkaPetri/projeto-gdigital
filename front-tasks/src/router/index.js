import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/LoginView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/cadastro',
    name: 'Cadastro',
    component: () => import('../views/CadastroView.vue')
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/LoginView.vue')
  },
  {
    path: '/entrada',
    name: 'entrada',
    component: () => import('../views/EntradaView.vue')
  },
  {
  path: '/tarefas-hoje',
  name: 'Tarefas de Hoje',
  component: () => import('../views/HojeView.vue')
  }

]

const router = new VueRouter({
  routes
})

export default router
