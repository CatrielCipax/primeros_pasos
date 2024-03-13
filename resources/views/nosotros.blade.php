@extends('plantilla')

@section('seccion')

    <h1>Este es mi equipo</h1>

    <!-- equipo es un array, item es cada elemento -->
    @foreach($equipo as $item) 
        <!-- 'nosotros' es el nombre de la ruta definida en web.php y se le agrega a la ruta item -->
        <a href="{{route('nosotros',$item)}}" class="h4 text-danger">{{$item}}</a><br> 
    @endforeach

    @if(!empty($nombre))
        @switch($nombre)
            @case($nombre=='Ignacio')
                <h2>El nombre es {{$nombre}}:</h2>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque odio unde, non facilis incidunt natus.
            @break
        @endswitch

        @switch($nombre)
            @case($nombre=='Juanito')
                <h2>El nombre es {{$nombre}}:</h2>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident laborum ipsam id officiis rerum eaque sapiente maiores aspernatur eligendi esse porro, laudantium commodi alias illo quod numquam! Reiciendis, incidunt.
            @break
        @endswitch

        @switch($nombre)
            @case($nombre=='Pedrito')
                <h2>El nombre es {{$nombre}}:</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nostrum ipsum rerum ab ipsam. Perferendis ipsa illum numquam repellendus culpa similique consectetur maiores expedita incidunt eligendi? Animi ipsa doloribus porro.
            @break
        @endswitch

    @endif
@endsection