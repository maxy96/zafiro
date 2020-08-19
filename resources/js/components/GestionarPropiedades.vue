<template>
	<div>
		<div class="container-table mt20">
			<router-link v-if="$route.fullPath != '/'" to="/" class="btn purple waves-effect"><i class="material-icons left">arrow_back</i>Volver</router-link>
			<router-link v-else to="/nueva-propiedad" class="btn purple waves-effect"><i class="material-icons left">add</i>Nueva propiedad</router-link>
		</div>
		<router-view></router-view>
	</div>
</template>
<script>
export default{
	
}
</script>