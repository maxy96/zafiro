@extends('layouts.app')
@section('title', 'Publicacion')
@section('content')
<div class="container mt20">
	<div class="card-panel pink darken-1">
		<h5 class="center-align white-text">PUBLICACION DE PRUEBA</h5>
	</div>
	<div class="row">
		
		<div class="col s12 m6">
			<div class="card">
				<div class="slider">
					<ul class="slides">
						<li>
							<img src="{{asset('welcome-image/caro1.jpg')}}"> 
						</li>
						<li>
							<img src="{{asset('welcome-image/caro2.jpg')}}"> 
						</li>
						<li>
							<img src="{{asset('welcome-image/caro3.jpg')}}">
						</li>
						<li>
							<img src="{{asset('welcome-image/caro4.jpg')}}">
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col s12 m6 card pt10 pb30 pl20 pr20">
			<h4 class="center-align pink-text text-darken-1">Casa de dos plantas</h4>
			<div class="divider"></div>
			<h5 class="pink-text ">Caracteristicas</h5>
			<p class=" grey-text " align="justify"> 
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente omnis animi illum nobis repudiandae iusto assumenda perferendis quos nostrum magnam necessitatibus harum hic quibusdam aspernatur.
			</p>
			<h5 class="pink-text darken-2">Contacto</h5>
			<p class="pink-text lighten-text-1">
				<i class="material-icons left">location_on</i> 
				<span class="ml10 pink-text text-lighten-2">calle prueba 1234</span>
			</p>
			<p class="pink-text lighten-text-1">
				<i class="material-icons left">email</i>
				<span class="ml10 pink-text text-lighten-2">email@email.com</span>
			</p>
			<p class="pink-text lighten-text-1">
				<i class="material-icons left">phone</i>
				<span class="ml10 pink-text text-lighten-2">  +54 11133234</span>
			</p>
			

		</div>

		<div class="col s12">
			
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.slider').slider({
                indicators: true,
                interval: 2000,
            });
          });

    </script>
@endpush