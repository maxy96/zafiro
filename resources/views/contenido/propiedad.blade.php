@extends('layouts.app')

@section('meta')
<meta name="description" content= "{{$propiedad->caracteristica}}" />
<meta property="og:image" content="{{asset("imagen/$propiedad->imagen")}}" />
<meta property="og:image:height" content="200" />
<meta property="og:image:width" content="200" />
@endsection

@section('title', 'Propiedad '.$propiedad->titulo)

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-image">
					<img src="{{asset("imagen/$propiedad->imagen")}}">
					<span class="card-title">{{$propiedad->titulo}}</span>
					<a href="https://wa.me/5493794087107?text={{route('propiedades.propiedad', $propiedad->slug)}}%20Quisiera%20obtener%20mas%20informacion%20acerca%20de%20esta%20propiedad" target="_blank" class="btn-floating halfway-fab waves-effect waves-light pink tooltipped" data-position="right" data-tooltip="Solicitar"><i class="fa fa-whatsapp"></i></a>
				</div>
				<div class="card-tabs">
					<ul class="tabs tabs-fixed-width">
						<li class="tab"><a class="active" href="#caracteristica">Caracteristicas</a></li>
						<li class="tab"><a href="#galeria">Galeria</a></li>
						<li class="tab"><a href="#ubicacion">Ubicación</a></li>
					</ul>
				</div>
				<div class="card-content grey lighten-4">
					<div id="caracteristica">{{$propiedad->caracteristica}}</div>
					<div id="galeria">
						@forelse($propiedad->galeria()->get() as $imagen)
						<img src="{{asset("imagen/$imagen->imagen")}}" height="100px" width="100px" alt="">
						@empty
						<span>No hay imagenes de muestra</span>
						@endforelse
					</div>
					<div id="ubicacion">
						<span>En desarrollo</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('.tabs').tabs();
		$('.tooltipped').tooltip();
	});
</script>
@endpush