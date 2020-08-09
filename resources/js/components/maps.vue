<template>
	<div class="container">
		<div class="form-group">
			<label for="address_address">Address</label>
			<input type="text" id="address-input" name="address_address" class="form-control map-input">
			<input type="hidden" name="address_latitude" id="address-latitude" v-model="lat" value="0" />
			<input type="hidden" name="address_longitude" id="address-longitude" value="0" />
		</div>
		<div id="address-map-container" style="width:100%;height:400px; ">
			<div style="width: 100%; height: 100%" id="address-map"></div>
		</div>

		<button style="position:absolute;" v-on:click.prevent="getLat"></button>
		<span>{{lat}}</span>
	</div>
</template>
<script>


export default{
	data(){
		return {
			lat: ""
		}
	},
	methods: {
		getLat(){
			return this.lat = document.getElementById('address-latitude').value;
		}
	}
}
</script>