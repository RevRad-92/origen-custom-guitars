<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesdetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenesdetalles', function (Blueprint $table) {
            $table->tinyIncrements('idDetalle');
            $table->tinyInteger('idOrden');
            $table->tinyInteger('idProducto');
            $table->Integer('prdCantidad');
            $table->tinyInteger('idEstado');
            $table->text('odDetalles');

            $table->foreign('idOrden')
                    ->references('idOrden')->on('ordenes');
            $table->foreign('idProducto')
                    ->references('idProducto')->on('productos');
            $table->foreign('idEstado')
                    ->references('idEstado')->on('estados');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenesdetalles');
    }
}
