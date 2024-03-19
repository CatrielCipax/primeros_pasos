<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteServicioTableSeeder extends Seeder
{
    public function run()
    {
        // Obtiene todos los IDs de clientes y servicios
        $clienteIds = DB::table('clientes')->pluck('id')->toArray();
        $servicioIds = DB::table('servicios')->pluck('id')->toArray();

        // crear 100 relaciones aleatorias
        for ($i = 0; $i < 100; $i++) {
            DB::table('cliente_servicio')->insert([
                'cliente_id' => $clienteIds[array_rand($clienteIds)],
                'servicio_id' => $servicioIds[array_rand($servicioIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
