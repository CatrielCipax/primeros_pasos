<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrganizacionesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_AR'); 

        foreach (range(1, 20) as $index) {
            DB::table('organizaciones')->insert([
                'nombre' => $faker->company,
                'cuit' => $faker->unique()->numerify('30-#######-#'), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
