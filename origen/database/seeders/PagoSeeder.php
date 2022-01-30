<?php

namespace Database\Seeders;
use App\Models\Pago;

use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::insert(
            [
                ['formaPago'=>'Efectivo'],
                ['formaPago'=>'Transferencia'],
            ]
        );
    }
}
