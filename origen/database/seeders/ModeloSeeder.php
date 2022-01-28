<?php

namespace Database\Seeders;
use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::insert(
            [
                ['modNombre'=>'Flying V'],
                ['modNombre'=>'Stratocaster'],
                ['modNombre'=>'Les Paul'],
                ['modNombre'=>'SG'],
                ['modNombre'=>'Telecaster']
            ]
        );
    }
}
