<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Organizacion;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Desactivar la revisión de las claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar las tablas
        Cliente::truncate();
        Servicio::truncate();
        Organizacion::truncate();
        DB::table('cliente_servicio')->truncate();

        // Restablecer la revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crear organizaciones de prueba
        $organizacion1 = Organizacion::create([
            'nombre' => 'Organización 1',
            'cuit' => '30-12345678-9'
        ]);

        // Crear servicios de prueba asociados a la organización
        $servicio1 = Servicio::create([
            'name' => 'Servicio 1',
            'descripcion' => 'Descripción del servicio 1',
            'precio' => 100.00,
            'organizacion_id' => $organizacion1->id
        ]);

        $servicio2 = Servicio::create([
            'name' => 'Servicio 2',
            'descripcion' => 'Descripción del servicio 2',
            'precio' => 200.00,
            'organizacion_id' => $organizacion1->id
        ]);

        // Crear clientes de prueba
        $cliente1 = Cliente::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'dni' => '12345678'
        ]);

        $cliente2 = Cliente::create([
            'nombre' => 'Ana',
            'apellido' => 'Gonzalez',
            'dni' => '87654321'
        ]);

        // Asociar servicios a los clientes mediante la tabla pivote
        DB::table('cliente_servicio')->insert([
            [
                'cliente_id' => $cliente1->id,
                'servicio_id' => $servicio1->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cliente_id' => $cliente1->id,
                'servicio_id' => $servicio2->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cliente_id' => $cliente2->id,
                'servicio_id' => $servicio1->id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
