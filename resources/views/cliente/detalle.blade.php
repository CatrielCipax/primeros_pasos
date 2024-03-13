@extends('plantilla')

@section('seccion')

<h1>Detalle Cliente:</h1>

<h4>Nombre: {{$cliente->nombre}}</h4>
<h4>Apellido: {{$cliente->apellido}}</h4>
<h4>DNI: {{$cliente->dni}}</h4>

@endsection