<template>
	<form @submit.prevent="$emit('updatePrecio')">
		<div class="modal-content">
			<h5 class="grey-text ">Editar precio de la propiedad</h5>
			<div class="divider"></div>
			<precios/>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn-flat waves-effect waves-light modal-close">
				Guardar<i class="material-icons right">send</i>
			</button>
		</div>
	</form>
</template>
<script>
export default{

}
</script>