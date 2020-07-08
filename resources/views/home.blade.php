@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row center">
        <div class="col m12">
            <div class="card">
                <div class="card-title"><h3 class="purple-text"> Bienvenido !! </h3></div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h5>Inicio de sesion correcto.</h5>    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
