<template>
	<div class="App">
		<div class="form-group">
			<label for="address_address">Address</label>
			<input type="text" id="address-input" name="address_address" class="form-control map-input" >
			<p>{{$store.state.newDireccion.direccion}}</p>
			<p>{{$store.state.newDireccion.lat}}</p>
			<p>{{$store.state.newDireccion.lng}}</p>
			<input type="hidden" name="address_latitude" id="address-latitude"  value="0" />
			<input type="hidden" name="address_longitude" id="address-longitude" value="0" />
		</div>
		<div id="address-map-container" style="width:100%;height:400px; ">
			<div style="width: 100%; height: 100%" id="address-map"></div>
		</div>
	</div>	
</template>

<script>
import gmapsInit from './gmaps';

export default {
	methods:{
		setLatLng(lat, lng, direccion){
			this.$store.state.newDireccion.direccion = direccion;
			this.$store.state.newDireccion.lat = lat;
			this.$store.state.newDireccion.lng = lng;
		}
	},
	async created() {
		try {
			const google = await gmapsInit();
			const geocoder = new google.maps.Geocoder();	
			const locationInputs = document.getElementsByClassName("map-input");
			const self = this;
			const autocompletes = [];
			
			/*
			 * Esta parte de codigo es para inicializar el mapa
			*/

			for (let i = 0; i < locationInputs.length; i++) {

				// Se le asigna una o varias etiquetas input
				const input = locationInputs[i];  
				
				//Esta operacion asigna un string con el valor "adress" 
				const fieldKey = input.id.replace("-input", ""); 
				
				// Se le asigna un booleano con el valor "true" para mostrar una marca en el
				// mapa  
				const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';  

				const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -27.4539909;
				const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || -58.7821912;

				const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
					center: {lat: latitude, lng: longitude},
					zoom: 13
				});
				const marker = new google.maps.Marker({
					map: map,
					position: {lat: latitude, lng: longitude},
				});

				marker.setVisible(isEdit);
				//marker.setIcon("https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png");

				// AUTOCOMPLETADO PARA AGREGAR DIRECCIONES
				const autocomplete = new google.maps.places.Autocomplete(input);
				autocomplete.key = fieldKey;
				autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
			}

			for (let i = 0; i < autocompletes.length; i++) {
				const input = autocompletes[i].input;

				const autocomplete = autocompletes[i].autocomplete;
				const map = autocompletes[i].map;
				const marker = autocompletes[i].marker;

				google.maps.event.addListener(autocomplete, 'place_changed', function () {
					marker.setVisible(false);
					const place = autocomplete.getPlace();
					geocoder.geocode({'placeId': place.place_id}, function (results, status) {
						if (status === google.maps.GeocoderStatus.OK) {
							const lat = results[0].geometry.location.lat();
							const lng = results[0].geometry.location.lng();
							const direccion = place.formatted_address;
							self.setLatLng(lat, lng, direccion);
							setLocationCoordinates(autocomplete.key, lat, lng);
						}
					});

					if (!place.geometry) {
						window.alert("Datos incorrectos: '" + place.name + "'");
						input.value = "";
						return;
					}

					if (place.geometry.viewport) {
						map.fitBounds(place.geometry.viewport);
					} else {
						map.setCenter(place.geometry.location);
						map.setZoom(17);
					}
					marker.setPosition(place.geometry.location);
					marker.setVisible(true);

				});
			}
			function setLocationCoordinates(key, lat, lng) {
				const latitudeField = document.getElementById(key + "-" + "latitude");
				const longitudeField = document.getElementById(key + "-" + "longitude");
				latitudeField.value = lat;
				longitudeField.value = lng;
			}

		} catch (error) {
			console.error(error);
		}
	}
};
</script>

<style>
.App {
	width: 100%;
	height: 500px;
}
</style>