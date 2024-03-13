<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public function organizacion()
    {
        return $this->belongsTo(Organizaciones::class); #Un cliente pertenece a una organizacion
    }
}
