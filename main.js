const clientes1 = { template: '<iframe src="php/clientes.php"></iframe>' };
const citas1 = { template: '<iframe src="php/citas.php"></iframe>' };
const agenda1 = { template: '<iframe src="php/agenda.php"></iframe>' };
const routes=[
    {path:'/clientes',component:clientes1},
    {path:'/citas',component:citas1},
    {path:'/agenda',component:agenda1},
    {path:'*',component:clientes1},
  ]
  const router= new VueRouter({
    routes
  })
  const app = new Vue({
    router
  }).$mount('#app')
