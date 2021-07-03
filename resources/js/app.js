require('./bootstrap');
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Home from '../js/components/Home.vue';
import ListarCidades from '../js/components/ListarCidades.vue';
import ListarProdutos from '../js/components/ListarProdutos.vue';
import AdicionarProduto from '../js/components/AdicionarProduto.vue';
import EditarProduto from '../js/components/EditarProduto.vue';
import BuscarProduto from '../js/components/BuscarProduto.vue';
import ResultadoBusca from '../js/components/ResultadoBusca.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import Alerts from './Alerts';

Vue.prototype.$Alerts = Alerts
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const routes = [
  {
    name: '/',
    path: '/',
    component: Home
  },
  {
    name: '/cidades',
    path: '/cidades',
    component: ListarCidades
  },
  {
    name: '/produtos',
    path: '/produtos',
    component: ListarProdutos
  },
  {
    name: '/adicionar_produto',
    path: '/adicionar_produto',
    component: AdicionarProduto
  },
  {
    name: '/editar_produto',
    path: '/editar_produto/:id?',
    component: EditarProduto
  },
  {
    name: '/buscar_produto',
    path: '/buscar_produto',
    component: BuscarProduto
  },
  {
    name: '/resultado_busca',
    path: '/resultado_busca/:id?',
    component: ResultadoBusca
  }
]
const router = new VueRouter({mode: 'history', routes: routes})
const app = new Vue(Vue.util.extend({ router },App)).$mount('#app');