@extends('layouts.app')
@section('title', 'Registrarse')
@section('content')
<div class="container mt20 mb20">
    <div class="row ">
        <div class="col m8 offset-m2 s12 ">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card ">
                    <div class="card-title center pt10" style="border-bottom: 1px solid #eeeeee;">
                        <h4 class="robotoSlab purple-text darken-text-2">Formulario de registro</h4>
                    </div>
                    <div class="card-content pb0 pl30 pr30">
                        <div class="row ">
                            <div class="input-field col m6 s12 ">
                              <i class="material-icons prefix ">person_outline</i>
                              <input id="nombre" name="nombre" type="text" class="validate">
                              <label for="nombre">Nombre</label>
                            </div>
                          <div class="input-field col m6 s12">
                              <i class="material-icons prefix">person_outline</i>
                              <input id="apellido" name="apellido" type="text" class="validate">
                              <label for="apellido">Apellido</label>
                          </div>
                          <div class="input-field col m6 s12">
                              <i class="material-icons prefix">smartphone</i>
                              <input id="telefono" name="telefono" type="tel" class="validate">
                              <label for="telefono">Telefono</label>
                          </div>
                          <div class="input-field col m6 s12">
                              <i class="material-icons prefix">mail_outline</i>
                              <input id="email" type="email" name="email" class="validate">
                              <label for="email">Email</label>
                          </div>
                          <div class="input-field col m6 s12">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="password" type="password" name="password" class="validate">
                              <label for="password">Contraseña</label>
                          </div>
                          <div class="input-field col m6 s12">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="confirm_password" type="password" name="password_confirmation" class="validate">
                              <label for="confirm_password">Confirmar contraseña</label>
                          </div>
                      </div>
                  </div>
                  <div class="card-action">
                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-light waves-ripple">
                            {{ __('Registrar') }}<i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
