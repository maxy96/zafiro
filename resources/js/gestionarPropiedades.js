import router from './router';
import Vuex from 'vuex';
import GestionarPropiedades from './components/GestionarPropiedades' ;

Vue.use(Vuex);

const store = new Vuex.Store({
	state:{
		newPropiedad:{
			inmobiliaria: '',
			titulo: '',
			caracteristicas: '',
			imagen: ''
		},

		newPrecio:{
			iso: '',
			precio: ''
		},

		newDireccion:{
			direccion:'',
			lat: '',
			lng: ''
		},

		newGaleria: []
	},
});


const app = new Vue({
	el: '#app',
	store,
	router,
	components: { GestionarPropiedades },
	template: '<GestionarPropiedades/>'
});
