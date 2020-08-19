<template>
	<div class="row mt10">
		<div class="input-field col s6 l4 ">
			<select v-model="$store.state.newPrecio.iso">
				<option value="" disabled selected>Moneda</option>
				<option value="ARS">ARS</option>
				<option value="USD">USD</option>
			</select>
			<label>Seleccionar moneda</label>
		</div>
		<div class="input-field col s6 l6">
			<i class="material-icons prefix">attach_money</i>
			<input id="precio"  type="number" v-model="$store.state.newPrecio.precio" class="validate">
			<label for="precio">Precio</label>
		</div>
		<p>{{$store.state.newPrecio.iso}}</p>
		<p>{{$store.state.newPrecio.precio}}</p>
	</div>
</template>
<script>
export default {
	mounted(){
		$(document).ready(function(){
			$('select').formSelect();
		});
	}
}
</script>