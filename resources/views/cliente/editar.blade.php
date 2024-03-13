@extends('plantilla')

@section('seccion')

{{-- Falta validaciones --}}

<h1>Editar cliente {{$cliente->id}} </h1>

@if (session('mensaje'))
<div class='alert alert-success'>
    {{session('mensaje')}}
</div>
@endif


<form action="{{ route('cliente.update', $cliente) }}" method="POST"> 
    
    <!-- el formulario usara el metodo PUT. arriba dejamos POST pq html no toma el PUT -->
    @method('PUT') 
    @csrf
    
    <!-- Validaciones -->
    @error('nombre')
    <div class= 'alert alert-danger'>
        El nombre es obligatorio
    </div>
    @enderror

    @error('apellido')
    <div class= 'alert alert-danger'>
        El apellido es obligatorio
    </div>
    @enderror

    @error('dni')
    <div class= 'alert alert-danger'>
        El DNI es obligatorio
    </div>
    @enderror

    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{$cliente->nombre}}">
    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{$cliente->apellido}}">
    <input type="text" name="dni" placeholder="DNI" class="form-control mb-2" value="{{$cliente->dni}}">
    
    <!-- importante poner submit -->
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
    
</form>

@endsection