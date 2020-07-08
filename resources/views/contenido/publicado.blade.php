@extends('layouts.app')
@section('title', 'Publicacion')

@section('content')
<!-- Content -->
<div class="parallax-container center valign-wrapper">
	<div class="container">
		<div class="row">
			<div class="col s12 white-text">
				<a class="waves-effect waves-light btn-large teal lighten-2">Get Started</a>
			</div>
		</div>
	</div>

	<div class="parallax">
		<img src="{{asset('logo-principal.png')}}" alt="">
	</div>

</div>

<div class="container">
	<div class="row">
		<div class="col m4 s12">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">flash_on</i>  
				</h2>
				<h5 class="center">Speeds up development</h5>
				<p class="light">
					We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.
				</p>
			</div>

		</div>
		<div class="col m4 s12">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">group</i>  
				</h2>
				<h5 class="center">User Experience Focused</h5>
				<p class="light">
					By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.
				</p>
			</div> 
		</div>
		<div class="col m4 s12">
			<div class="icon-block">
				<h2 class="center light-blue-text">
					<i class="material-icons">settings</i>  
				</h2>
				<h5 class="center">Easy to work with</h5>
				<p class="light">
					We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.
				</p>
			</div> 
		</div>
	</div>
</div>

<div class="parallax-container center valign-wrapper">
	<div class="parallax"><img src="https://images.unsplash.com/photo-1463780324318-d1a8ddc05a11?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=">
	</div>

	<div class="container white-text">
		<div class="row">
			<div class="col s12">
				<h5>A modern responsive front-end framework based on Material Design</h5>
			</div>
		</div>
	</div>
</div>

<div class="container center-align">
	<div class="section">
		<div class="row">
			<div class="col s12">
				<h4>Contact Us</h4>
				<p class="light left-align">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
				</p>
			</div>      
		</div>
	</div>
</div>

<div class="parallax-container center valign-wrapper">
	<div class="parallax"><img src="https://images.unsplash.com/photo-1489289827069-adf270f4f417?dpr=1&auto=format&fit=crop&w=1500&h=2250&q=80&cs=tinysrgb&crop=">
	</div>

	<div class="container white-text">
		<div class="row">
			<div class="col s12">
				<h5>A modern responsive front-end framework based on Material Design</h5>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('.parallax').parallax();
	});
</script>

@endpush