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

		propiedadID: '',

		newGaleria: []
	},
	actions:{
		capturarDireccion({state}, propiedad){
			state.propiedadID = propiedad.id_propiedad;
			state.newDireccion.direccion = propiedad.direccion;
		},
		capturarPrecio({state}, propiedad){
			state.propiedadID = propiedad.id_propiedad;
			state.newPrecio.iso = propiedad.iso;
			state.newPrecio.precio = propiedad.precio;
		},
		vaciarDatos({state}){
			state.newPrecio.iso = ''
			state.newPrecio.precio = ''
			state.newDireccion.direccion = ''
			state.newDireccion.lat = ''
			state.newDireccion.lng = ''
			state.newGaleria = []
		},
		vaciarDatosPropiedad({state}){
			state.newPropiedad.inmobiliaria = ''
			state.newPropiedad.titulo = ''
			state.newPropiedad.caracteristicas = ''
			state.newPropiedad.imagen = ''
		}
	}
});


const app = new Vue({
	el: '#app',
	store,
	router,
	components: { GestionarPropiedades },
	template: '<GestionarPropiedades/>'
});
