@extends('layouts.app')

@section('meta')
	<meta property="og:image" content="{{asset("imagen/$propiedad->imagen")}}" />
	<meta property="og:image:height" content="200" />
	<meta property="og:image:width" content="200" />
@endsection

@section('title', 'Propiedad '.$propiedad->titulo)

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
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-image">
					<img src="{{asset("imagen/$propiedad->imagen")}}">
					<span class="card-title">{{$propiedad->titulo}}</span>
				</div>
				<div class="card-content">
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
						@foreach($propiedad->galeria()->get() as $imagen)
							<img src="{{asset("imagen/$imagen->imagen")}}" height="100px" width="100px" alt="">
						@endforeach
					</div>
					<div id="ubicacion">
						<div id="map"></div>
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
	});
</script>
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