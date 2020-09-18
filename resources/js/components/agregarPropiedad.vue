<template>
	<div class="container mt40 mb40">
		<div class="card z-depth-4">
			<div class="card-content">
				<div class="card-title"><h5 class="purple-text text-lighten-1"> Agregar nueva propiedad </h5></div>
				<div class="divider"></div>
				<form enctype="multipart/form-data">
					<ul class="stepper linear">
						<li class="step grey-text text-darken-2" v-for="(step, index) in steps" :class="step.class">
							<div :data-step-label="step.label" class="step-title waves-effect">{{step.titulo}}</div>
							<div class="step-content">
								<preloading v-show="preloading" />
								<component v-bind:is="step.component">	
								<div class="step-actions">
									<button 
									class="waves-effect waves-dark btn purple darken-2 rigth" v-for="action in step.action" 
									v-on:click.prevent="clickAction(action, index)" 
									:disabled="$store.state.newPropiedad.inmobiliaria && $store.state.newPropiedad.titulo && $store.state.newPropiedad.caracteristicas && $store.state.newPropiedad.imagen ? null : true">{{action}}</button>
								</div>
								</component>	
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
 //feedbacking
 import Preloading from './Preloading.vue';
 import { mapActions } from 'vuex';
 export default{
 	components: {preloading: Preloading},
 	created(){
 		this.vaciarDatos();
 		this.vaciarDatosPropiedad();
 	},
 	data(){
		//PASOS
		let steps = [
		{titulo: 'Paso 1', label: 'Nueva propiedad' , class: 'active', component: 'nuevaPropiedad', action:[] },
		{titulo: 'Paso 2', label: 'Agregar precio', class: '', component: 'precios', action:[]},
		{titulo: 'Paso 3', label: 'Agregar direccion', class: '', component: 'direccion', action:[]},
		{titulo: 'Paso 4', label: 'Galeria', class: '', component: 'galeria', action:[]}
		];
		let stepsLength = steps.length - 1;

		//ACCIONES
		steps[0].action.push('GUARDAR Y CONTINUAR');
		steps[1].action.push('SIGUIENTE');
		steps[stepsLength].action.push('ATRAS', 'FINALIZAR');
		steps.forEach((step, index) => {
			index > 1 && index < stepsLength ? step.action.push('ATRAS', 'SIGUIENTE') : '';
		});

		return{
			steps: steps,
			propiedad_id: '',
			noEnviar: true,
			preloading: false
		}
	},

	methods:{
		...mapActions(['vaciarDatos', 'vaciarDatosPropiedad']),
		clickAction(action, index){
			action === 'SIGUIENTE' ? this.nextStep(index) : null;
			action === 'ATRAS' ? this.previousStep(index) : null;
			action === 'FINALIZAR' ? this.enviarDatosDePropiedad(index) : null;
			action === 'GUARDAR Y CONTINUAR' ? this.guardarPropiedad(index) : null;
		},
		nextStep(index){
			this.steps[index].class = '';
			this.steps[index+1].class = 'active';
		},
		previousStep(index){
			this.steps[index].class = '';
			this.steps[index-1].class = 'active';
		},

		loadingON(index){
			this.steps[index].class += ' feedbacking';
			this.preloading = true;
		},
		loadingOFF(index){
			this.steps[index].class.replace(' feedbacking', '');
			this.preloading = false;
		},

		guardarPropiedad(index){
			this.loadingON(index);
			let formData = new FormData();
			let propiedad = this.$store.state.newPropiedad;
			formData.append('inmobiliaria_id', propiedad.inmobiliaria)
			formData.append('titulo', propiedad.titulo)
			formData.append('caracteristicas', propiedad.caracteristicas)
			formData.append('imagen', propiedad.imagen)
			axios.post('/api/v1/propiedades', formData).then(response => {
				this.propiedad_id = response.data.id_propiedad;
				//toastr.success('Nueva propiedad registrada');
			})
			.catch(error => {
				console.log(error.data);
				toastr.error('Error al guardar datos de la propiedad')
			})
			.finally( () => {
				this.loadingOFF(index);	
				this.nextStep(index);
			});
		},

		enviarPrecioDePropiedad(){
			let formData = new FormData();		
			let precio = this.$store.state.newPrecio;
			if(precio.iso !== '' && precio.precio !== ''){
				formData.append('propiedad_id', this.propiedad_id)
				formData.append('iso', precio.iso)
				formData.append('precio', precio.precio)
				axios.post('/api/v1/precio', formData).then(response => {
					console.log(response.data);
				})
				.catch(error => {
					console.log(error.data);
				});	
			}	
		},

		enviarDireccionDePropiedad(){
			let formData = new FormData();
			let direccion = this.$store.state.newDireccion;
			if(direccion.direccion != ''){
				formData.append('propiedad_id', this.propiedad_id)
				formData.append('direccion', direccion.direccion)
				formData.append('lat', direccion.lat)
				formData.append('lng', direccion.lng)
				axios.post('/api/v1/direccion', formData).then(response => {
					let existeDireccion = response.data.data.error;
					let message = response.data.data.message;
					if(existeDireccion === true){
						toastr.error(message, 'Error');
					}else{
						toastr.success(message, 'Exito');
					}
				})
				.catch(error => {
					console.log(error.data);
					toastr.error('Error');
				});	
			}
		},

		enviarGaleriaDePropiedad(){
			if(this.$store.state.newGaleria !== ''){
				axios.post('/api/v1/galerias', {
					imagenes: this.$store.state.newGaleria,
					id_propiedad: this.propiedadID
				}).then(response => {
					//toastr.success('Datos agregados')
				}).catch(error => {
					//toastr.error('error');
					console.log(error.data);
				});
			}
		},

		async enviarDatosDePropiedad(index){					
			this.loadingON(index);
			await setTimeout(()=>{
				this.enviarDireccionDePropiedad();
				this.enviarGaleriaDePropiedad();		
				this.enviarPrecioDePropiedad();
				this.loadingOFF(index);
				this.goBackPage();
				//this.$refs.fileImage.value = '';
			}, 2000);
		},
		goBackPage(){
			return window.history.back();
		}
		
	}
}
</script>