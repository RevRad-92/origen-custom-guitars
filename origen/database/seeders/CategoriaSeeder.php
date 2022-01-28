<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert(
            [
                ['catNombre'=>'Cuerpo'],
                ['catNombre'=>'Microfono'],
                ['catNombre'=>'Martil'],
                ['catNombre'=>'Pickguard'],
                ['catNombre'=>'Pintura'],
                ['catNombre'=>'Puente'],
                ['catNombre'=>'Tapa']    
            ]
        );
    }
}
