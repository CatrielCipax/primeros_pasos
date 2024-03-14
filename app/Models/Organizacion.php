<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $table = 'organizaciones'; #Aclaras que la tabla en la bd es esa. Esto es debido a que laravel buscaria sino "organizacions"

    public function cliente()
    {
        return $this->hasMany(Cliente::class); // Una organización tiene muchos clientes
    }

    public function servicio()
    {
        return $this->hasMany(Servicio::class); // Una organización ofrece muchos servicios
    }
}
