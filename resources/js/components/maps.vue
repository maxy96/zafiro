<style>
/* Set the size of the div element that contains the map */
#map {
	height: 400px;  /* The height is 400 pixels */
	width: 100%;  /* The width is the width of the web page */
}
</style>
<template>
	<div id="map"></div>
</template>
<script>
import gmapsInit from './form/gmaps';

export default{
	async created(){
		try {
			const google = await gmapsInit();
		  	// The location of Uluru
		  	var uluru = {lat: -28.8405292, lng: -58.83039289999999};
		  	// The map, centered at Uluru
		  	var map = new google.maps.Map(
		  	document.getElementById('map'), {zoom: 10, center: uluru});
		 	 // The marker, positioned at Uluru
		  	var marker = new google.maps.Marker({
		  		position: uluru, 
		  		map: map,
		  		icon: {
		  			url:'https://zafirobienesraices.com/favicon.ico',
		  			scaledSize: new google.maps.Size(25,25)
		  		}, 
		  		title: 'hola'
		  	});

		} catch (error) {
			console.error(error);
		}
	}
}
</script>
