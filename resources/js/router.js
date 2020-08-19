import VueRouter from 'vue-router';

import AgregarPropiedad from './components/AgregarPropiedad';
import TablaDeDatosPropiedades from './components/TablaDeDatosPropiedades';

Vue.component('precios', require('./components/form/Precios.vue').default);
Vue.component('galeria', require('./components/form/Galeria.vue').default);
Vue.component('direccion', require('./components/form/Direccion.vue').default);
Vue.component('nuevaPropiedad', require('./components/form/NuevaPropiedad.vue').default);

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
    	{
    		path: '/',
    		name: 'tablaDeDatos',
    		component: TablaDeDatosPropiedades
    	},
        {
            path: '/nueva-propiedad',
            component: AgregarPropiedad
        },
        { path: '*', redirect: to=>{return '/'} }
    ],
    linkActiveClass: "active",
    base: '/admin/gestionar-propiedades',
    mode: "history"
})
