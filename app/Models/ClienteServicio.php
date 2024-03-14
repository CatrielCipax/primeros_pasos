<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteServicio extends Model
{
    #Laravel automáticamente maneja las operaciones en la tabla intermedia por lo que no es necesario definir el modelo. A menos que tengas datos adicionales
    use HasFactory;
}
