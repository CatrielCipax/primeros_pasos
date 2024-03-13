<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clientes;

class PagesController extends Controller
{
    public function inicio(){
        // $clientes = Clientes::all(); #Obtenemos todos los datos de la tabla cliente
        $clientes = Clientes::paginate(4); #Mostramos clientes en varias paginas
        return view("welcome",compact('clientes')); #Pasamos la variable al view
    }

    public function detalle($id){
        $cliente = Clientes::findOrFail($id); #Si no encuentra el ID tira 404
        
        return view('cliente.detalle', compact('cliente'));
    }

    public function crear(Request $request){    
        
        $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'dni'=> 'required',
        ]);

        // return $request->all();
        $clienteNuevo = new Clientes;
        $clienteNuevo->nombre = $request->nombre;
        $clienteNuevo->apellido = $request->apellido;
        $clienteNuevo->dni = $request->dni;

        $clienteNuevo->save(); #Guardar en DB. Esto viene de eloquent 

        return back()->with('mensaje','Cliente agregado!');  #Volver a la vista anterior
    }

    public function editar($id){
        $cliente = Clientes::findOrFail($id); 
        return view('cliente.editar', compact('cliente'));
    }

    public function update(Request $request, $id){
        $clienteUpdate = Clientes::findOrFail($id);
        $clienteUpdate->nombre = $request->nombre;  #Con request recuperamos los datos del formulario
        $clienteUpdate->apellido = $request->apellido;
        $clienteUpdate->dni = $request->dni;

        $clienteUpdate->save(); #Guardamos en DB

        return back()->with('mensaje','Cliente Actualizado');
    }


    public function eliminar($id){
        $clienteEliminar = Clientes::findOrFail($id);
        $clienteEliminar->delete();
        return back()->with('mensaje','Cliente Eliminado');
    }


    // public function fotos(){
    //     return view("fotos");
    // }

    // public function noticias(){
    //     return view("blog");
    // }

    public function nosotros($nombre = null){
        $equipo = ['Ignacio','Juanito','Pedrito']; #Array estatico

        // return view('nosotros',['equipo'=>$equipo]);  #Mandamos el array a nosotros.blade.php
        return view('nosotros',compact('equipo','nombre')); #alternativa 2
    }
}
