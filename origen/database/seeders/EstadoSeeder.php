<?php

namespace Database\Seeders;
use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::insert(
            [
                ['estNombre'=>'En Preparación'],
                ['estNombre'=>'Archivado'],
                ['estNombre'=>'Listo'],
                ['estNombre'=>'Enviado']
            ]
        );
    }
}
