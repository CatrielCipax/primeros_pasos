@extends('plantilla')

@section('seccion')
<body>
    <div class='container my-4'>
        <h1 class='display-4'>App</h1>
         
        @if (session('mensaje'))
        <div class='alert alert-success'>
          {{session('mensaje')}} 
        </div>
        @endif
        
        <!-- importante poner el metodo POST -->
        <form action="{{'cliente.crear'}}" method="POST"> 
          @csrf
          
          <!-- Validaciones. Los detalles en el controlador -->
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


          <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{old('nombre')}}">
          <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{old('apellido')}}">
          <input type="text" name="dni" placeholder="DNI" class="form-control mb-2" value="{{old('dni')}}">
          
          <!-- importante poner submit -->
          <button class="btn btn-primary btn-block" type="submit">Agregar</button>
          
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">{{$cliente->id}}</th>
                    <td>
                    <!-- #al pasarle $cliente, laravel lee el id automaticamente y lo usa para la ruta -->
                      <a href="{{route('cliente.detalle', $cliente)}}"> {{ $cliente->nombre }} </a> 
                    
                    </td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->dni}}</td>

                    <td>
                      <a href="{{route('cliente.editar', $cliente)}}" class="btn btn-warning btn-sm">Editar</a>
                      
                      <form action="{{route('cliente.eliminar', $cliente)}}" method="POST" class="d-inline"> 
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                          Eliminar
                        </button>
                      </form>

                    </td>
                </tr>
                @endforeach()
            </tbody>
            </table> 
            {{ $clientes->links() }}    
    </div>

  </body>



@endsection


</html>