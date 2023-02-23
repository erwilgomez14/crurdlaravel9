@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card text-center">
        <div class="card-header">
            <h1>{{ $user->name }} </h1>
            <h4>{{ $user->email }}  </h3>
            <h4> Numero de registros de empleados</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Roles</h5>
            <p class="card-text">
                ºººººº
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
                ºººººº
            </p>
            <a href="{{url()->previous()}}" class="btn btn-dark">Regresar</a>
        </div>
        <div class="card-footer text-muted">
            Todos los derechos reservados
        </div>
    </div>

</div>

@endsection