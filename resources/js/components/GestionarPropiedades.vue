<template>

	<div class="container-table z-depth-2 white p20 mt20 mb20">
		<div v-if="loading" class="progress">
			<div class="indeterminate"></div>
		</div>
		<!-- Modal Structure -->
		<div id="nuevaPropiedad" class="modal modal-fixed-footer">
			<form @submit.prevent="addNewPropiedad"  enctype="multipart/form-data">
				<div class="modal-content">
					<h5 class="grey-text ">Nueva propiedad</h5>
					<div class="divider"></div>
					<div class="row mt10">
						<div class="col l12 s12">
							<label v-for="inmobiliaria in inmobiliarias">
								<input class="with-gap" v-model="newPropiedad.inmobiliaria" name="inmobiliaria" v-bind:value="inmobiliaria.id_inmobiliaria" type="radio" />
								<span>{{inmobiliaria.inmobiliaria}}</span>
							</label>
						</div>
						<div class="input-field col l6 s12">
							<input id="direccion" v-model="newPropiedad.direccion"  type="text" class="validate">
							<label for="direccion">Direccion</label>
						</div>

						<div class="input-field col l6 s12">
							<input id="titulo" v-model="newPropiedad.titulo" type="text" class="validate">
							<label for="titulo">Titulo</label>
						</div>
						<div class="input-field col l12 s12">
							<textarea id="caracteristica" v-model="newPropiedad.caracteristicas" class="materialize-textarea"></textarea>
							<label for="caracteristica">Caracteristicas</label>
						</div>
						<div class="input-field file-field col l6 s12">
							<div class="btn">
								<span>Imagen</span>
								<input @change="obtenerImagen" type="file" accept="image/*" ref="fileImage" required>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<div class="input-field col l6 s12">
							<input id="precio" v-model="newPropiedad.precio" type="number" class="validate">
							<label for="precio">Precio</label>
						</div>
					</div>
				</div>
				<div class="modal-footer ">
					<button type="submit" class="btn-flat waves-effect waves-light modal-close ">
						Guardar<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
		
		<!-- Filter Structure -->
		<h5 class="purple-text text-lighten-1 left-align">Gestionar propiedades</h5>
		<div class="divider"></div>
		<div class="row mt10">
			<div class="input-field col l8 s2">
				<a class="right btn-floating btn waves-effect waves-light modal-trigger purple" href="#nuevaPropiedad"><i class="material-icons">add</i></a>
			</div>
			<div class="input-field col l4 s10">
				<i class="material-icons prefix">search</i>
				<input id="buscar" type="text" v-model="tableData.search"
				@input="getPropiedades()">
				<label for="Buscar">Buscar</label>
			</div>	
		</div>

		<datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
			<tbody>
				<tr v-for="propiedad in propiedades" :key="propiedad.id_propiedad">
					<td>{{propiedad.id_propiedad}}</td>
					<td class="hide-on-med-and-down"><img :src="`/imagen/${propiedad.imagen}`" height="60px" width="60px"></td>
					<td>{{propiedad.direccion}}</td>
					<td>{{propiedad.titulo}}</td>
					<td><!-- Inmobiliaria -->
						<button v-if="propiedad.inmobiliaria_id == 1" class="btn-small light-blue darken-1 waves-effect waves-light" v-on:click.prevent="cambiarEstadoOInmobiliaria(propiedad.id_propiedad, 2, 'Inmobiliaria')">
							<i class="material-icons left">local_offer</i>{{propiedad.inmobiliaria}}	
						</button>
						<button v-else class="btn-small light-blue darken-4 waves-effect waves-light" v-on:click.prevent="cambiarEstadoOInmobiliaria(propiedad.id_propiedad, 1, 'Inmobiliaria')">
							<i class="material-icons left">home</i>{{propiedad.inmobiliaria}}	
						</button>
					</td>
					<td><!-- Estado -->
						<button v-if="propiedad.estadoPropiedad_id == 1" class="btn-small green waves-effect waves-light waves-effect waves-light" v-on:click.prevent="cambiarEstadoOInmobiliaria(propiedad.id_propiedad, 2, 'Estado')" >
							<i class="material-icons left">thumb_up</i>{{propiedad.estado}}
						</button>
						<button v-else class="btn-small red waves-effect waves-light waves-effect waves-light" v-on:click.prevent="cambiarEstadoOInmobiliaria(propiedad.id_propiedad, 1, 'Estado')">
							<i class="material-icons left">thumb_down</i>{{propiedad.estado}}
						</button>
					</td>
					<td>$ {{propiedad.precio}}</td>
					<td>
						<button class="btn-floating btn-small pink modal-trigger" v-on:click.prevent="capturarPropiedad(propiedad)" href="#editarPropiedad"><i class="material-icons">edit</i></button>
						<button class="btn-floating btn-small green accent-4 modal-trigger" v-on:click.prevent="capturarPropiedadID(propiedad.id_propiedad)" href="#galeria"><i class="material-icons">add_a_photo</i></button>
					</td>
				</tr>
			</tbody>
		</datatable>
		<div id="editarPropiedad" class="modal modal-fixed-footer">
			<form @submit.prevent="updatePropiedad" enctype="multipart/form-data">
				<div class="modal-content">
					<h5 class="grey-text ">Editar propiedad</h5>
					<div class="divider"></div>
					<div class="row mt10">
						<div class="input-field col l6 s12">
							<input v-model="editPropiedad.direccion" type="text" class="validate" placeholder="">
							<label for="direccion">Direccion</label>
						</div>
						<div class="input-field col l6 s12">
							<input v-model="editPropiedad.titulo" type="text" class="validate" placeholder="">
							<label for="titulo">Titulo</label>
						</div>
						<div class="input-field col l12 s12">
							<textarea  v-model="editPropiedad.caracteristica" class="materialize-textarea" placeholder=""></textarea>
							<label for="caracteristica">Caracteristicas</label>
						</div>
						<div class="input-field file-field col l6 s12">
							<div class="btn">
								<span>Cambiar imagen</span>
								<input @change="obtenerImagen" type="file" accept="image/*" ref="fileImage">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<div class="input-field col l6 s12">
							<input  v-model="editPropiedad.precio" type="number" class="validate" placeholder="">
							<label for="precio">Precio</label>
						</div>
					</div>
				</div>
				<div class="modal-footer ">
					<button type="submit" class="btn-flat waves-effect waves-light modal-close ">
						Guardar<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
		<div id="galeria" class="modal modal-fixed-footer">
			<form @submit.prevent="nuevaImagenEnGaleria" enctype="multipart/form-data">
				<div class="modal-content">
					<h5 class="grey-text ">Galeria</h5>
					<div class="divider"></div>
					<div class="input-field file-field col l6 s12">
						<div class="btn">
							<span>Imagen</span>
							<input @change="obtenerVariasImagenes" type="file" accept="image/*" ref="fileImage">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
					<div class="row container">
						<div v-if="nuevaGaleriaVacio"  class="col s12">
							<h5 >No hay nueva imagenes</h5>	
						</div>
						<div class="col m3" v-else v-for="foto in newGaleria">
							<div class="content_img">
								<img :src="foto" height="100px" width="100px">
								<div>Image 1 Text</div>
							</div>							
						</div>
					</div>
					<div class="row container">
						<div class="col s12">
							<h5>Imagenes</h5>
						</div>
						<div class="col m3" v-for="imagen in galeria">
							<img :src="`/imagen/${imagen.imagen}`" height="100px" width="100px">
						</div>
					</div>
				</div>
				<div class="modal-footer ">
					<button type="submit" class="btn-flat waves-effect waves-light modal-close ">
						Guardar<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
		<div class="row l8 s12 m10">
			<div class="col l4 s10 m8 right">
				<pagination :pagination="pagination"
				@prev="getPropiedades(pagination.prevPageUrl)"
				@next="getPropiedades(pagination.nextPageUrl)">
			</pagination>
		</div>
		<div class="col l4 s12 m2 right">
			<div class="input-field right">
				<select v-model="tableData.length" @change="getPropiedades()">
					<option v-for="(records, index) in perPage" :key="index" :value="records">{{records}}</option>
				</select>
				<label>Filas</label>
			</div>		
		</div>
	</div>
