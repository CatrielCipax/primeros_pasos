<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class); #Un cliente pertenece a una organizacion
    }

    // Un cliente tiene n servicios asignados
    public function servicios(){
        return $this->belongsToMany(Servicio::class, 'cliente_servicio'); 
    }
}
