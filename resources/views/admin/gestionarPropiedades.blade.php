@extends('layouts.app')

@section('title', 'Gestion de propiedades')

@push('styles')
<link rel="stylesheet" href="{{asset('css/materialize-stepper.css')}}">
<link rel="stylesheet" href="{{asset('css/toastr.css')}}">
@endpush

@section('content')
<div class="" id="app"></div>
@endsection

@push('scripts')
<script src="{{asset('js/gestionarPropiedades.js')}}"></script>
@endpush