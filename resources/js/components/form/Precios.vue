<template>
	<div class="mt10">
		<div class="input-field col s12 l4 m6">
			<select v-model="$store.state.newPrecio.iso">
				<option value="" disabled selected>Moneda</option>
				<option value="ARS">ARS</option>
				<option value="USD">USD</option>
			</select>
			<label>Seleccionar moneda</label>
		</div>
		<div class="input-field col s12 l6 m6 mt20">
			<i class="material-icons prefix">attach_money</i>
			<input id="precio" type="number" v-model="$store.state.newPrecio.precio" class="validate" placeholder="Ingrese un precio">
			<label class="active" for="precio">Precio</label>
		</div>
		<slot></slot>
	</div>
</template>
<script>
export default {
	mounted(){
		$(document).ready(function(){
			$('select').formSelect({
				input: 'USD'
			});
		});
	}
}
</script>