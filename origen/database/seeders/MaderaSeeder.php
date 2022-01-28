<?php

namespace Database\Seeders;
use App\Models\Madera;
use Illuminate\Database\Seeder;

class MaderaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Madera::insert(
            [
                ['madNombre'=>'Arce'],
                ['madNombre'=>'Ebano'],
                ['madNombre'=>'Caoba'],
                ['madNombre'=>'Rosewood'],
                ['madNombre'=>'Aliso'],
                ['madNombre'=>'Fresno']
            ]
        );
    }
}
