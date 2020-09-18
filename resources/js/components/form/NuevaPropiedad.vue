<template>
	<form >
		<div class="col s12 mt10 mb10">
			<label v-for="inmobiliaria in inmobiliarias">
				<input name="inmobiliaria" v-model="$store.state.newPropiedad.inmobiliaria" type="radio" :value="inmobiliaria.id_inmobiliaria" required />
				<span>{{inmobiliaria.inmobiliaria}}</span>
			</label>
		</div>
		<div class="input-field col s12">
			<input id="titulo" v-model="$store.state.newPropiedad.titulo" type="text" class="validate" required>
			<label for="titulo">Titulo</label>
		</div>
		<div class="input-field col l12 s12">
			<textarea id="caracteristica" v-model="$store.state.newPropiedad.caracteristicas" class="materialize-textarea" required></textarea>
			<label for="caracteristica">Caracteristicas</label>
		</div>
		<div class="input-field file-field col s12">
			<div class="btn">
				<span>Imagen</span>
				<input @change="obtenerImagen" type="file" ref="fileImage" required>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
		</div>
		<slot></slot>
	</form>
</template>
<script>

export default{
	created(){
		this.getInmobiliarias();
	},

	data(){
		return {
			inmobiliarias: []
		}
	},

	methods: {
		getInmobiliarias(url = '/api/v1/inmobiliarias'){
			axios.get(url).then(response => {
				this.inmobiliarias = response.data;
			});
		},
		obtenerImagen(e){
			let file = e.target.files[0];
			let fileReader = new FileReader();
			fileReader.readAsDataURL(file);

			fileReader.onload = (e) =>{
				this.$store.state.newPropiedad.imagen = e.target.result;
				//this.editPropiedad.imagen = e.target.result;
			}
		} //end obtenerImagen
	}
}
</script>