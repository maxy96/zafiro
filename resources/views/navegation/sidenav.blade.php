<ul id="slide-out" class="sidenav">
	<li>
		<div class="user-view">
			<div class="background">
				<img class="h100 w100" src="{{asset('wallpaper.jpg')}}">
			</div>
			<i class="material-icons white-text">account_circle</i>
			@guest
			<a href="#"><span class="white-text name">Invitado</span></a>
			@else
			<a href="#"><span class="white-text name">{{Auth::user()->nombre." ".Auth::user()->apellido}}</span></a>
			<a href="#"><span class="white-text email">{{Auth::user()->email}}</span></a>
			@endguest
		</div>
	</li>
	<li><a class="subheader">CONTENIDO</a></li>
	<li>
		<a class="dropdown-trigger btn waves-effect purple darken-4 radius" href='#' data-target='dropdown1'>Propiedades</a>
		<!-- Dropdown Structure -->
		<ul id='dropdown1' class="dropdown-content">
			<li><a class="purple-text text-darken-4" href="{{route('propiedades.todos')}}">Todos</a></li>
			@foreach(App\Models\Inmobiliarias::all() as $inmobiliaria)
			<li><a class="purple-text text-darken-4" href="{{route('propiedades.inmobiliaria', $inmobiliaria->inmobiliaria)}}">{{$inmobiliaria->inmobiliaria}}</a></li>
			@endforeach
		</ul>
	</li>
	<li><a href="#" class="btn waves-effect purple darken-4 disabled radius">Mapa</a></li>
	
	@auth
		@includeIf(Auth::user()->perfil()->descripcion.'.menu')
	@endauth

	<li><div class="divider"></div></li>
	@guest{{--Invitado--}}
	<li><a class="subheader">IDENTIFICARSE</a></li>
	<li><a href="{{route('login')}}" class="btn waves-effect radius indigo darker-4">{{__('Iniciar sesion')}}</a></li>
	<li><a href="{{route('register')}}" class="btn waves-effect radius indigo darker-4">{{__('Registro')}}</a></li>
	@else{{--Usuario logueado--}}
	<li><a class="subheader">CERRAR SESION</a></li>
	<li>
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn waves-effect radius indigo darker-4">{{ __('Cerrar sesion') }}
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</li>
	@endguest
</ul>

@push('scripts')
<script>
	$(function(){
		$('.dropdown-trigger').dropdown({
			alignment: 'left',
		});
	});
</script>
@endpush