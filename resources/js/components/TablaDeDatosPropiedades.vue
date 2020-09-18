<template>
	<div class="container-table z-depth-2 white p20 mt20 mb20">
		<div v-if="loading" class="progress">
			<div class="indeterminate"></div>
		</div>
		
		<!-- Filter Structure -->
		<h5 class="purple-text text-lighten-1 left-align">Gestionar propiedades</h5>
		<div class="divider"></div>
		<div class="row mt10">
			<div class="input-field col l4 s10">
				<i class="material-icons prefix">search</i>
				<input id="buscar" type="text" v-model="tableData.search"
				@input="getPropiedades()" placeholder="Buscar...">
			</div>	
		</div>

		<datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
			<tbody>
				<tr v-for="propiedad in propiedades" :key="propiedad.id_propiedad">
					<td>{{propiedad.id_propiedad}}</td>
					<td class="hide-on-med-and-down"><img :src="`/imagen/${propiedad.imagen}`" height="60px" width="60px"></td>
					<td style="width: 20%;">{{propiedad.direccion}}</td>
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
						<button v-else class="btn-small red waves-effect waves-light" v-on:click.prevent="cambiarEstadoOInmobiliaria(propiedad.id_propiedad, 1, 'Estado')">
							<i class="material-icons left">thumb_down</i>{{propiedad.estado}}
						</button>
					</td>
					<td v-if="propiedad.iso != null || propiedad.precio != null">{{propiedad.iso +'$ '+ propiedad.precio}}</td>
					<td v-else> Sin precio </td>
					<td>
						<button class="btn-floating btn-small green accent-4 modal-trigger" href="#editar"><i class="material-icons" v-on:click.prevent="setEditComponente('editPropiedad')">edit</i></button>
						
						<button class="btn-floating btn-small red modal-trigger" href="#editar" v-on:click.prevent="setEditComponente('editGaleria')" ><i class="material-icons">add_a_photo</i></button>

						<button class="btn-floating btn-small blue accent-4" v-on:click.prevent="goToEditarDireccion(propiedad)">
							<i class="material-icons left">location_on</i>
						</button>

						<button class="btn-floating btn-small yellow darken-4 modal-trigger" href="#editar" v-on:click.prevent="setEditComponente('editPrecio');capturarPrecio(propiedad);"><i class="material-icons">attach_money</i></button>

					</td>
				</tr>
			</tbody>
		</datatable>
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
	<div id="editar" class="modal modal-fixed-footer">
		<component v-bind:is="componente" @updatePrecio="updatePrecio">

		</component>
	</div>
</div>
</template>
<script>
import { mapActions } from 'vuex';

import Datatable from './Datatable.vue';
import Pagination from './Pagination.vue';

export default{
	components: { datatable: Datatable, pagination: Pagination },
	created() {
		this.getPropiedades();
		this.getInmobiliarias();

		this.vaciarDatosPropiedad();
		this.vaciarDatos();
		
		$(document).ready(function(){
			$('.modal').modal();
		});
	},
	data() {
		let sortOrders = {};

		let columns = [
		{width: '10%', label: 'ID', name: 'id_propiedad' },
		{width: '20%', label: 'Imagen', name: 'imagen' },
		{width: '20%', label: 'Direccion', name: 'direccion' },
		{width: '20%', label: 'Titulo', name: 'titulo'},
		{width: '10%', label: 'Inmobiliaria', name: 'inmobiliaria'},
		{width: '10%', label: 'Estado', name: 'estado'},
		{width: '10%', label: 'Precio', name: 'precio'}
		];

		columns.forEach((column) => {
			sortOrders[column.name] = -1;
		});
		return {
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

			propiedadID: '',

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

			componente: ''
		}
	},
	computed: {
		nuevaGaleriaVacio(){
			return this.newGaleria.length === 0;
		}

	},

	methods: {
		...mapActions(['capturarDireccion', 'vaciarDatos', 'vaciarDatosPropiedad', 'capturarPrecio']),
		goToEditarDireccion(propiedad){
			this.capturarDireccion(propiedad);
			this.$router.push('/editar-direccion');
		},
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
				let data = response.data;
				if (this.tableData.draw == data.draw) {
					this.propiedades = data.data.data;
					this.configPagination(data.data);
				}
			})
			.catch(errors => {
				console.log(errors);
			});
			this.loading = false;
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

		setEditComponente(componente){
			this.componente = componente
		},

		updatePrecio(){
			let propiedadID = this.$store.state.propiedadID;
			let precio = this.$store.state.newPrecio;
			axios.put('/api/v1/precio/'+ propiedadID, {
				iso: precio.iso,
				precio: precio.precio
			}).then(response => {
				let message = response.data.data;
				toastr.success(message, 'Exito');
				this.getPropiedades();
			})
			.catch(error => {
				console.log(error);
				toastr.error('Error');
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