</div>
</template>
<script>
import Datatable from './Datatable.vue';
import Pagination from './Pagination.vue';
export default{
	components: { datatable: Datatable, pagination: Pagination },
	created() {
		this.getPropiedades();
		this.getInmobiliarias();
	},
	data() {
		let sortOrders = {};

		let columns = [
		{width: '20%', label: 'ID', name: 'id_propiedad' },
		{width: '20%', label: 'Imagen', name: 'imagen' },
		{width: '20%', label: 'Direccion', name: 'direccion' },
		{width: '20%', label: 'Titulo', name: 'titulo'},
		{width: '20%', label: 'Inmobiliaria', name: 'inmobiliaria'},
		{width: '20%', label: 'Estado', name: 'estado'},
		{width: '20%', label: 'Precio', name: 'precio'}
		];

		columns.forEach((column) => {
			sortOrders[column.name] = -1;
		});
		return {
			inmobiliarias: [],
			propiedades: [],
			columns: columns,
			sortKey: 'id_propiedad',
			sortOrders: sortOrders,
			perPage: ['10', '20', '30'],
			tableData: {
				draw: 0,
				length: 10,
				search: '',
				column: 0,
				dir: 'desc',
			},

			loading: false,

			editPropiedad: {
				id_propiedad: '',
				direccion:'',
				titulo: '',
				caracteristica: '',
				imagen:'',
				precio: ''
			},

			newPropiedad:{
				inmobiliaria: '',
				estado: 1,
				direccion: '',
				titulo:'',
				caracteristicas:'',
				imagen: '',
				precio: ''
			},

			propiedadID: '',
			galeria: [],
			newGaleria: [],

			pagination: {
				lastPage: '',
				currentPage: '',
				total: '',
				lastPageUrl: '',
				nextPageUrl: '',
				prevPageUrl: '',
				from: '',
				to: ''
			},
		}
	},
	computed: {
		nuevaGaleriaVacio(){
			return this.newGaleria.length === 0;
		}
	},

	methods: {
		getInmobiliarias(url = '/api/v1/inmobiliarias'){
			axios.get(url).then(response => {
				this.inmobiliarias = response.data;
			});
		},
		getPropiedades(url = '/api/v1/propiedades'){
			this.loading = true;
			this.tableData.draw++;
			axios.get(url, {params: this.tableData})
			.then(response => {
				this.loading = false;
				let data = response.data;
				if (this.tableData.draw == data.draw) {
					this.propiedades = data.data.data;
					this.configPagination(data.data);
				}
				this.$refs.fileImage.value = '';
			})
			.catch(errors => {
				console.log(errors);
			});
		},

		addNewPropiedad(){
			let formData = new FormData();
			formData.append('inmobiliaria_id', this.newPropiedad.inmobiliaria)
			formData.append('estadoPropiedad_id', 1)
			formData.append('direccion', this.newPropiedad.direccion)
			formData.append('titulo', this.newPropiedad.titulo)
			formData.append('caracteristicas', this.newPropiedad.caracteristicas)
			formData.append('imagen', this.newPropiedad.imagen)
			formData.append('precio', this.newPropiedad.precio)
			axios.post('/api/v1/propiedades', formData).then(response => {
				this.getPropiedades();
				toastr.success('Nueva propiedad agregada');
			})
			.catch(error => {
				console.log(error.data);
			});
		},

		configPagination(data) {
			this.pagination.lastPage = data.last_page;
			this.pagination.currentPage = data.current_page;
			this.pagination.total = data.total;
			this.pagination.lastPageUrl = data.last_page_url;
			this.pagination.nextPageUrl = data.next_page_url;
			this.pagination.prevPageUrl = data.prev_page_url;
			this.pagination.from = data.from;
			this.pagination.to = data.to;
		},

		sortBy(key) {
			this.sortKey = key;
			this.sortOrders[key] = this.sortOrders[key] * -1;
			this.tableData.column = this.getIndex(this.columns, 'name', key);
			this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
			this.getPropiedades();
		},

		getIndex(array, key, value) {
			return array.findIndex(i => i[key] == value)
		},

		obtenerVariasImagenes(e){
			let file = e.target.files[0];
			let fileReader = new FileReader();
			fileReader.readAsDataURL(file);

			fileReader.onload = (e) =>{
				this.newGaleria.push(e.target.result);
			}
			this.$refs.fileImage.value = '';
		}, //end obtenerImagen

		obtenerImagen(e){
			let file = e.target.files[0];
			let fileReader = new FileReader();
			fileReader.readAsDataURL(file);

			fileReader.onload = (e) =>{
				this.newPropiedad.imagen = e.target.result;
				this.editPropiedad.imagen = e.target.result;
			}
		}, //end obtenerImagen
		
		capturarPropiedad(propiedad){
			this.editPropiedad.id_propiedad = propiedad.id_propiedad, 
			this.editPropiedad.direccion = propiedad.direccion;
			this.editPropiedad.titulo = propiedad.titulo;
			this.editPropiedad.caracteristica = propiedad.caracteristica;
			this.editPropiedad.imagen = propiedad.imagen;
			this.editPropiedad.precio = propiedad.precio;
		},

		cambiarEstadoOInmobiliaria(id, dato, header){
			this.loading = true;
			axios.put('/api/v1/propiedades/'+id, {
				header: header,
				dato: dato
			}).then(response => {
				this.loading = false;	
				this.getPropiedades();
				toastr.success(header + ' cambiado', 'Exito <br>');
			}).catch(error => {
				toastr.error('Error');
			})
		},

		capturarPropiedadID(propiedadID){
			this.newGaleria = [];
			this.galeria = [];
			this.propiedadID = propiedadID;
			this.getGaleria();
		},

		getGaleria(){
			axios.get('/api/v1/galerias/'+this.propiedadID).then(response => {
				this.galeria = response.data
			}).catch(error =>{
				toastr.error('error')
			})
		},

		nuevaImagenEnGaleria(){
			axios.post('/api/v1/galerias', {
				imagenes: this.newGaleria,
				id_propiedad: this.propiedadID
			}).then(response => {
				toastr.success('datos agregados')
			}).catch(error => {
				toastr.error('error');
				console.log(error.data);
			});
		},

		updatePropiedad(){
			axios.put('/api/v1/propiedades/'+this.editPropiedad.id_propiedad, {
				direccion: this.editPropiedad.direccion,
				titulo: this.editPropiedad.titulo,
				caracteristica: this.editPropiedad.caracteristica,
				imagen: this.editPropiedad.imagen,
				precio: this.editPropiedad.precio
			}).then(response => {
				toastr.success('Propiedad modificada')
				this.getPropiedades()
			}).catch(error => {
				toastr.error('Error')
				console.log(error.data)
			})
		}
	}

}
</script>