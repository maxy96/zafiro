@extends('layouts.app')
@section('title', 'Bienvenido a zafiro')
@section('content')
<div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="{{asset('welcome-image/caro1.jpg')}}"> <!--  image -->
      </li>
      <li>
        <img src="{{asset('welcome-image/caro2.jpg')}}"> <!--  image -->
      </li>
      <li>
        <img src="{{asset('welcome-image/caro3.jpg')}}"> <!--  image -->
      </li>
      <li>
        <img src="{{asset('welcome-image/caro4.jpg')}}"> <!--  image -->
      </li>
    </ul>
</div>
<div class="center welcome">
    <img src="{{asset('logo-principal.png')}}" class="logo-welcome" alt="">
    <h4 class="indigo-text">Esto es una demo</h4>
    <h5 class="purple-text darken-text-4">Pagina web en desarrollo</h5>
</div>

@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $('.slider').slider({
        indicators: false,
        interval: 2500
      });
    });
  </script>
@endpush
