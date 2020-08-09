import Vuex from 'vuex';
import * as VueGoogleMaps from 'vue2-google-maps';

const GoogleMapsApiLoader = require('google-maps-api-loader');

/*
GoogleMapsApiLoader({
		libraries: ['places'],
	    apiKey: 'your-api-key' // optional
	})
	.then(function(googleApi) {
		var autocomplete = new googleApi.maps.places.AutocompleteService();
	}, function(err) {
		console.error(err);
});
*/
/*
Vue.use(VueGoogleMaps, {
	load: {
		key: 'AIzaSyANyjxamDNLkKuBoixEDZg-3Fy_UdVwI4o',
		fields: 'utc_offset_minutes',
		libraries: 'places'
	}
});
*/
Vue.use(Vuex);

Vue.component('google-map', VueGoogleMaps.Map);
Vue.component('ground-overlay', VueGoogleMaps.MapElementFactory({
	mappedProps: {
		'opacity': {}
	},
	props: {
		'source': {type: String},
		'bounds': {type: Object},
	},
	events: ['click', 'dblclick'],
	name: 'groundOverlay',
	ctr: () => google.maps.GroundOverlay,
	ctrArgs: (options, {source, bounds}) => [source, bounds, options],
}));

Vue.component('propiedad', require('./components/agregarPropiedad.vue').default);

Vue.component('precios', require('./components/form/Precios.vue').default);
Vue.component('galeria', require('./components/form/Galeria.vue').default);
Vue.component('direccion', require('./components/form/Direccion.vue').default);
Vue.component('nuevaPropiedad', require('./components/form/NuevaPropiedad.vue').default);

const store = new Vuex.Store({
	state:{
		inmo:''
	}
});

const app = new Vue({
	el: '#app',
	store
});