<template>
	<div class="row mt10">
		<div class="input-field col s6 l4 ">
			<select>
				<option value="" disabled selected>Moneda</option>
				<option value="ARS">ARS</option>
				<option value="USD">USD</option>
			</select>
			<label>Seleccionar moneda</label>
		</div>
		<div class="input-field col s6 l6">
			<i class="material-icons prefix">attach_money</i>
			<input id="precio"  type="number" class="validate">
			<label for="precio">Precio</label>
		</div>
	</div>
</template>
<script>
export default {

}
</script>