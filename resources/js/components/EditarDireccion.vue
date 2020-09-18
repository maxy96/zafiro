<template>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="card z-depth-4">					
					<div class="card-content">
						<div class="card-title">
							<h5 class="purple-text text-lighten-1"> Modificar direccion de la propiedad </h5>
						</div>
						<div class="divider"></div>
						<small v-if="direccion">Direccion actual: {{direccion}}</small>
						<small v-else>Esta propiedad no tiene asignada una direccion</small>
						<direccion></direccion>
					</div>
					<div class="card-action">
						<form @submit.prevent="updateDireccion">
							<button type="submit" class="btn waves-effect waves-light">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	data(){
		return{
			direccion: this.$store.state.newDireccion.direccion
		}
	},
	mounted(){
		this.$store.state.propiedadID ? null : this.goBackPage();
	},
	methods:{
		goBackPage(){
			return window.history.back();
		},
		updateDireccion(){
			let propiedadID = this.$store.state.propiedadID;
			let direccion = this.$store.state.newDireccion;
			axios.put('/api/v1/direccion/'+ propiedadID, {
				direccion: direccion.direccion,
				lat: direccion.lat,
				lng: direccion.lng
			}).then(response => {
				let existeDireccion = response.data.data.error;
				let message = response.data.data.message;
				if(existeDireccion === true){
					toastr.error(message, 'Error');
				}else{
					toastr.success(message, 'Exito');
				}
			})
			.catch(error => {
				console.log(error);
				toastr.error('Error');
			}).finally( () => {
				this.goBackPage();
			});	
		}
	}
}
</script>