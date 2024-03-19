<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
        $faker = Faker::create("es_AR");

        foreach (range(1, 50) as $index) {
            DB::table('clientes')->insert([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'dni' => $faker->unique()->numerify('########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
