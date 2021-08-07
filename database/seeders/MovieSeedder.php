<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        ['name' => 'El Aro', 'category' => 'Terror', 'description' => 'Terror sin tanto miedo'],
        ['name' => 'Y donde están las rubias', 'category' => 'Comedia', 'description' => 'Agentes encubiertos'],
        ['name' => 'Scary Movie', 'category' => 'Comedia y Terror', 'description' => 'Gracioso']
        ];

        foreach ($data as $value) {
            DB::table('movies')->insert([
                'name' => $value['name'],
                'category' => $value['category'],
                'description' => $value['description']
            ]);
        }
    }
}
