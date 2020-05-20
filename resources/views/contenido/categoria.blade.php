@extends('layouts.app')
@section('title', 'Todos')
@section('content')
<div class="container">
	<div class="card-panel pink darken-1">
		<h5 class="center-align white-text">PUBLICADOS</h5>
	</div>
	<div class="row">
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>
		<div class="col m3">
			<div class="card hoverable">
				<div class="card-image">
					<img src="{{asset('welcome-image/caro6.jpg')}}">
					<a class="btn-floating halfway-fab waves-effect waves-light purple"><i class="material-icons">phone</i></a>
				</div>
				<div class="card-content ">
					<span class="card-title pink-text darken-4">Card Title</span>
					<p class="">I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="{{route('publicado')}}" class="btn waves-effect waves-light pink">Ver mas</a>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection