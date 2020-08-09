<template>
	<div class="container mt40 mb40">

		<div class="card z-depth-4">
			<div class="card-content">
				<div class="card-title"><h5 class="grey-text text-darken-2"> Agregar nueva propiedad </h5></div>
				<form>
					<ul class="stepper linear">
						<li class="step grey-text text-darken-2" v-for="(step, index) in steps" :class="step.class">
							<div :data-step-label="step.label" class="step-title waves-effect">{{step.titulo}}</div>
							<div class="step-content">
								<component v-bind:is="step.component"></component>		
								<div class="step-actions">
									<button class="waves-effect waves-dark btn purple darken-2 rigth" v-for="action in step.action" v-on:click.prevent="clickAction(action, index)">{{action}}</button>
								</div>
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</template>
<script>

export default{
	data(){
		//PASOS
		let steps = [
		{titulo: 'Paso 1', label: 'Nueva propiedad' , class: 'active', component: 'nuevaPropiedad', action:[] },
		{titulo: 'Paso 2', label: 'Agregar precio', class: '', component: 'precios', action:[]},
		{titulo: 'Paso 3', label: 'Agregar direccion', class: '', component: 'direccion', action:[]},
		{titulo: 'Paso 4', label: 'Galeria', class: '', component: 'galeria', action:[]}
		];
		let stepsLength = steps.length - 1;

		//ACCIONES
		steps[0].action.push('SIGUIENTE');
		steps[stepsLength].action.push('ATRAS', 'ENVIAR');
		steps.forEach((step, index) => {
			index > 0 && index < stepsLength ? step.action.push('ATRAS', 'SIGUIENTE') : '';
		});

		return{
			steps: steps
		}
	},

	methods:{
		clickAction(action, index){
			return action == 'SIGUIENTE' ? this.nextStep(index) : this.previousStep(index);
		},
		nextStep(index){
			this.steps[index].class = '';
			this.steps[index+1].class = 'active';
		},
		previousStep(index){
			this.steps[index].class = '';
			this.steps[index-1].class = 'active';
		}

	}
	
}
</script>