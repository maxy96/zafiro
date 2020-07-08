@extends('layouts.app')
@section('title', $title)

@push('styles')
<style>
	/* Set the size of the div element that contains the map */
	#map {
		height: 400px;  /* The height is 400 pixels */
		width: 100%;  /* The width is the width of the web page */
	}
</style>
@endpush

@section('content')
<div id="map"></div>
<div class="container-fluid mt30">
	<div class="row ">
		<div class="col l2 white z-depth-1" style="height: 130rem;">

		</div>
		<div class="col l10 pr60 pl60">
			<div class="col s6 ">
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
							<img style="height: 190px; width: 230px;" src="{{asset("imagen/$propiedad->imagen")}}">
						</div>
						<div class="card-stacked">
							<div class="card-content">
								<h5 class="header">{{$propiedad->titulo}}</h5>
								<p>{{$propiedad->caracteristica}}</p>
							</div>
							<div class="card-action">
								<a href="{{route('propiedades.propiedad', $propiedad->slug)}}" class="btn waves-effect waves-light pink radius">Ver mas</a>
								<a href="https://wa.me/5493794087107?text={{route('propiedades.propiedad', $propiedad->slug)}}%20Quisiera%20obtener%20mas%20informacion%20acerca%20de%20esta%20propiedad" class="btn waves-effect waves-light pink radius"><i class="fa fa-whatsapp"></i> Solicitar</a>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('services.maps.api_key')}}&callback=initMap"
type="text/javascript"></script>
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -20.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
  	document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
@endpush