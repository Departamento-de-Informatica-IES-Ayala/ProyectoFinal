
const clientes1 = {
  template: '<iframe src="php/clientes.php" id="clientes"></iframe>'
};
const citas1 = {
  template: '<iframe src="php/citas.php" id="citas"></iframe>'
};
const agenda1 = {
  template: '<iframe src="php/agenda.php" id="agenda"></iframe>'
};
const routes = [{
    path: '/clientes',
    component: clientes1
  },
  {
    path: '/citas',
    component: citas1
  },
  {
    path: '/agenda',
    component: agenda1
  },
  {
    path: '*',
    component: clientes1
  },
]
const router = new VueRouter({
  routes
})
const app = new Vue({
  router
}).$mount('#app')

