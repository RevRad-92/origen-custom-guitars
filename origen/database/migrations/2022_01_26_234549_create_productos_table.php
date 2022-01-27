<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->tinyIncrements('idProducto');
            $table->tinyInteger('idCategoria');
            $table->float('prdPrecio', 10, 2)->unsigned();
            $table->integer('prdStock');
            $table->tinyInteger('idModelo');
            $table->tinyInteger('idMadera');
            $table->string('prdImagen');

            $table->foreign('idCategoria')
                    ->references('idCategoria')->on('categorias');
            $table->foreign('idModelo')
                    ->references('idModelo')->on('modelos');
            $table->foreign('idMadera')
                    ->refereces('idMadera')->on('maderas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
