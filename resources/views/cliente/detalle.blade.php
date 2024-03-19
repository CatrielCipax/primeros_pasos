@extends('plantilla')

@section('seccion')

<div class="container mt-5">
    <h1 class="mb-4">Detalle del Cliente:</h1>

    <div class="mb-3">
        <h4>Nombre: {{$cliente->nombre}}</h4>
    </div>

    <div class="mb-3">
        <h4>Apellido: {{$cliente->apellido}}</h4>
    </div>

    <div class="mb-3">
        <h4>DNI: {{$cliente->dni}}</h4>
    </div>

    <div class="card">
        <div class="card-header">
            Servicios
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($cliente->servicios as $servicio)
                <li class="list-group-item">
                    <h5 class="mb-1">Servicio: {{$servicio->name}}</h5>
                    <p>Costo: {{ $servicio->precio }}</p>
                    <p>Descripcion: {{ $servicio->descripcion }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
