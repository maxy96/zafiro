<template>
	<form @submit.prevent="updatePropiedad" enctype="multipart/form-data">
		<div class="modal-content">
			<h5 class="grey-text ">Editar datos de la propiedad</h5>
			<div class="divider"></div>
			<nuevaPropiedad/>
		</div>
		<slot></slot>
	</form>
</template>
<script>
	export default{
	}
</script>