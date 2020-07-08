@extends('layouts.app')
@section('title', 'Gestion de propiedades')
@push('styles')
	<link rel="stylesheet" href="{{asset('css/toastr.css')}}">
@endpush
@section('content')
<div class="" id="app">
	<gestionar-propiedades></gestionar-propiedades>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/gestionarPropiedades.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.modal').modal();
	});
</script>
@endpush