<?php

namespace Database\Seeders;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::insert(
            [
                [
                    'cliNombre'=>'Nicolás',
                    'cliApellido'=>'Madeo',
                    'cliDireccion'=>json_encode([
                        'calle'=>'Baigorria',
                        'numero'=>'4412'
                    ]),
                    'cliEmail'=>'stniko@hotmail.com',
                    'cliTelefono'=>'1564579852'
                ],
                [
                    'cliNombre'=>'Agustín',
                    'cliApellido'=>'Di Sanzo',
                    'cliDireccion'=>json_encode([
                        'calle'=>'Baigorria',
                        'numero'=>'4412'
                    ]),
                    'cliEmail'=>'agudisan@hotmail.com',
                    'cliTelefono'=>'1564852531'
                ],
            ]
        );
    }
}
