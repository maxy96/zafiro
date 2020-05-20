@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center">
        <div class="col m8">
            <div class="card">
                <div class="card-title">Dashboard</div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
