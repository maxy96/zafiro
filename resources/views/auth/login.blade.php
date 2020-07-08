@extends('layouts.app')
@section('title', 'Iniciar sesion')
@section('content')
<div class="container mt20 mb20">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card">
                    <div class="card-title center pt2" style="border-bottom: 1px solid #eeeeee;">
                        <h4 class="purple-text darken-text-2">Iniciar sesion</h4>
                    </div>
                    <div class="card-content pl30 pr30 pb0">
                        <div class=" row">
                            <div class="input-field col m12 s12">
                              <i class="material-icons prefix">mail_outline</i>
                              <input id="email" type="email" name="email" class="validate">
                              <label for="email">Email</label>
                          </div>
                          <div class="input-field col m12 s12">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="password" type="password" name="password" class="validate">
                              <label for="password">Contraseña</label>
                          </div>
                          <div class="center col s12">
                              <label>
                                <input type="checkbox" name="remember" id="remember">
                                <span>Recordarme</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="center">
                        <button type="submit" class="btn btn-primary mb10">
                            {{ __('Iniciar sesion') }}
                        </button>
                        <br>
                        @if (Route::has('password.request'))
                        <a class="indigo-text waves-effect" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
