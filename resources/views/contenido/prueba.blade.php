@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('css/materialize-stepper.css')}}">
@endpush

@section('content')
<div id="app">
	<propiedad/>
</div>
@endsection

@push('scripts')

<script src="{{asset('js/nuevaPropiedad.js')}}"></script>
@endpush