@extends('layouts.app')
@section('title', $title)

@section('content')

<div class="container-fluid mt30">
	<div class="row ">
		<div class="col l12">
			<div class="col s12 m8 ">
				<div class="input-field ">
					<i class="material-icons prefix">search</i>
					<input id="icon_prefix" type="text" class="validate">
					<label for="icon_prefix">Buscar</label>
				</div>
			</div>
			<div class="row">
				@foreach($propiedades as $propiedad)
				<div class="col s12">		
					<div class="card horizontal">
						<div class="card-image">
							<img class="img-propiedad" src="{{asset("imagen/$propiedad->imagen")}}">
						</div>
						<div class="card-stacked">
							<div class="card-content">
								<h5 class="header text">{{$propiedad->titulo}}</h5>
								<p class="text">{{$propiedad->caracteristica}}</p>
							</div>
							<div class="card-action">
								<a href="{{route('propiedades.propiedad', $propiedad->slug)}}" class="btn waves-effect waves-light pink radius mt5 mb5">Ver mas</a>
								<a href="https://wa.me/5493794087107?text={{route('propiedades.propiedad', $propiedad->slug)}}%20Quisiera%20obtener%20mas%20informacion%20acerca%20de%20esta%20propiedad" target="_blank" class="btn waves-effect waves-light pink radius mt5 mb5"><i class="fa fa-whatsapp"></i> Solicitar</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush