<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class); // Un servicio pertenece a una organización
    }

    public function cliente()
    {
        return $this->belongsToMany(Cliente::class, 'cliente_servicio'); // Un servicio puede ser asignado a n clientes
    }
}
