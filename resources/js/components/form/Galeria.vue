<template>
	<div class="">
		<div class="input-field file-field col s12">
			<div class="btn">
				<span>Imagen</span>
				<input  type="file" ref="fileImage" @change="obtenerVariasImagenes" accept="image/*" required>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
		</div>
		<img v-for="imagen in $store.state.newGaleria" :src="imagen" style="width: 150px; height: 150px;" alt="">
		<slot></slot>
	</div>
</template>
<script>
export default{
	methods:{
		obtenerVariasImagenes(e){
			let file = e.target.files[0];
			let fileReader = new FileReader();
			fileReader.readAsDataURL(file);

			fileReader.onload = (e) =>{
				this.$store.state.newGaleria.push(e.target.result);
			}
			this.$refs.fileImage.value = '';
		} // END obtenerVariasImagenes
	}
}
</script>