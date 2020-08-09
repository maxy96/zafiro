<template>
	<div class="row">
		<div class="col s12">
			<label v-for="inmobiliaria in inmobiliarias">
				<input name="inmobiliaria" v-model="newPropiedad.inmobiliaria" type="radio" :value="inmobiliaria.id_inmobiliaria" />
				<span>{{inmobiliaria.inmobiliaria}}</span>
			</label>
		</div>
		
		<div class="input-field col s12">
			<input id="titulo" v-model="newPropiedad.titulo" type="text" class="validate">
			<label for="titulo">Titulo</label>
		</div>
		<div class="input-field col l12 s12">
			<textarea id="caracteristica" v-model="newPropiedad.caracteristicas" class="materialize-textarea"></textarea>
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
		
	</div>
</template>
<script>
import { mapState } from 'vuex';
export default{
	created(){
		this.getInmobiliarias();
	},

	data(){
		return {
			newPropiedad:{
				inmobiliaria: '',
				estado: 1,
				direccion: '',
				titulo:'',
				caracteristicas:'',
				imagen: '',
				precio: ''
			},
			inmobiliarias: []
		}
	},
	computed:{
		...mapState(['inmo'])
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
				this.newPropiedad.imagen = e.target.result;
				//this.editPropiedad.imagen = e.target.result;
			}
		} //end obtenerImagen
	}
}
</script>