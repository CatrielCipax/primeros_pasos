<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServiciosTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_AR'); // Asumiendo que quieres datos en español

        // Obteniendo todos los IDs de la tabla organizaciones
        $organizacionIds = DB::table('organizaciones')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('servicios')->insert([
                'name' => $faker->bs,
                'descripcion' => $faker->paragraph,
                'precio' => $faker->randomFloat(2, 100, 5000), // Genera un precio con 2 decimales entre 100 y 5000
                'organizacion_id' => $faker->randomElement($organizacionIds), // Asigna un ID de organización al azar
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
